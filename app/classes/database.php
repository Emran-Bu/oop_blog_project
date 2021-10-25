<?php

    namespace App\classes;

    class Database
    {
        
        public static function dbConn()
        {
            $host = "localhost";
            $user = "root";
            $pass = "";
            $db_name = 'oop_blog_project';

            $conn = mysqli_connect($host,$user,$pass,$db_name);

            return $conn;

            // $sql = "SELECT * FROM users";

            // $result = mysqli_query($conn, $sql);
            // $result1 = mysqli_fetch_assoc($result);

            // return $result1;

        }

    }

    // $obj = new Database();
    // $result2 = $obj->dbConn();
    // array($result);
    // echo $result;
    // print_r(array($result));
    // print_r($result2);

?>