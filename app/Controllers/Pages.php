<?php

namespace App\Controllers;

use App\Helpers\Helpers;
use App\Libs\Controller;

class Pages extends Controller {
    public function __construct()
    {
        $this->postModel = $this->model('Post');
    }

    public function index()
    {
        if (Helpers::isLoggedIn()) {
            Helpers::redirect('posts');
        }

        $posts = $this->postModel->getPosts();
        $data = [
            'title' => 'SharePosts',
            'description' => 'Simple social network built on the custom MVC framework'
        ];

        $this->view('pages/index', $data);
    }

    public function about($id = null)
    {
        $data = [
            'title' => 'About Us',
            'description' => 'App to share posts with other users'
        ];
        $this->view('pages/about', $data);
    }
}