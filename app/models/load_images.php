<?php

class Load_images
{
    // that param for search, fill with empty string cuz in case user did'nt put anything
    public function get_images($find)
    {
        $DB = new Database();
        $pagpage = 1;
        $activepage = (isset($_GET["page"])) ? $_GET["page"] : 1;
        $firstdata = ($pagpage * $activepage) - $pagpage;

        if($find == '')
        {
            $query = "select * from images order by id desc limit $firstdata, $pagpage";
            return $DB->read($query);

        } else {
            $find = esc($find);
            $query = "select * from images where title like '%$find%' order by id desc limit $firstdata, $pagpage";
            return $DB->read($query);
        }
    }
}