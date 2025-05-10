<?php include '../../globalvar/globalvariable.php'; ?>
<?php include $connToPan . 'config.php'; ?>
<?php include $mphpToInc . 'header.php'; ?>
<?php include $funToPan . 'function.php'; ?>
<?php include $mphpToInc . 'navbar.php'; ?>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

<div class="section" id="list">
    <div class="container">
        <?php
        $data = fetchData($conn, 'tbl_property_listing', '*');

        if (count($data) > 0) {
            ?>
        <div class="row mb-5 align-items-center">
            <div class="col-lg-6 text-center mx-auto">
                <h2 class="font-weight-bold text-primary heading">All Properties</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form id="compareForm">
                    <div class="table-responsive">
                        <table id="propertyTable" class="table table-bordered table-striped display responsive nowrap">
                            <thead class="table-dark">
                                <tr>
                                    <th>Property ID</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Address</th>
                                    <th>Property Type</th>
                                    <th>Status</th>
                                    <th>Bedrooms</th>
                                    <th>Bathrooms</th>
                                    <th>Compare</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($data as $row) {
                                        $p_id = $row['p_id'];

                                        $where2 = 'property_id = ?';
                                        $values2 = [$p_id];
                                        $data2 = fetchData($conn, 'tbl_property_images', '*', $where2, $values2);
                                        $propertyImage = "";
                                        foreach ($data2 as $row2) {
                                            $propertyImage = $propImagesToUpan . $row2['image_name'];
                                            break;
                                        }
                                        ?>
                                <tr>
                                    <td><?php echo $p_id; ?></td>
                                    <td>
                                        <img src="<?php echo $propertyImage; ?>" alt="Property Image" width="80"
                                            class="img-fluid">
                                    </td>
                                    <td><i class="fa-solid fa-indian-rupee-sign"></i> <?php echo $row['price']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['propertyType']; ?></td>
                                    <td><?php echo $row['req_status']; ?></td>
                                    <td><?php echo $row['bedrooms']; ?></td>
                                    <td><?php echo $row['bathrooms']; ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" class="compare-checkbox" value="<?php echo $p_id; ?>"
                                            onclick="limitSelection()">
                                    </td>
                                </tr>
                                <?php
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-3">
                        <button type="button" id="compareBtn" class="btn btn-primary" disabled>Compare Selected
                            Properties</button>
                    </div>
                </form>
            </div>
        </div>
        <?php } else { ?>
        <div class="row my-5 align-items-center">
            <div class="col-lg-6 text-center mx-auto">
                <h2 class="font-weight-bold text-primary heading">No Properties Found.</h2>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<script>
$(document).ready(function() {
    $('#propertyTable').DataTable({
        "ordering": true,
        "paging": true,
        "searching": true,
        responsive: true
    });
});

function limitSelection() {
    let checkboxes = document.querySelectorAll('.compare-checkbox:checked');
    let compareBtn = document.getElementById('compareBtn');

    if (checkboxes.length > 2) {
        showWarningAlert("You can only compare up to 2 properties.");
        event.target.checked = false;
    }

    compareBtn.disabled = checkboxes.length !== 2;
}

document.getElementById('compareBtn').addEventListener('click', function() {
    let selectedCheckboxes = document.querySelectorAll('.compare-checkbox:checked');

    if (selectedCheckboxes.length === 2) {
        let ids = Array.from(selectedCheckboxes).map(checkbox => checkbox.value);
        window.location.href = `compare-property.php?p_id1=${ids[0]}&p_id2=${ids[1]}`;
    }
});
</script>

<style>
@media (max-width: 767px) {
    .compare-checkbox {
        width: 20px;
        height: 20px;
    }

    #compareBtn {
        width: 100%;
        margin-top: 15px;
    }

    .img-fluid {
        max-width: 100%;
        height: auto;
    }

    td img {
        display: block;
        margin: auto;
    }
}
</style>

<?php include $mphpToInc . 'footer.php'; ?>
<?php include $mphpToInc . 'loader.php'; ?>
<?php include $mphpToInc . 'endlinks.php'; ?>