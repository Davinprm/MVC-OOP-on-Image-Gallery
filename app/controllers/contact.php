<?php
class Contact extends Controller
{
    public function index()
    {
        $data['page_title'] = "Home";

        $this->view('catalog/header', $data);
        $this->view("catalog/contact", $data);
        $this->view("catalog/footer", $data);
    }
}