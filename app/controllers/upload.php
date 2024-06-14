<?php
class Upload extends Controller
{
    public function index()
    {
    }

    public function image()
    {
        $data['page_title'] = "Upload Image";

        if(isset($_FILES['file']))
        {
            $model = $this->loadModel("Upload_file");
            $model->upload($_POST, $_FILES);
        }
        $this->view("catalog/upload_image", $data);
    }

    public function video()
    {
        $data['page_title'] = "Upload Video";
        $this->view("catalog/upload_video", $data);
    }
}