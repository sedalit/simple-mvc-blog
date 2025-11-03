<?php

namespace App\Controllers;

use PHPFramework\Application;
use PHPFramework\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        $categories = cache()->get('categories');
        
        if (!$categories) {
            $categories = db()->findAll('categories');
            cache()->set('categories', $categories);
        }
  
        Application::container()->set('categories', $categories);

        $recentPosts = db()->query("SELECT * FROM posts ORDER BY id DESC LIMIT 5")->getAll();
        Application::container()->set('recentPosts', $recentPosts);
    }
}