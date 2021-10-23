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
        }
    }

?>