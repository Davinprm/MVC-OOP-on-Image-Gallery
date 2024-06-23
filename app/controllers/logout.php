<?php
class Logout extends Controller
{
    public function index()
    {
        unset($_SESSION['user_url'], $_SESSION['email']);
        session_start();
        session_unset();
        session_destroy();
        redirect("photos");
    }
}