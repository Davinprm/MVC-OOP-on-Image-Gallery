<?php
class Signup extends Controller
{
    public function index()
    {
        $data['page_title'] = "Sign Up";

        if (isset($_POST['submit'])) {

            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $model = $this->loadModel("User");

            //grab d data
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $password2 = trim($_POST['password2']);

            if (empty($username) || empty($email) || empty($password) || empty($password2)) {
                flash("signup", "Please fill out all inputs");
                // redirect("signup");
            }

            if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                flash("signup", "Invalid Email");
                // redirect("signup");
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                flash("signup", "Invalid Email");
                // redirect("signup");
            }

            if (strlen($password) < 6) {
                flash("signup", "Invalid password");
                redirect("signup");
            } else if ($password !== $password2) {
                flash("signup", "Passwords doesn't match");
                // redirect("signup");
            }

            // user with d same email or username already exists
            if ($model->findUser($username, $email)) {
                flash("signup", "Email or username is already taken");
                redirect("signup");
            }

            // passed all validation checks

            //register user
            if ($model->signup($username, $email, $password)) {
                redirect("login");
            } else {
                die("Something went wrong");
            }
        }

        $this->view("templates/header", $data);
        $this->view("login/signup", $data);
        $this->view("templates/footer", $data);
    }
}

$init = new Signup;
//Ensure that user is sending a post request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['type']) {
        case 'signup':
            $init->index();
            break;
        default:
            redirect("photos");
    }
}