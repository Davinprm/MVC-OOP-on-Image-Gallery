<?php
class Pagination
{
    public function activepage()
    {
        $activepage = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
        return $activepage;
    }

    public function pagetotal()
    {
        $DB = new Database();
        $pagpage = 1;
        $query = "select * from images";
        $data = count($DB->read($query));
        $pagetotal = ceil($data / $pagpage);
        return $pagetotal;
    }
}