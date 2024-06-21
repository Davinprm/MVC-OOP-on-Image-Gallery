<?php
class Login extends Controller
{
    public function index()
    {
        $data['page_title'] = "Login";

        if (isset($_POST['email'])) {
            $model = $this->loadModel("User");
            $model->login($_POST);
        }

        $this->view('templates/header', $data);
        $this->view("login/login", $data);
        $this->view("templates/footer", $data);
    }
}