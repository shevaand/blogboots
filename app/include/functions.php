<?php

function get_categories($link)
{
    global $link;

    $sql = "SELECT * FROM categories";

    $result = mysqli_query($link , $sql);

    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC );

    return $categories;

}

/**
 *
 */
function get_posts() {

    global $link;

    $sql = "SELECT * FROM posts";
    $result = mysqli_query($link , $sql);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC );
    return $posts;
}


function get_post_by_id($post_id) {
    global $link;

    $sql = "SELECT * FROM posts WHERE id= ".$post_id;

    $result = mysqli_query ($link, $sql);

    $post = mysqli_fetch_assoc ($result);

    return $post;
} 

function generate_code($length = 8){
    $srting = '';
    $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
    $num_chars =strlen($chars);

    for ($i=0; $i < $length ; $i++) { 
        $string .= substr($chars, rand(1, $num_chars) -1 ,1);
    }

    return $string;

}

function insert_subscriber( $email){  

    global $link;

    $email = mysqli_real_escape_string($link, $email);

    //1.есть ли подписчик в базе subscribes
     $query = "SELECT * FROM subscribes WHERE email = '$email'";

     $result = mysqli_query($link, $query);

     if (!mysqli_num_rows($result)) {
          //2. если нет создаём подписч. с уник кодом (неактивного)
        $subscriber_code = generate_code();

        $insert_query = "INSERT INTO subscribes (email, code) VALUES ('$email', '$subscriber_code') ";

        $result = mysqli_query($link, $insert_query);

        if ($result) {
            return 'created';
        }else{
            return 'fail';
        }
     }else{
        //если есть подписчик, перенаправим человека на главную
        return 'exist';
     }
    
   
}

function get_posts_by_category ($category_id){

    global $link;

    $category_id = mysqli_real_escape_string($link, $category_id);

    $sql ='SELECT * FROM posts WHERE category_id = "'.$category_id.'"';

    $result = mysqli_query($link , $sql);

    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC );

    return $posts;
}

function get_category_title($category_id){

    global $link;

    $category_id = mysqli_real_escape_string($link, $category_id);

    $sql = 'SELECT title FROM categories WHERE id = "'.$category_id.'"';

    $result = mysqli_query ($link, $sql);

    $category = mysqli_fetch_assoc ($result);

    return $category['title'];
}

//Для админки

function articles_all(){
    
}

function articles_get($id){
    
}

function articles_new($title, $date, $content){
    
}

function articles_edir($id, $title, $date, $content){
    
}

function articles_delete($id){
    
}

//конец админки