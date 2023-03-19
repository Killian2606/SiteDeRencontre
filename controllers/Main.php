<?php

class Main extends Controller
{

    public function index() {
        $this->loadModel('User');
        $this->loadModel('Matchs');

        $this->render('index', ['utilisateurs' => $this->User->getAll()]);
    }
}