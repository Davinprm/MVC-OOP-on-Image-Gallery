<?php
class Login extends Controller
{
    public function index()
    {
        $data['page_title'] = "Login";
        if (isset($_POST['submit'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $model = $this->loadModel("User");

            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (empty($email) || empty($password)) {
                flash("login", "Please fill out all inputs");
                // redirect("login");
            }

            if ($model->findUser($email, $email)) {
                //user found
                $loggedInUser = $model->login($email, $password);
                if ($loggedInUser) {
                    //create session
                    $model->createUserSession($loggedInUser);
                } else if ($loggedInUser == false){
                    flash("login", "Password Incorrect");
                    // redirect("login");
                }
            } else {
                flash("login", "No user found");
                // redirect("login");
            }
        }

        $this->view('templates/header', $data);
        $this->view("login/login", $data);
        $this->view("templates/footer", $data);
    }
}

$init = new Login;
//Ensure that user is sending a post request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['type']) {
        case 'login':
            $init->index();
            break;
        default:
            redirect("photos");
    }
}