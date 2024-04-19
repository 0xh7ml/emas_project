<?php include('header.php');?>


<div class="container">
        <div class="row">
            <div class="d-flex flex-row justify-content-between mt-2 mb-2">

                <h3>Attendance report</h3>

                <form class="d-flex" role="search" method="POST">
                <input class="form-control me-2" type="search" placeholder="Search by name" aria-label="Search" name="search">
                <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

            </div>
            <table class="table table-bordered table-hover table-light">
                <thead>
                    <tr>
                        <th>Record ID</th>
                        <th>Emp. ID</th>
                        <th>Name</th>
                        <th>In Time</th>
                        <th>Out Time</th>
                        <th>Total Hours</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 

                    if(isset($_POST["search"]) && !empty($_POST["search"])){
                        $keyword = $_POST["search"];
                        $sql = "SELECT * from tb_attendance where employee_id LIKE '%$keyword%'";
                    }
                    else{
                        $sql = "SELECT * FROM tb_attendance as attendance left join tb_employee as emp on attendance.employee_id = emp.emp_id";
                    }

                    $res = mysqli_query(
                        $conn, $sql
                    );
                    mysqli_close($conn);
    
                    while($rows=$res->fetch_assoc())
                    {
                ?>
                    <tr>
                        <td><?php echo $rows["record_id"]; ?></td>
                        <td><?php echo $rows["employee_id"]; ?></td>
                        <td><?php echo $rows["emp_name"]; ?></td>
                        <td><?php echo $rows["in_time"]; ?></td>
                        <td><?php echo $rows["out_time"]; ?></td>
                        <td><?php echo $rows["total_hours"]; ?></td>
                        <td><?php echo $rows["status"]; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $rows['emp_id'];?>"><i class="bi bi-pencil-square text-primary"></i></a>
                            <a href="delete.php?id=<?php echo $rows['emp_id'];?>"><i class="bi bi-trash3 text-danger "></i></a>
                        </td>
                    </tr>
                <?php } ; ?>
                </tbody>
            </table>
        </div>
    </div>


<?php include('footer.php');?>