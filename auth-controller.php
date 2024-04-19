<?php 

session_start();
include('db_connection.php');

if(isset($_POST["submit"]) && !empty($_POST["uname"]) && !empty($_POST["uname"])){

    $username = $_POST["uname"];
    $password = $_POST["pswd"];

    $sql = "SELECT * from tb_users where username = '$username' AND password = '$password'";


    $res = mysqli_query(
        $conn, $sql
    );

    if($res->num_rows == 1 ){
        $row = $res->fetch_assoc();

        echo $row;
        if($row['username'] == $username){

            // Set session variables
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['emp_id'] = $row['emp_id'];
            $_SESSION['username'] = $row['username'];
            header('Location: dashboard.php');
            exit();
        }
        else{
            echo "Error" . mysqli_error($conn);
            header('Location: index.php');
        }
    }
    else{
        echo "Error" . mysqli_error($conn);
        header('Location: index.php');
    }
}
else{
    echo "Error" . mysqli_error($conn);
}
?>