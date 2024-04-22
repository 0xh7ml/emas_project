<?php include('header.php');?>
<div class="container">
        <div class="row">
            <div class="d-flex flex-row justify-content-between mt-2 mb-2">

                <h3>Attendance report</h3>
                <button class="btn btn-danger" type="submit" id="download"><i class="bi bi-file-earmark-pdf"></i> PDF report</button>
            </div>
            <table class="table table-bordered table-hover table-light" id="report">
                <thead>
                    <tr>
                        <th>Record ID</th>
                        <th>Emp. ID</th>
                        <th>Name</th>
                        <th>In Time</th>
                        <th>Out Time</th>
                        <th>Total Hours</th>
                        <th>Status</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                <?php 

                    $sql = "SELECT * FROM tb_attendance as attendance left join tb_employee as emp on attendance.employee_id = emp.emp_id";

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
                        <td><?php echo ($rows["out_time"] != NULL) ? $rows["out_time"] : "--:--"; ?></td>
                        <td><?php echo ($rows["total_hours"] != NULL) ? $rows["total_hours"] : "--:--"; ?></td>
                        <td><?php echo $rows["status"]; ?></td>
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
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    const report = document.getElementById('report');
    const downloadBtn = document.getElementById('download');

    downloadBtn.addEventListener('click', (e)=>{
        e.preventDefault();
        var options = {
            filename: 'report.pdf',
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
        };
        html2pdf().from(report).set(options).save();
    })
    </script>

<?php include('footer.php');?>