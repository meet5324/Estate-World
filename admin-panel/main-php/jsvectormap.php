<?php include '../../globalvar/globalvariable.php'; ?>
<?php include  $connToPan . 'config.php'; ?>
<?php include  $mphpToInc . 'header.php'; ?>
<?php include  $mphpToInc . 'sidebar.php';?>
<?php include  $funToPan . 'function.php'; ?>
<?php include  $mphpToInc . 'navbar.php'; ?>



<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-transparent">
        <div class="card-header">
          <h4 class="card-title text-center">Vector Maps</h4>
          <p class="card-category text-center">
            We use the
            <a href="https://github.com/themustafaomar/jsvectormap" target="_blank">Jsvectormap</a>
            plugin to create vector maps.
          </p>
        </div>
        <div class="card-body">
          <div class="col-md-10 ms-auto me-auto">
            <div class="mapcontainer">
              <div id="world-map" class="w-100" style="height: 450px"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include  $mphpToInc . 'footer.php';?>
<?php include  $mphpToInc . 'endlinks.php';?>