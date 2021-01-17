<?php

namespace App\Controllers;

use App\Request;
use App\Controller;
use App\Session;

final class BlogController extends Controller
{

    public function __construct(Request $request, Session $session)
    {
        parent::__construct($request, $session);
    }
    public function index()
    {
        $user = $this->session->get('username');
        $this->selectd();
    }
    public function insertd()
    {
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $cont = filter_input(INPUT_POST, 'cont', FILTER_SANITIZE_STRING);
        $tag = filter_input(INPUT_POST, 'tag', FILTER_SANITIZE_STRING);

        $user = $this->session->get('username');
        $condition = ['user', $user['id']];

        $data2 = ['title' => $title, 'cont' => $cont, 'user' => $user['id']];
        $data3 = ['tag' => $tag];
        $this->getDB()->insert('tags', $data3);
        $this->getDB()->insert('post', $data2);

        $data = $this->getDB()->selectWhere('post', ['id', 'title', 'cont', 'create_date', 'modify_date'], $condition);
        $this->render(['title' => 'Todo', 'user' => $user['username'], 'data' => $data], 'blog');
    }
    public function selectd()
    {
        $user = $this->session->get('username');
        $condition = ['user', $user['id']];
        $data = $this->getDB()->selectWhere('post', ['id', 'title', 'cont', 'create_date', 'modify_date'], $condition);

        $this->render(['title' => 'Todo', 'user' => $user['username'], 'data' => $data], 'blog');
    }
    public function removed()
    {
        $idPost = filter_input(INPUT_POST, 'idPost', FILTER_SANITIZE_STRING);

        $user = $this->session->get('username');

        $this->getDB()->removep('comments', $idPost);
        $this->getDB()->remove('post', $idPost);
        $condition = ['user', $user['id']];

        $data = $this->getDB()->selectWhere('post', ['id', 'title', 'cont', 'create_date', 'modify_date'], $condition);
        $this->render(['title' => 'Todo', 'user' => $user['username'], 'data' => $data], 'blog');
    }
    public function editd()
    {
        $ntitle = filter_input(INPUT_POST, 'newtitle', FILTER_SANITIZE_STRING);
        $ncont = filter_input(INPUT_POST, 'newcont', FILTER_SANITIZE_STRING);
        $nidPost = filter_input(INPUT_POST, 'idPostF', FILTER_SANITIZE_STRING);

        $user = $this->session->get('username');
        $data2 = ['title' => $ntitle, 'cont' => $ncont];
        $conditions = ['id', $nidPost];
        $condition = ['user', $user['id']];
        $this->getDB()->update('post', $data2, $conditions);

        $data = $this->getDB()->selectWhere('post', ['id', 'title', 'cont', 'create_date', 'modify_date'], $condition);
        $this->render(['title' => 'Todo', 'user' => $user['username'], 'data' => $data], 'blog');
    }
}
