<?php

namespace App\Controllers;

class PostController extends BaseController {
    public function show() : mixed
    {
        $slug = router()->routeParams()['slug'];
        $post = db()->query("SELECT 
            p.title, p.slug, p.content, p.image, p.views,
            DATE_FORMAT(p.created_at, '%b %D \'%y') as created_at, 
            c.title AS c_title, c.slug AS c_slug FROM posts p 
            JOIN categories c on c.id = p.category_id 
            WHERE p.slug = ?", [$slug])->getOne();
        if (!$post) {
            abort();
        }
        db()->query("UPDATE posts SET views = views + 1 WHERE slug = ?", [$slug]);
        return view('posts/show', ['post' => $post, 'title' => $post['title']]);
    }
}