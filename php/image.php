<?php
session_start();
include_once "config.php";

if(isset($_FILES['image'])){
    $img_name = $_FILES['image']['name'];
    $img_type = $_FILES['image']['type'];
    $tmp_name = $_FILES['image']['tmp_name'];
    
    $img_explode = explode('.',$img_name);
    $img_ext = end($img_explode);

    $extensions = ["jpeg", "png", "jpg"];
    if(in_array($img_ext, $extensions) === true){
        $types = ["image/jpeg", "image/jpg", "image/png"];
        if(in_array($img_type, $types) === true){
            $time = time();
            $new_img_name = $time.$img_name;
            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                $insert_query = mysqli_query($connectDB, "INSERT INTO users (image)
                VALUES ('{$new_img_name}')");
                if($insert_query){
                    $select_sql = mysqli_query($connectDB, "SELECT * FROM users WHERE login = '{$login}'");
                    
                    if(mysqli_num_rows($select_sql) > 0){
                        $result = mysqli_fetch_assoc($select_sql);
                        echo "success";
                    }
                }
            }
        }

    }
}


 ?>