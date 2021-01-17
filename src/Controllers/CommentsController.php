<?php

namespace App\Controllers;

use App\Request;
use App\Controller;
use App\Session;

final class CommentsController extends Controller
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

    public function selectd()
    {

        $params = $this->request->getParams();
        $id = $params['id'];
        $condition = ['id', $id];
        $condition2 = ['post', $id];


        $user = $this->session->get('username');
        $data = $this->getDB()->selectWhere('post', ['id', 'title', 'cont', 'user', 'create_date', 'modify_date'], $condition);
        $coms = $this->getDB()->selectWhere('comments', ['comment', 'user'], $condition2);

        $this->render(['title' => 'Todo', 'user' => $user['username'], 'data' => $data, 'coms' => $coms], 'comments');
    }
    public function insertd()
    {
        $insert = filter_input(INPUT_POST, 'insert', FILTER_SANITIZE_STRING);

        $params = $this->request->getParams();
        $id = $params['id'];
        $condition = ['id', $id];
        $condition2 = ['post', $id];

        $user = $this->session->get('username');
        $data2 = ['comment' => $insert, 'user' => $user['id'], 'post' => $id];

        $this->getDB()->insert('comments', $data2);
        $data = $this->getDB()->selectWhere('post', ['id', 'title', 'cont', 'user', 'create_date', 'modify_date'], $condition);
        $coms = $this->getDB()->selectWhere('comments', ['comment', 'user'], $condition2);

        $this->render(['title' => 'Todo', 'user' => $user['username'], 'data' => $data, 'coms' => $coms], 'comments');
    }
}
