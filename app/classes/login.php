<?php

    namespace App\classes;
    use App\classes\Database;

    class Login
    {
        public function loginCheck($data)
        {
            $email = $data['email'];
            $password = md5($data['password']);

            if ($email == '' or $password == '') {
                $loginError = "Username and password required";
                return $loginError;
            } else {
                
                $sql = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'";

                $result = mysqli_query(Database::dbConn(), $sql);

                if ($result) {
                    if (mysqli_num_rows($result) == 1) {

                        $row = mysqli_fetch_assoc($result);
                        session_start();
                        $_SESSION['userID'] = $row['id'];
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['photo'] = $row['photo'];
    
                        header('location: index.php');
                    } else {
                        $loginError = "Username or password invalid";
                        return $loginError;
                    }
                } else {
                    die();
                }

            }

        }
    }

?>