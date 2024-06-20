<?php
class Home extends Controller
{
    public function index()
    {
        $page = $this->loadModel("Pagination");
        $data = [
            'page_title' => "Photos",
            'activepage' => $page->activepage(),
            'pagetotal' => $page->pagetotal(),
            'images' => $this->loadModel("load_images")->get_images(isset($_GET['find']) ? $_GET['find'] : ""),
        ];
        $this->view("catalog/header", $data);
        $this->view("catalog/index", $data);
        $this->view("catalog/footer", $data);
    }
}