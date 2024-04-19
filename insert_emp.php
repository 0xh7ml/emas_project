<?php
include('db_connection.php');



// Insert Employee data


$sql_query = "INSERT INTO `tb_employee`(`emp_name`, `emp_phone`, `emp_address`, `emp_salary`, `emp_gender`) VALUES ('$_POST[name]','$_POST[phn]','$_POST[address]','$_POST[salary]','$_POST[gender]')";



$result = mysqli_query(
    $conn, $sql_query
);


if($result === TRUE){
    header("Location: view.php");
}
else{
    mysqli_close($conn);
}