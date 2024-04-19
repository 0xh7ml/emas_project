<?php include('header.php');?> 


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add Employee</h5>
                    </div>
                    <div class="card-body">
                        <form id="addEmployeeForm" method="POST" action="/class_project/insert_emp.php">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Phone</label>
                                <input type="text" class="form-control" id="name" name="phn" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Salary</label>
                                <input type="text" class="form-control" id="name" name="salary" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('footer.php');?>