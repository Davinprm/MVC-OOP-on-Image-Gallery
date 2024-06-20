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
        if (!$result = $user->is_logged_in()) {
            redirect("login");
            die;
        }

        if (isset($_FILES['file'])) {
            $model = $this->loadModel("Upload_file");
            $model->upload($_POST, $_FILES);
        }

        $this->view('catalog/header', $data);
        $this->view("catalog/upload_image", $data);
        $this->view("catalog/footer", $data);
    }

    public function video()
    {
        $data['page_title'] = "Upload Video";
        $this->view("catalog/upload_video", $data);
    }
}