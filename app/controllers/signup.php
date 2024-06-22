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

            //grab d data
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];

            if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                flash("signup", "Invalid Email");
                redirect("login/signup");
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                flash("signup", "Invalid username");
                redirect("login/signup");
            }

            if (strlen($password) < 6) {
                flash("signup", "Invalid password");
                redirect("login/signup");
            } else if ($password !== $password2) {
                flash("signup", "Passwords doesn't match");
                redirect("login/signup");
            }

            // user with d same email or username already exists
            if ($model->findUser($email, $username) == false) {
                flash("signup", "Email or username is already taken");
                redirect("login/signup");
            }

            if (empty($username) || empty($email) || empty($password) || empty($password2)) {
                flash("signup", "Please fill out all inputs");
                redirect("login/signup");
            }
            // passed all validation checks
            $model->signup($username, $email, $password);
        }

        $this->view("templates/header", $data);
        $this->view("login/signup", $data);
        $this->view("templates/footer", $data);
    }
}