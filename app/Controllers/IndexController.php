<?php

namespace App\Controllers;

use PHPFramework\Pagination;

class IndexController extends BaseController {

    public function index() : mixed
    {
        $page = request()->get('page', 1);
        $total = db()->count('posts');
        $perPage = 10;
        $pagination = new Pagination($page, $perPage, $total);
        $start = $pagination->getOffset();
        $posts = db()->query("SELECT 
            p.title, p.slug, p.excerpt, p.image, 
            DATE_FORMAT(p.created_at, '%b %D \'%y') as created_at, 
            c.title AS c_title, c.slug AS c_slug FROM posts p 
            JOIN categories c on c.id = p.category_id ORDER BY p.created_at DESC
            LIMIT $start, $perPage")->getAll();
        $title = 'Все посты';
        return view('index', ['posts' => $posts, 'title' => $title, 'pagination' => $pagination]);
    }
}