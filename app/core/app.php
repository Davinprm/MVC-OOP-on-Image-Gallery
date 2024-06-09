<?php
class App
{
    // constructor will accepted param from d obj that tergeting App class //this func also automatically
    public function __construct()
    {
        $url = $this->splitUrl();
        //catch splitUrl func n save it to url var

        if (file_exists("../controllers/" . $url[0] . ".php"))
        // check existing file // go to outside folder n find controllers folder with [0] index as a file name, (if it's match) then concatenating with php extension
        {

        }
    }

    private function splitURL()
    {
        return explode("/", filter_var(trim($_GET['url'], "/")), FILTER_SANITIZE_URL);
        // sanitizing n validating user input on URL // second param is to remove any char that not allowed in URL 
        // split a string with explode func on separator (/ = first param) into array with index on it
            // [0] index will be controller
        // remove whitespace char from a string that caused by user who customized url(/ = second param)
    }
}