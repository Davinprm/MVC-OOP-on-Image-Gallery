<?php

class Home extends Controller
{
    public function index()
    {
        $this->view("catalog/index");
    }
}