<?php

    namespace App\classes;
    use App\classes\Database;

    class Blog
    {
        public function addBlog($data)
        { 
            // photo name customize
            $photo_file_name = $_FILES['photo']['name'];
            $photo_exe_divide = explode('.', $photo_file_name);
            $photo_exe = end($photo_exe_divide);

            $photo_name = date('Y_m_d_h_i_s_') . $photo_exe_divide[0] . "." . $photo_exe;
            
            // add Category table data
            $cat_id = $data['cat_id'];
            $title = $data['title'];
            $content = $data['content'];
            $name = $data['name'];
            $photo_tmp_name = $_FILES['photo']['tmp_name'];
            $status = isset($data['status']);

            if ($cat_id == '' or $title == '' or $content == '' or $name == '' or $status == '' or empty($photo_name)) {
                $blogError = "All field are required";
                return $blogError;
            } else {
                $sql = "INSERT INTO blog (cat_id, title, content, photo, name, status) values ({$cat_id}, '{$title}' , '{$content}', '{$photo_name}' , '{$name}', '{$status}')";

                $result = mysqli_query(Database::dbConn(), $sql);

                if ($result) {
                    move_uploaded_file($photo_tmp_name, '../upload/'. $photo_name);
                    $blogError = "Blog Saved Successfully";
                    return $blogError;
                } else {
                    die('Query Unsuccessfully');
                }
            }
        }

        // show blog data blog manage page
        public function allBlog()
        {
            $sql = "SELECT `blog`.*, `category`.`category_name` FROM `blog` JOIN `category` ON `blog`.`cat_id` = `category`.`id` ORDER BY `id` DESC";
            $result = mysqli_query(Database::dbConn(), $sql);
            return $result; 
        }
        
    }

?>