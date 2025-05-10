<!-- Include at third -->

<?php
error_reporting(E_ALL); // Report all PHP errors
ini_set('display_errors', 1); // Display errors in the browser
ini_set('display_startup_errors', 1); // Display errors that occur during PHP's startup sequence

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="author" content="Untree.co" />
  <link rel="shortcut icon" href="../images/E2.png" />

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap5" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="../fonts/icomoon/style.css" />
  <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css" />

  <link rel="stylesheet" href="../css/tiny-slider.css" />
  <link rel="stylesheet" href="../css/aos.css" />
  <link rel="stylesheet" href="../css/style.css" />

  <!-- global CSS file  -->
  <link rel="stylesheet" href="<?php echo $commonToPan; ?>style.css">

  <!-- my font awesome kit link  -->
  <!-- <script src="https://kit.fontawesome.com/ed83cd24d3.js" crossorigin="anonymous"></script> -->
  <script src="../js/fontawesome.js"></script>

  <!-- my local css file  -->
  <link rel="stylesheet" href="../css/myCss.css">

  <!-- Include jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


  <!-- SweetAlert CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

  <!-- SweetAlert JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="../../sweet_alert/sweet_alert.js"></script>

  <style>
    /* Prevent modal close button functionality */
    .modal.prevent-close .btn-close,
    .modal.prevent-close .close {
      pointer-events: none;
      /* Disable clicks */
      opacity: 0.5;
      /* Dim close button */
    }
  </style>

  <title>
    Estate World | Property Masters
  </title>
</head>

<body>