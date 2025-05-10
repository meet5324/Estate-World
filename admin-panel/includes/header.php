<!-- include at third -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Estate World - Admin Panel</title>
  <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
  <link rel="icon" href="<?php echo $aAssetsImg; ?>E2.png" type="image/x-icon" />

  <!-- global CSS file  -->
  <link rel="stylesheet" href="<?php echo $commonToPan; ?>style.css">

  <!-- my font awesome kit link  -->
  <script src="https://kit.fontawesome.com/ed83cd24d3.js" crossorigin="anonymous"></script>

  <!-- Fonts and icons -->
  <script src="<?php echo $aAssetsJsPluginsWebfont; ?>webfont.min.js"></script>
  <script>
    WebFont.load({
      google: {
        families: ["Public Sans:300,400,500,600,700"]
      },
      custom: {
        families: [
          "Font Awesome 5 Solid",
          "Font Awesome 5 Regular",
          "Font Awesome 5 Brands",
          "simple-line-icons",
        ],
        urls: ["../assets/css/fonts.min.css"],
      },
      active: function () {
        sessionStorage.fonts = true;
      },
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="<?php echo $aAssetsCss; ?>bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo $aAssetsCss; ?>plugins.min.css" />
  <link rel="stylesheet" href="<?php echo $aAssetsCss; ?>kaiadmin.min.css" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="<?php echo $aAssetsCss; ?>demo.css" />

  <!-- SweetAlert CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

  <!-- SweetAlert JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="<?php echo $sweetAlerts; ?>sweet_alert.js"></script>

  <!-- jquery js  -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Bootstrap CSS -->
  <!-- there is no need of the bootstrap css, if apply that the css will overright in the front end  -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
</head>

<body>