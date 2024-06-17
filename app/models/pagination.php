<?php
class Pagination
{
    private $URL = "";

	public function __construct()
	{
		$this->URL = $_GET;
	}
    public function activepage()
    {
        $activepage = isset($this->URL["page"]) ? (int)$this->URL["page"] : 1;
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