<?php include '../../globalvar/globalvariable.php'; ?>
<?php include  $connToPan . 'config.php'; ?>
<?php include  $mphpToInc . 'header.php'; ?>
<?php include  $mphpToInc . 'sidebar.php'; ?>
<?php include  $funToPan . 'function.php'; ?>
<?php include  $mphpToInc . 'navbar.php'; ?>



<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Admin's Detail</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Admins</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone No.</th>
                                        <th>Reg. At</th>
                                        <th>Up. At</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="text-center">
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone No.</th>
                                        <th>Reg. At</th>
                                        <th>Up. At</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php
                                    $tableName = 'alogin';
                                    $columns = '*';

                                    $data = fetchData($conn, $tableName);

                                    foreach ($data as $row) {

                                    ?>
                                        <tr class="text-center">
                                            <td><?php echo $row['a_name']; ?></td>
                                            <td><?php echo $row['a_email']; ?></td>
                                            <td><?php echo $row['a_number']; ?></td>
                                            <td><?php echo $row['created_at']; ?></td>
                                            <td><?php echo $row['updated_at']; ?></td>
                                            <td><a href="admin_edit.php?id=<?php echo $row['a_id']; ?>&email=<?php echo $row['a_email']; ?>" class="btn btn-sm btn-outline-info"><i class="fa-regular fa-pen-to-square"></i></a></td>
                                            <td><button class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#deleteAdmin<?php echo $row['a_id']; ?>"><i class="fa-solid fa-trash"></i></button></td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteAdmin<?php echo $row['a_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Delete Admin</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5>Do You Really Want to Delete the Admin ???</h5>
                                                        <h5>Name is <?php echo $row['a_name']; ?> and Email is <?php echo $row['a_email']; ?></h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="<?php $_PHP_SELF ?>" method="POST">
                                                            <input type="text" name="id" value="<?php echo $row['a_id']; ?>" hidden>
                                                            <input type="text" name="email" value="<?php echo $row['a_email']; ?>" hidden>
                                                            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                                        </form>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];

    $conditions = [
        'a_id' => $id,
        'a_email' => $email
    ];

    // Call the function with the connection and conditions
    if (deleteData($conn, 'alogin', $conditions)) {
        $successMessage = "Admin Deleted Successfully !!!";
        echo "<script>showSuccessAlert('$successMessage');</script>";
    } else {
        $errorMessage = "Failed To Delete Admin !!!";
        echo "<script>showErrorAlert('$errorMessage');</script>";
    }

    // Close the database connection
    $conn->close();
}

?>





<?php include  $mphpToInc . 'footer.php'; ?>
<?php include  $mphpToInc . 'endlinks.php'; ?>