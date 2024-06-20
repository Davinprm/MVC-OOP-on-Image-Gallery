<?php
class Signup extends Controller
{
    public function index()
    {
        $data['page_title'] = "Sign Up";

        if(isset($_POST['email']))
        {
            $model = $this->loadModel("User");
            $model->signup($_POST);
        }

        $this->view("catalog/header", $data);
        $this->view("catalog/signup", $data);
        $this->view("catalog/footer", $data);
    }
}