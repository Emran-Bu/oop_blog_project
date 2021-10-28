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
            
            // add blog table data
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

        // update Category table data
        public function updateBlog($data)
        {
            // print_r($data);
            // echo $_GET['photo'];
            // exit();
            

            // photo name customize
            $photo_file_name = $_FILES['photo']['name'];
            $photo_exe_divide = explode('.', $photo_file_name);
            $photo_exe = end($photo_exe_divide);

            $photo_name = date('Y_m_d_h_i_s_') . $photo_exe_divide[0] . "." . $photo_exe;
            
            // update blog table data
            $id = $data['id'];
            $cat_id = $data['cat_id'];
            $title = $data['title'];
            $content = $data['content'];
            $name = $data['name'];
            $photo_tmp_name = $_FILES['photo']['tmp_name'];
            $status = $data['status'];

            if ($cat_id == '' or $title == '' or $content == '' or $name == '' or $status == '') {
                $blogError = "All field are required";
                return $blogError;
            } else {
                $deletePhoto = $_GET['photo'];
                unlink('../upload/'. $deletePhoto);
                if ($_FILES['photo']['name'] == null) {
                    $sql = "UPDATE blog set cat_id = '$cat_id', title = '$title', content = '$content', name = '$name', status = '$status' where id = '{$id}'";

                    $result = mysqli_query(Database::dbConn(), $sql);

                    if ($result) {
                        $blogError = "Blog update Successfully";
                        header('location: manage_blog.php');
                        return $blogError;
                    } else {
                        die('Query Unsuccessfully');
                    }
                } else {
                    $sql = "UPDATE blog set cat_id = '$cat_id', title = '$title', content = '$content', name = '$name', photo = '$photo_name', status = '$status' where id = '{$id}'";

                    $result = mysqli_query(Database::dbConn(), $sql);

                    if ($result) {
                        move_uploaded_file($photo_tmp_name, '../upload/'. $photo_name);
                        $blogError = "Blog update Successfully";
                        header('location: manage_blog.php');
                        return $blogError;
                    } else {
                        die('Query Unsuccessfully');
                    }
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

        // show blog data update manage page 
        public function showBlog($showBlogID)
        {
            $sql = "SELECT * FROM blog where id = $showBlogID";
            $result = mysqli_query(Database::dbConn(), $sql);
            return $result;
            
        }

        // delete Blog table data
        public function deleteBlog($deleteID)
        {
            $sql = "DELETE FROM blog where id = $deleteID";
            $result = mysqli_query(Database::dbConn(), $sql);
            if (isset($result)) {
                header('location: manage_blog.php');
                return $result;
            }
        }

        // active Category table data
        public function active($activeId)
        {
            $sql = "UPDATE blog set status = 1 where id = '{$activeId}'";
            $result = mysqli_query(Database::dbConn(), $sql);
            if (isset($result)) {
                header('location: manage_blog.php');
                return $result;
            }
            
        }

        // inactive Category table data
        public function inactive($inactiveId)
        {
            $sql = "UPDATE blog set status = 0 where id = '{$inactiveId}'";
            $result = mysqli_query(Database::dbConn(), $sql);
            if (isset($result)) {
                header('location: manage_blog.php');
                return $result;
            }
        }
        
    }

?>