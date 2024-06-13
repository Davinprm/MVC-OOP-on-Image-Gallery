<?php
class Videos extends Controller
{
    public function index()
    {
        $data['page_title'] = "Videos";
        $this->view("catalog/videos", $data);
    }
}