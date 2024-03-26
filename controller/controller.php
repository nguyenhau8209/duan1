<?php
//render giao diện người dùng
//$path: tên file đường dẫn trong views
//$data: là dữ liệu được gửi vào view
function render($path, $data = [])
{
    extract($data);
    //['name'=>'ngocbq','email'=>'ngocbq3@fe.edu.vn']
    //khi extract
    //$name='ngocbq' và $email='ngocbq3@fe.edu.vn'
    $view = "views/" . $path . ".php";
    include_once $view;
}
