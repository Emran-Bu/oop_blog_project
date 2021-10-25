<?php

    namespace App\classes;

    class Category
    {
        public function addCategory($data)
        {
            $category_name = $data['category_name'];
            $status = isset($data['status']);

            if ($category_name == '' or $status == '') {
                $categoryError = "Category Name and status required";
                return $categoryError;
            } else {
                $sql = "INSERT INTO category (category_name, status) values ('{$category_name}', '{$status}')";

                $result = mysqli_query(Database::dbConn(), $sql);

                if ($result) {
                    $categoryError = "Category Saved Successfully";
                    return $categoryError;
                } else {
                    die('Query Unsuccessfully');
                }
            }
            
        }
    }

?>