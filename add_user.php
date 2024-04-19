<?php include('header.php');

if(isset($_POST['emp_id']) && isset($_POST['username']) && isset($_POST['password'])){
    $query = "INSERT INTO `tb_users` (`emp_id`,`username`, `password`) VALUES ('$_POST[emp_id]',' $_POST[username]', '$_POST[password]')";

    $res = mysqli_query($conn, $query);
    if(!mysqli_error($conn)){
        header("Location: users.php");
    }
    else{
        echo "Error happend" . mysqli_error($conn);
    }
}
?> 
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add User</h5>
                    </div>
                    <div class="card-body">
                        <form id="addUser" method="POST" action="/class_project/add_user.php">
                            <div class="form-group mb-2">
                                <label for="gender">Employee</label>
                                <select class="form-control" name="emp_id" required>
                                    <option value="">Select Employee</option>
                                    <?php
                                        $query = "select * from tb_employee";

                                        $res = mysqli_query($conn, $query);


                                        while($row=$res->fetch_assoc()){
                                    ?>
                                        <option value="<?php echo $row['emp_id'];?>"><?php echo $row['emp_name'];?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="address">Username</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="address">Password</label>
                                <input type="text" class="form-control" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('footer.php');?>