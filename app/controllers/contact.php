<?php
class Contact extends Controller
{
    public function index()
    {
        $data['page_title'] = "Home";

        $this->view('templates/header', $data);
        $this->view("contact/contact", $data);
        $this->view("templates/footer", $data);
    }
}