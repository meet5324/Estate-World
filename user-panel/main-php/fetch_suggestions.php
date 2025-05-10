<?php
include '../../globalvar/globalvariable.php';
include $connToPan . 'config.php';

if (isset($_POST['city'])) {
    $search = "%" . $_POST['city'] . "%"; // Wildcard for SQL LIKE search
    $query = "SELECT DISTINCT address FROM tbl_property_listing WHERE address LIKE ? ORDER BY address LIMIT 5";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $search);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<a href="#" class="list-group-item list-group-item-action suggestion-item">' . htmlspecialchars($row['address']) . '</a>';
        }
    } else {
        echo '<p class="list-group-item text-muted">No results found</p>';
    }
}
?>