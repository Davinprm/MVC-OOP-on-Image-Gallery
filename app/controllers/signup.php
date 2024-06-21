<?php
class Signup extends Controller
{
    public function index()
    {
        $data['page_title'] = "Sign Up";

        if (isset($_POST['submit']))
        // that string inside d POST var is d name of Input tag on sign up view
        {
            $model = $this->loadModel("User");
            $model->signup($_POST);
        }

        // //grab d data
        // $username = $_POST['username'];
        // $email = $_POST['email'];
        // $password = $_POST['password'];
        // $password = $_POST['password2'];

        $this->view("templates/header", $data);
        $this->view("login/signup", $data);
        $this->view("templates/footer", $data);
    }
}