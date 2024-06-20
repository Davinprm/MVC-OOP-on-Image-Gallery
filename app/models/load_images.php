<?php

class Load_images
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // that param for search, fill with empty string cuz in case user did'nt put anything
    public function get_images($find = '')
    {
        $pagpage = 1;
        $activepage = (isset($_GET["page"])) ? $_GET["page"] : 1;
        $firstdata = ($pagpage * $activepage) - $pagpage;

        if ($find == '') {
            $query = "SELECT * FROM images ORDER BY id DESC LIMIT $firstdata, $pagpage";
            return $this->db->show($query);

        } else {
            $find = esc($find);
            $query = "SELECT * FROM images WHERE title LIKE '%$find%' ORDER BY id DESC LIMIT $firstdata, $pagpage";
            return $this->db->show($query);
        }
    }

    public function get_single_image($url_address)
    {
        $query = "UPDATE images SET views = views + 1 WHERE url_address = :url LIMIT 1";
        $arr['url'] = $url_address;
        $this->db->insert($query, $arr);

        $query = "SELECT * FROM images WHERE url_address = :url LIMIT 1";
        $arr['url'] = $url_address;
        $data = $this->db->show($query, $arr);
        return $data[0];
    }
}