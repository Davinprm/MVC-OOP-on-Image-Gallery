<?php

class Load_images
{
    // that param for search, fill with empty string cuz in case user did'nt put anything
    public function get_images($find = '')
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

    public function get_single_image($url_address)
    {
        $DB = new Database();
        $query = "update images set views = views + 1 where url_address = :url limit 1";
        $arr['url'] = $url_address;
        $DB->write($query, $arr);

        $DB = new Database();
        $query = "select * from images where url_address = :url limit 1";
        $arr['url'] = $url_address;
        $data =  $DB->read($query, $arr);
        return $data[0];

    }
}