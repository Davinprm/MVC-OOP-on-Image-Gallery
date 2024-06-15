<?php
class Home extends Controller
{
    public function index()
    {
        $data['page_title'] = "Photos";

        $load_class = $this->loadModel("load_images");
        $data['images'] = $load_class->get_images();
        $this->view("catalog/index", $data);
    }
}