<?php

namespace App\Controllers;

use App\Request;
use App\Controller;
use App\Session;

final class HomeController extends Controller
{

    public function __construct(Request $request, Session $session)
    {
        parent::__construct($request, $session);
    }
    public function index()
    {
        $user = $this->session->get('username');
        $dataview = ['title' => 'Todo', 'user' => $user['username']];
        $this->render($dataview);
    }
}
