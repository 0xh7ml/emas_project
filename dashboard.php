<?php
include('header.php');
?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5 p-5 bg-light">
                <h2>Employee Attendance Management System</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, provident quod. Adipisci quis velit
                    error officia quasi, debitis perspiciatis quos itaque aut libero harum suscipit eveniet animi
                    consectetur soluta incidunt?
                </p>
            </div>
            <div class="col-md-6 mt-5 p-5 bg-light">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-center mb-4">Today's Attendance</h5>
                <div class="d-flex flex-row justify-content-around mb-2">
                    <div class="in-report text-center">
                    <form action="checkin.php" method="post">
                        <input type="hidden" name="emp_id" value="<?php echo $_SESSION['emp_id'];?>">
                        <div class="label d-flex flex-column">
                            <label for="in">In</label>
                            <?php
                                $current_date = date('Y-m-d');
                                $emp_id = $_SESSION['emp_id'];  

                                $query = "SELECT * from `tb_attendance` where employee_id = $emp_id AND date = '$current_date'";

                                $res=mysqli_query($conn, $query);

                                $rows = $res->fetch_assoc();
                                
                                $record = $rows["in_time"];

                                if($record != NULL){
                            ?>
                            <span><?php echo $rows['in_time']; ?></span>
                            </div>
                            <button type="submit" class="btn btn-outline-success" disabled> <i class="bi bi-box-arrow-down"></i> Present</button>
                            <?php } else{?>
                            <span>--:--</span>
                        </div>
                        <button type="submit" class="btn btn-outline-success"> <i class="bi bi-box-arrow-down"></i> Present</button>
                    <?php }?>
                    </form>
                    </div>
                    <div class="out-report text-center">
                    <form action="checkout.php" method="post">
                        <div class="label d-flex flex-column justify-content-center">
                            <input type="hidden" name="emp_id" value="<?php echo $_SESSION['emp_id'];?>">
                            <label for="out">Out</label>
                            <?php
                                $current_date = date('Y-m-d');
                                $emp_id = $_SESSION['emp_id'];  

                                $query = "SELECT * from `tb_attendance` where employee_id = $emp_id AND date = '$current_date'";

                                $res=mysqli_query($conn, $query);

                                $rows = $res->fetch_assoc();
                                
                                $out_record = $rows["out_time"];

                                if($out_record != NULL){
                            ?>
                            <span><?php echo $rows['out_time']; ?></span>
                            </div>
                            <button type="submit" class="btn btn-outline-danger" disabled> <i class="bi bi-box-arrow-in-right"></i> Leave</button>
                            <?php } else{?>
                            <span>--:--</span>
                        </div>
                        <button type="submit" class="btn btn-outline-danger"> <i class="bi bi-box-arrow-in-right"></i> Leave</button>
                    <?php }?>
                    </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    
<?php include('footer.php');?>