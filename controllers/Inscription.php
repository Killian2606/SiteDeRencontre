<?php

class Inscription extends Controller
{
    public function index() {
        $this->render('index');
    }

    public function inscription() {
        //var_dump($_POST);
        //exit();
        if (!isset($_POST['pseudo']) || !isset($_POST['mot-de-passe']) || !isset($_POST['resume']) || !isset($_POST['description']) || !isset($_FILES['photo'])) {
            header('Location: /inscription');
            exit();
        }

        $this->loadModel('User');

        $photo = $_FILES['photo'];
        $message = $this->User->insertUser(addslashes($_POST['pseudo']), addslashes($_POST['mot-de-passe']), addslashes($_POST['resume']), addslashes($_POST['description']), file_get_contents($photo['tmp_name']));

        if ($message == 'Erreur') {
            header('Location: /inscription');
        } else {
            $_SESSION['id'] = $message['MAX(`id`)'];
            header('Location: /');
        }
        exit();
    }
}