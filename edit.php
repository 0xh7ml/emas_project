<?php
include('db_connection.php');
include('header.php');
?>
<div class="container mt-5">
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Edit Employee</h5>
            </div>
            <div class="card-body">
                <form action="update.php" method="POST">
                <?php
                if(isset($_GET['id']) && !empty($_GET['id'])){
                    $id = $_GET['id'];
                    $query = "SELECT * FROM `tb_employee` WHERE emp_id =" . $id ;
                    $res = mysqli_query($conn, $query);
                    while($rows=$res->fetch_assoc())
                    {
                ?>
                    <input type="hidden" class="form-control" name="id" value="<?php echo $rows['emp_id']; ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $rows['emp_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Phone</label>
                        <input type="text" class="form-control" id="name" name="phn" value="<?php echo $rows['emp_phone']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Salary</label>
                        <input type="text" class="form-control" id="name" name="salary" value="<?php echo $rows['emp_salary']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $rows['emp_address']; ?>">
                    </div>
                    <div class="form-group mb-2">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender">
                        <?php if($rows['emp_gender'] === "male"){ ?>
                            <option value="male" selected>Male</option>
                            <option value="female">Female</option>
                        <?php
                        }
                        else{
                        ?>
                            <option value="male">Male</option>
                            <option value="female" selected>Female</option>
                        <?php
                        }
                        ?>
                        </select>
                    </div>
                <?php
                    }
                };
                ?>
                    <button type="submit" class="btn btn-primary" value=""><i class="bi bi-floppy"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<?php
include('footer.php');
?>