<?php include '../includes/header.php';?>

<?php include '../includes/sidebar.php';?>

<?php include '../includes/navbar.php';?>

        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Grid System</h3>
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
                  <a href="#">Grid System</a>
                </li>
              </ul>
            </div>
            <div class="card">
              <div class="card-body">
                <h4 class="card-title mt-3">XL Grid</h4>
                <div class="row row-demo-grid">
                  <div class="col-xl-4">
                    <div class="card">
                      <div class="card-body"><code>.col-xl-4</code></div>
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="card">
                      <div class="card-body"><code>.col-xl-4</code></div>
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="card">
                      <div class="card-body"><code>.col-xl-4</code></div>
                    </div>
                  </div>
                </div>

                <h4 class="card-title">LG Grid (Collapsed at 992px)</h4>
                <div class="row row-demo-grid">
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-body"><code>.col-lg-4</code></div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-body"><code>.col-lg-4</code></div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-body"><code>.col-lg-4</code></div>
                    </div>
                  </div>
                </div>

                <h4 class="card-title">MD Grid (Collapsed at 768px)</h4>
                <div class="row row-demo-grid">
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body"><code>.col-md-4</code></div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body"><code>.col-md-4</code></div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body"><code>.col-md-4</code></div>
                    </div>
                  </div>
                </div>

                <h4 class="card-title">SM Grid (Collapsed at 576px)</h4>
                <div class="row row-demo-grid">
                  <div class="col-sm-4">
                    <div class="card">
                      <div class="card-body"><code>.col-sm-4</code></div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="card">
                      <div class="card-body"><code>.col-sm-4</code></div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="card">
                      <div class="card-body"><code>.col-sm-4</code></div>
                    </div>
                  </div>
                </div>

                <h4 class="card-title">XS Grid</h4>
                <div class="row row-demo-grid">
                  <div class="col-4">
                    <div class="card">
                      <div class="card-body"><code>.col-4</code></div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="card">
                      <div class="card-body"><code>.col-4</code></div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="card">
                      <div class="card-body"><code>.col-4</code></div>
                    </div>
                  </div>
                </div>

                <h4 class="card-title">Equality Width</h4>
                <div class="row row-demo-grid">
                  <div class="col">
                    <div class="card">
                      <div class="card-body"><code>col</code></div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card">
                      <div class="card-body"><code>col</code></div>
                    </div>
                  </div>
                </div>
                <div class="row row-demo-grid">
                  <div class="col">
                    <div class="card">
                      <div class="card-body"><code>col</code></div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card">
                      <div class="card-body"><code>col</code></div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card">
                      <div class="card-body"><code>col</code></div>
                    </div>
                  </div>
                </div>

                <h4 class="card-title">Setting one column width</h4>
                <div class="row row-demo-grid">
                  <div class="col">
                    <div class="card">
                      <div class="card-body"><code>col</code></div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="card">
                      <div class="card-body"><code>col-6</code></div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card">
                      <div class="card-body"><code>col</code></div>
                    </div>
                  </div>
                </div>

                <h4 class="card-title">
                  Mix and Match (Showing different sizes on different screens)
                </h4>
                <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                <div class="row row-demo-grid">
                  <div class="col-12 col-md-8">
                    <div class="card">
                      <div class="card-body"><code>col-12 col-md-8</code></div>
                    </div>
                  </div>
                  <div class="col-6 col-md-4">
                    <div class="card">
                      <div class="card-body"><code>col-6 col-md-6</code></div>
                    </div>
                  </div>
                </div>

                <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                <div class="row row-demo-grid">
                  <div class="col-sm-6 col-md-3">
                    <div class="card">
                      <div class="card-body">
                        <code>col-sm-6 col-md-3</code>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                    <div class="card">
                      <div class="card-body">
                        <code>col-sm-6 col-md-3</code>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                    <div class="card">
                      <div class="card-body">
                        <code>col-sm-6 col-md-3</code>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                    <div class="card">
                      <div class="card-body">
                        <code>col-sm-6 col-md-3</code>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Columns are always 50% wide, on mobile and desktop -->
                <div class="row row-demo-grid">
                  <div class="col-6">
                    <div class="card">
                      <div class="card-body"><code>col-6</code></div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="card">
                      <div class="card-body"><code>col-6</code></div>
                    </div>
                  </div>
                </div>

                <h4 class="card-title">
                  Offset Grid (Adding some space when needed)
                </h4>
                <div class="row row-demo-grid">
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body text-center">
                        <code>col-md-4</code>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 ms-auto">
                    <div class="card">
                      <div class="card-body text-center">
                        <code>col-md-4 ms-auto</code>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row row-demo-grid">
                  <div class="col-md-4 ms-auto me-auto">
                    <div class="card">
                      <div class="card-body text-center">
                        <code>col-md-4 ms-auto me-auto</code>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 ms-auto me-auto">
                    <div class="card">
                      <div class="card-body text-center">
                        <code>col-md-4 ms-auto me-auto</code>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row row-demo-grid">
                  <div class="col-md-6 ms-auto me-auto">
                    <div class="card">
                      <div class="card-body text-center">
                        <code>col-md-6 ms-auto me-auto</code>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php include '../includes/footer.php'; ?>

<?php include '../includes/endlinks.php'; ?>