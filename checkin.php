<?php

// include connection code
include('db_connection.php');

date_default_timezone_set('Asia/Dhaka');

// Grep the post request
if(isset($_POST['emp_id']) && !empty($_POST['emp_id'])){

    // required param
    $current_date = date('Y-m-d');
    $current_time = date('H:i:s');
    $emp_id = $_POST['emp_id'];


    // prepare the query 
    $query = "INSERT INTO `tb_attendance` (`employee_id`, `date`, `in_time`,`status`) VALUES ('$emp_id', '$current_date', '$current_time', 'Present')";

    // echo $query;

    // execute the query
    $res = mysqli_query(
        $conn, $query
    );

    // after successfull execute redirect to the dashboard

    if($res){
        header('Location: dashboard.php');
    }
    else{
        echo mysqli_error($conn);
    }
}
else{
    echo FALSE;
}