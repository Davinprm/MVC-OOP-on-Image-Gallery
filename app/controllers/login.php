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

        $this->view('catalog/header', $data);
        $this->view("catalog/login", $data);
        $this->view("catalog/footer", $data);
    }
}