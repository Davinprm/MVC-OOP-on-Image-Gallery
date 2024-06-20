<?php
class About extends Controller
{
    public function index()
    {
        $data['page_title'] = "About";

        $this->view('catalog/header', $data);
        $this->view("catalog/about", $data);
        $this->view("catalog/footer", $data);
    }
}