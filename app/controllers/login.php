<?php
class Login extends Controller
{
    public function index()
    {
        $data['page_title'] = "Login";

        if (isset($_POST['submit'])) {
            $model = $this->loadModel("User");

            $email = $_POST['email'];
            $password = $_POST['password'];

            if (empty($email) || empty($password)) {
                flash("signup", "Please fill out all inputs");
                redirect("signup");
            }
  
            $model->login($email, $password);
        }

        $this->view('templates/header', $data);
        $this->view("login/login", $data);
        $this->view("templates/footer", $data);
    }
}