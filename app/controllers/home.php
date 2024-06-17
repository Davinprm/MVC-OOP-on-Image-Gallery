<?php
class Home extends Controller
{
    public function index()
    {
        $data['page_title'] = "Photos";

        $load_class = $this->loadModel("load_images");

        $find = isset($_GET['find']) ? $_GET['find'] : "";
        $data['images'] = $load_class->get_images($find);

        $this->view("catalog/index", $data);
    }
}