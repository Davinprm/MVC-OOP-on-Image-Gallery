<?php
class Photo_detail extends Controller
{
    public function index($url_address = '')
    {
        $data['page_title'] = "Photo Details";

        $model = $this->loadModel("load_images");
        $data['image'] = $model->get_single_image($url_address);
        $data['random_images'] = $model->get_images();

        $this->view("templates/header", $data);
        $this->view("catalog/photo_detail", $data);
        $this->view("templates/footer", $data);
    }
}