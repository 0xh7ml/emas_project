<?php
include('db_connection.php');
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM `tb_employee` WHERE emp_id =" . $id ;
    $res = mysqli_query($conn, $query);
    if($res){
        header("Location: view.php");
        exit();
    }
    else{
        echo 'Error happened';
    }
}