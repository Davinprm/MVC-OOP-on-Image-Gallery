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
    public function signup($username, $email, $password)
    {
        $_SESSION['error'] = "";

        if ($_SESSION['error'] == "") {

            // hash d pass
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $arr = [
                'username' => esc($username),
                'email' => esc($email),
                'password' => esc($hashedPassword),
                // escaping string that we can't fully trust by adding addslashes func
                'date' => date("Y-m-d H:i:s"),
                // set date year month day with hour min sec
                'url_address' => get_random_string_max(60),
                // 60 char random string for url address
                'image' => ''
            ];

            $query = 'INSERT INTO users (username, email, password, date, url_address, image) VALUES (:username, :email, :password, :date, :url_address, :image)';
            $this->db->insert($query, $arr);
            redirect("login/login");
            die;
        }
    }

    public function login($email, $password)
    {
        $_SESSION['error'] = "";

        if ($_SESSION['error'] == "") {

            $arr = [
                'username' => $email,
                'email' => $email,
            ];

            $query = 'SELECT password FROM users WHERE username = :username OR email = :email LIMIT 1';
            $data = $this->db->show($query, $arr);

            // check row
            if ($this->db->rowCount() == 0) {
                redirect("login/login");
                exit();
            }

            $checkPassword = password_verify($password, $data[0]->password);

            if ($checkPassword == false) {
                redirect("login/login");
                exit();
            } else if ($checkPassword == true) {
                $ar = [
                    'username' => $email,
                    'email' => $email,
                    'password' => $password
                ];
                $query = 'SELECT * FROM users WHERE username = :username OR email = :email AND password = :password LIMIT 1';
                $user = $this->db->show($query, $ar);

                $_SESSION['username'] = $user[0]->username;
                $_SESSION['email'] = $user[0]->email;
            }

            if (is_array($data)) {

                $data = $data[0];

                $_SESSION['user_url'] = $data->url_address;
                $_SESSION['email'] = $data->email;
                redirect("catalog/photos");
                die;
            } else {

            }
        }
    }

    public function getSingleUser($url_address)
    {
        $query = "SELECT * FROM users WHERE url_address = :url LIMIT 1";
        $arr['url'] = $url_address;
        $data = $this->db->show($query, $arr);
        return $data[0];
    }

    public function isLoggedIn()
    {

        if (isset($_SESSION['user_url']) && isset($_SESSION['email'])) {
            return true;
        }

        return false;
    }

    public function findUser($username, $email)
    {
        $query = 'SELECT username FROM users WHERE username = :username OR email = :email;';
        $arr = [
            'username' => $username,
            'email' => $email
        ];

        $data = $this->db->single($query, $arr);

        if (!is_string($data['username']) || !is_string($data['email'])) {
            $data = null;
            redirect("login/signup");
        }

        // check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}