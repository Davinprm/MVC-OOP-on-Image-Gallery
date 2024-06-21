<?php
class User
{
    private $db;

    public function __construct()
    {
        // instantiate db class and save it on DB var
        $this->db = new Database();
    }

    // get post and file by construct param
    public function signup($POST)
    {
        $_SESSION['error'] = "";

        if ($_SESSION['error'] == "") {

            $arr = [
                'email' => esc($POST['email']),
                'password' => esc($POST['password']),
                // escaping string that we can't fully trust by adding addslashes func
                'date' => date("Y-m-d H:i:s"),
                // set date year month day with hour min sec
                'url_address' => get_random_string_max(60),
                // 60 char random string for url address
                'image' => ''
            ];

            $query = 'INSERT INTO users (email, password, date, url_address, image) VALUES (:email, :password, :date, :url_address, :image)';
            $this->db->insert($query, $arr);

            redirect("login/login");
            die;
        }
    }

    public function login($POST)
    {
        $_SESSION['error'] = "";

        if ($_SESSION['error'] == "") {

            $arr = [
                'email' => esc($POST['email']),
                'password' => esc($POST['password']),
            ];

            $query = 'SELECT * FROM users WHERE email = :email && password = :password LIMIT 1';
            $data = $this->db->show($query, $arr);

            if (is_array($data)) {

                $data = $data[0];

                $_SESSION['user_url'] = $data->url_address;
                $_SESSION['user_email'] = $data->email;
                redirect("catalog/photos");
                die;
            } else {

            }
        }
    }

    public function get_single_user($url_address)
    {
        $query = "SELECT * FROM users WHERE url_address = :url LIMIT 1";
        $arr['url'] = $url_address;
        $data = $this->db->show($query, $arr);
        return $data[0];
    }

    public function is_logged_in()
    {

        if (isset($_SESSION['user_url']) && isset($_SESSION['user_email'])) {
            return true;
        }

        return false;
    }
}