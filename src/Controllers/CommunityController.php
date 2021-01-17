<?php

namespace App\Controllers;

use App\Request;
use App\Controller;
use App\Session;

final class CommunityController extends Controller
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
        $user = $this->session->get('username');

        $data = $this->getDB()->selectAll('post', ['id', 'title', 'cont', 'user', 'create_date', 'modify_date']);

        $this->render(['title' => 'Todo', 'user' => $user['username'], 'data' => $data], 'community');
    }
}
