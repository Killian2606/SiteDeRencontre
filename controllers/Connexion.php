<?php

class Connexion extends Controller
{

    public function index() {
        $this->render('index');
    }

    public function connexion() {
        if (!isset($_POST['pseudo']) || !isset($_POST['mot-de-passe'])) {
            header('Location: /connexion');
            exit();
        }

        $this->loadModel('User');

        $user = $this->User->findByLogin(addslashes($_POST['pseudo']), addslashes($_POST['mot-de-passe']));

        if ($user) {
            $_SESSION['id'] = $user['id'];
            header('Location: /');
            exit();
        } else {
            header('Location: /connexion');
            exit();
        }
    }

}