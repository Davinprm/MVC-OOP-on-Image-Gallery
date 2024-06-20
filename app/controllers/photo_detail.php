<?php
class Photo_detail extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->loadModel("load_images");
    }

    public function index($url_address = '')
    {
        $data = [
            'page_title' => "Photo Details",
            'image' => $this->model->get_single_image($url_address),
            'random_images' => $this->model->get_images(),
        ];

        $this->view("catalog/header", $data);
        $this->view("catalog/photo_detail", $data);
        $this->view("catalog/footer", $data);
    }
}