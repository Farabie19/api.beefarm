<?php

require "koneksi.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $response = [];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    $cek = "SELECT * FROM tb_user WHERE username= '$username' and password='$password'";
    
    $result = mysqli_fetch_array(mysqli_query($connect, $cek));

    
    if( isset($result) ) {
        $response['value'] = 1;
        $response['message'] = "Login Berhasil";
        $response['username'] = $result['username'];
        
        echo json_encode($response);
    } else {
        $response['value'] = 0;
        $response['message'] = "Login Gagal";
        
        echo json_encode($response);
    }
}

?>