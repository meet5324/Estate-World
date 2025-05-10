<?php include '../../globalvar/globalvariable.php'; ?>
<?php include  $connToPan . 'config.php'; ?>
<?php include  $mphpToInc . 'header.php'; ?>
<?php include  $mphpToInc . 'sidebar.php'; ?>
<?php include  $funToPan . 'function.php'; ?>
<?php include  $mphpToInc . 'navbar.php'; ?>



<div class="container">
  <div class="page-inner">
    <h3 class="fw-bold mb-3">jQuery Sparkline</h3>
    <div class="page-category pe-md-5">
      This jQuery plugin generates sparklines (small inline charts)
      directly in the browser using data supplied either inline in the
      HTML, or via javascript. Please checkout their
      <a href="https://omnipotent.net/jquery.sparkline/#s-docs" target="_blank">full documentation</a>.
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Line Chart</div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-center p-3">
              <div id="lineChart"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Bar Chart</div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-center p-3">
              <div id="barChart"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Tristate Chart</div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-center p-3">
              <div id="sparktristateChart"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Discrete Chart</div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-center p-3">
              <div id="discreteChart"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Pie Chart</div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-center p-3">
              <div id="pieChart"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include  $mphpToInc . 'footer.php'; ?>
<?php include  $mphpToInc . 'endlinks.php'; ?>