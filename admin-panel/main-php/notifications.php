<?php include '../../globalvar/globalvariable.php'; ?>
<?php include  $connToPan . 'config.php'; ?>
<?php include  $mphpToInc . 'header.php'; ?>
<?php include  $mphpToInc . 'sidebar.php'; ?>
<?php include  $funToPan . 'function.php'; ?>
<?php include  $mphpToInc . 'navbar.php'; ?>



<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Notifications</h3>
      <ul class="breadcrumbs mb-3">
        <li class="nav-home">
          <a href="#">
            <i class="icon-home"></i>
          </a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="#">Base</a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="#">Notifications</a>
        </li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Bootstrap Notify</div>
            <div class="card-category">
              Turn standard bootstrap alerts into "growl" like
              notifications from
              <a class="link" href="http://bootstrap-notify.remabledesigns.com/">Bootstrap Notify</a>
            </div>
          </div>
          <div class="card-body">
            <div class="form">
              <div class="form-group form-show-notify row">
                <div class="col-lg-3 col-md-3 col-sm-4 text-end">
                  <label>Placement :</label>
                </div>
                <div class="col-lg-4 col-md-9 col-sm-8">
                  <select class="form-select input-fixed" id="notify_placement_from">
                    <option value="top">Top</option>
                    <option value="bottom">Bottom</option>
                  </select>
                  <select class="form-select input-fixed" id="notify_placement_align">
                    <option value="left">Left</option>
                    <option value="right" selected="">Right</option>
                    <option value="center">Center</option>
                  </select>
                </div>
              </div>
              <div class="form-group form-show-notify row">
                <div class="col-lg-3 col-md-3 col-sm-4 text-end">
                  <label>State :</label>
                </div>
                <div class="col-lg-4 col-md-9 col-sm-8">
                  <select class="form-select input-fixed" id="notify_state">
                    <option value="default">Default</option>
                    <option value="primary">Primary</option>
                    <option value="secondary">Secondary</option>
                    <option value="info">Info</option>
                    <option value="success">Success</option>
                    <option value="warning">Warning</option>
                    <option value="danger">Danger</option>
                  </select>
                </div>
              </div>
              <div class="form-group form-show-notify row">
                <div class="col-lg-3 col-md-3 col-sm-4 text-end">
                  <label>Style :</label>
                </div>
                <div class="col-lg-4 col-md-9 col-sm-8">
                  <select class="form-select input-fixed" id="notify_style">
                    <option value="plain">Plain</option>
                    <option value="withicon">With Icon</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="form">
              <div class="form-group from-show-notify row">
                <div class="col-lg-3 col-md-3 col-sm-12"></div>
                <div class="col-lg-4 col-md-9 col-sm-12">
                  <button id="displayNotif" class="btn btn-success">
                    Display
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include  $mphpToInc . 'footer.php'; ?>
<?php include  $mphpToInc . 'endlinks.php'; ?>