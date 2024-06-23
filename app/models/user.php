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
            if ($this->db->insert($query, $arr)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function login($usernameOrEmail, $password)
    {
        $_SESSION['error'] = "";

        if ($_SESSION['error'] == "") {

            $row = $this->findUser($usernameOrEmail, $usernameOrEmail);
            if ($row == false) return false;

            $hashedPassword = $row->password;
            if (password_verify($password, $hashedPassword)) {
                return $row;
            }else{
                return false;
            }
        }
    }

    public function findUser($username, $email)
    {
        $this->db->query('SELECT * FROM users WHERE username = :username OR email = :email');
        $this->db->bind(':username', $username);
        $this->db->bind(':email', $email);

        $data = $this->db->single();

        // check row
        if ($this->db->rowCount() > 0) {
            return $data;
        } else {
            return false;
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

    public function createUserSession($user){
        $_SESSION['user_url'] = $user->url_address;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        redirect("index");
    }
}