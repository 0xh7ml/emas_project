<?php include('header.php'); ?>
    <div class="container">
        <div class="row">
            <div class="d-flex flex-row justify-content-between mt-2 mb-2">

                <h3>View Users</h3>

                <form class="d-flex" role="search" method="POST">
                <input class="form-control me-2" type="search" placeholder="Search by name" aria-label="Search" name="search">
                <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

            </div>
            <table class="table table-bordered table-hover table-light">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Emp. ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                <?php 
                    if(isset($_POST["search"]) && !empty($_POST["search"])){
                        $keyword = $_POST["search"];
                        $sql = "SELECT * from tb_users where username LIKE '%$keyword%'";
                    }
                    else{
                        $sql = "SELECT * FROM tb_users";
                    }

                    $res = mysqli_query(
                        $conn, $sql
                    );
                    mysqli_close($conn);
    
                    while($rows=$res->fetch_assoc())
                    {
                ?>
                    <tr>
                        <td><?php echo $rows["id"]; ?></td>
                        <td><?php echo $rows["emp_id"]; ?></td>
                        <td><?php echo $rows["username"]; ?></td>
                        <td><?php echo $rows["password"]; ?></td>
                        <!-- <td>
                            <a href="edit.php?id=<?php echo $rows['emp_id'];?>"><i class="bi bi-pencil-square text-primary"></i></a>
                            <a href="delete.php?id=<?php echo $rows['emp_id'];?>"><i class="bi bi-trash3 text-danger "></i></a>
                        </td> -->
                    </tr>
                <?php } ; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php include('footer.php');?>