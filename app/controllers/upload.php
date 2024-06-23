<?php
class Upload extends Controller
{
    public function index()
    {
    }

    public function image()
    {
        $data['page_title'] = "Upload Image";

        $user = $this->loadModel("user");
        // check if user is logged in
        if (false == $user->isLoggedIn()) {
            redirect("login/login");
            die;
        }

        if (isset($_FILES['file'])) {
            $model = $this->loadModel("Upload_file");
            $model->upload($_POST, $_FILES);
        }

        $this->view('templates/header', $data);
        $this->view("upload/upload_image", $data);
        $this->view("templates/footer", $data);
    }

    public function video()
    {
        $data['page_title'] = "Upload Video";
        $this->view("upload/upload_video", $data);
    }
}