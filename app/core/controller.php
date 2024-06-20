<?php

class Controller
{
    public function view($view, $data = [])
    {
        if (file_exists("../app/views/" . $view . ".php"))
        // check existing file // go to outside folder n find views folder with [0] index as a file name, (if it's match) then concatenating with php extension
        {
            // include func is same as require func, but will continue executing even if d file isn't found
            include "../app/views/" . $view . ".php";
        }
    }

    public function loadModel($model)
    {
        if (file_exists("../app/models/" . strtolower($model) . ".php"))
        // check existing file // go to outside folder n find views folder with [0] index as a file name, (if it's match) then concatenating with php extension
        {
            // include func is same as require func, but will continue executing even if d file isn't found
            include "../app/models/" . strtolower($model) . ".php";
            return $model = new $model();
        }
    }
}
