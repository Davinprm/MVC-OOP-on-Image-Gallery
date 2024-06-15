<?php

class Load_images
{
    public function get_images()
    {
        $DB = new Database();
        // instantiate d db class

        $query = "select * from images order by id desc limit 12";
        return $DB->read($query);
    }
}