<?php

namespace App\Controllers;

use PHPFramework\Pagination;

class CategoryController extends BaseController {
    public function show() : mixed
    {
        $slug = router()->routeParams()['slug'];

        $page = request()->get('page', 1);
        $total = db()->query("SELECT COUNT(*) as count FROM posts p 
            JOIN categories c on c.id = p.category_id 
            WHERE c.slug = ?", [$slug])->getOne()['count'];
        $perPage = 10;
        $pagination = new Pagination($page, $perPage, $total);
        $start = $pagination->getOffset();

        $category = db()->query("SELECT * FROM categories WHERE slug = ?", [$slug])->getOne();
        if (!$category) {
            abort();
        }
        $posts = db()->query("SELECT 
            p.title, p.slug, p.excerpt, p.image, 
            DATE_FORMAT(p.created_at, '%b %D \'%y') as created_at, 
            c.title AS c_title, c.slug AS c_slug FROM posts p 
            JOIN categories c on c.id = p.category_id 
            WHERE c.id = ? ORDER BY p.created_at DESC LIMIT $start, $perPage", [$category['id']])->getAll();
        $title = 'Посты в категории: ' . $category['title'];
        return view('index', ['posts' => $posts, 'title' => $title, 'pagination' => $pagination]);
    }
}