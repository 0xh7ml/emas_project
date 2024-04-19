<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();

}
include('db_connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard | EMS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-sm navbar-light bg-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">EMAS</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <span class="navbar-text text-capitalize"> Welcome, <?php echo $_SESSION['username']; ?></span>
        </div>
    </nav>
</header>
<!-- Nav Menu header end -->


<div class="d-flex flex-column justify-content-between">


<?php include('sidebar.php'); ?>
    <aside class="right-side">
    <section id="main">


    <!-- 
     Body Content Block
     -->
