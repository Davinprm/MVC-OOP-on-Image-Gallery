<?php
class Pagination
{
    private $URL = "";
    private $db;

	public function __construct()
	{
		$this->URL = $_GET;
        $this->db = new Database();
	}
    public function activepage()
    {
        $activepage = isset($this->URL["page"]) ? (int)$this->URL["page"] : 1;
        return $activepage;
    }

    public function pagetotal()
    {
        $pagpage = 1;
        $query = 'SELECT * FROM images';
        $data = count($this->db->show($query));
        $pagetotal = ceil($data / $pagpage);
        return $pagetotal;
    }
}