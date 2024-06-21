<?php
class Logout extends Controller
{
    public function index()
    {
        unset($_SESSION['user_url'], $_SESSION['user_email']);
        redirect("catalog/photos");
        die;
    }
}