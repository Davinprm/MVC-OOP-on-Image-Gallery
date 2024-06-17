<?php

class Load_images
{
    // that param for search, fill with empty string cuz in case user did'nt put anything
    public function get_images($find)
    {
        $DB = new Database();
        // instantiate d db class

        if($find == '')
        {
            $query = "select * from images order by id desc limit 12";
            return $DB->read($query);

        } else {
            $query = "select * from images where title like '%$find%' order by id desc limit 12";
            return $DB->read($query);
        }


    }
}