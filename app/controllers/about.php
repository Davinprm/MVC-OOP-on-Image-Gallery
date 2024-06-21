<?php
class About extends Controller
{
    public function index()
    {
        $data['page_title'] = "About";

        $this->view('templates/header', $data);
        $this->view("about/about", $data);
        $this->view("templates/footer", $data);
    }
}