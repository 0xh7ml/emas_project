<?php

include('db_connection.php');

// Update Employee data

if(isset($_POST['id']) && !empty($_POST['id'])){
    
    $id = $_POST['id'];
    echo $id;   

    $sql_query = "UPDATE `tb_employee` SET `emp_name`='$_POST[name]',`emp_phone`='$_POST[phn]',`emp_address`='$_POST[address]',`emp_salary`='$_POST[salary]',`emp_gender`='$_POST[gender]' WHERE `emp_id`=" .$id ;

    $result = mysqli_query(

    $conn, $sql_query
    );

    if($result === TRUE){
    header("Location: view.php");

    }

    else{
    mysqli_close($conn);
    }
}
else{
    echo 'Error happend';
}
