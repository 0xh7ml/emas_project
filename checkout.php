<?php

// include connection code
include('db_connection.php');

date_default_timezone_set('Asia/Dhaka');

// Grep the post request
if(isset($_POST['emp_id']) && !empty($_POST['emp_id'])){


    // Get employee ID from the session or from the request
    $emp_id = $_POST['emp_id'];

    // Get current date and time
    $current_date = date('Y-m-d');
    $check_out_time = date('H:i:s');

    // Update check-out time and calculate total working hours
    $query = "UPDATE tb_attendance 
            SET out_time = '$check_out_time',
                total_hours = TIMEDIFF('$check_out_time', in_time)
            WHERE employee_id = '$emp_id' AND date = '$current_date'";

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