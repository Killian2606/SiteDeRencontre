<?php

class Users extends Controller
{

    public function index()
    {
        header('Location: /');
        exit();
    }

    public function like(int $id)
    {
        $this->loadModel('Matchs');
        $this->Matchs->like($_SESSION['id'], $id);
        header('Location: /');
        exit();
    }

    public function voir(int $id) {
        $this->loadModel('User');

        $user = $this->User->getById($id);

        $this->render('voir', ['utilisateur' => $user]);
    }
}