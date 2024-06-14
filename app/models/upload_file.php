<?php
class Upload_file
{
    // get post and file by construct param
    public function upload($POST, $FILES)
    {
        $_SESSION['error'] = "";

        // type of file that allowed
        $allowed[] = 'image/jpeg';
        $allowed[] = 'video/mp4';

        // upload d file
        if ($FILES['file']['name'] != "" && $FILES['file']['error'] == 0)
        // checking if d file should have name and d error should zero
        {
            if (in_array($FILES['file']['type'], $allowed))
            // to check existing val in array with first param as d subj array that want to search
            // and second param is to find d obj array. if d val exists in array will return true
            {

            } else {
                $_SESSION['error'] = 'Only "jpegs" are allowed! ';
                // if d type r not allowed, show warning
            }
        }

        if ($_SESSION['error'] == "") {
            $folder = "uploads/";

            //check existing folder, if it's not, make dir
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
                // make folder with "uploads" name
                // first param is to specifies d path to d new dir n d second param to specifies d permissions for d new dir with "0777" as a def val 

            }

            $destination = $folder . $FILES['file']['name'];
            // concatenate d file destination with "uploads/" n d file name

            move_uploaded_file($FILES['file']['tmp_name'], $destination);
            // move uploaded file from temporary dir to specified location n d server 
            // first patam is $tmp_name as d name of d file and second param is d new location for d file

            // $title = esc($POST['title']);
            // // escaping string that we can't fully trust by adding addslashes func
            // $date = date("Y-m-d H:i:s");
            // // set date year month day with hour min sec
            // $url_address = "";

            // $DB = new Database();
            // // instantiate db class and save it on DB var
            // $query = "insert into images () values ()";
            // //
            // $DB->write();
            // // 

            // header("Location: " . ROOT . "photos");
            // die;
        }
    }
}