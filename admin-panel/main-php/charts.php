<?php include '../../globalvar/globalvariable.php'; ?>
<?php include  $connToPan . 'config.php'; ?>
<?php include  $mphpToInc . 'header.php'; ?>
<?php include  $mphpToInc . 'sidebar.php'; ?>
<?php include  $funToPan . 'function.php'; ?>
<?php include  $mphpToInc . 'navbar.php'; ?>


<div class="container">
  <div class="page-inner">
    <h3 class="fw-bold mb-3">Chart.js</h3>
    <div class="page-category">
      Simple yet flexible JavaScript charting for designers &
      developers. Please checkout their
      <a href="http://www.chartjs.org/" target="_blank">full documentation</a>.
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Line Chart</div>
          </div>
          <div class="card-body">
            <div class="chart-container">
              <canvas id="lineChart"></canvas>
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
            <div class="chart-container">
              <canvas id="barChart"></canvas>
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
            <div class="chart-container">
              <canvas id="pieChart" style="width: 50%; height: 50%"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Doughnut Chart</div>
          </div>
          <div class="card-body">
            <div class="chart-container">
              <canvas id="doughnutChart" style="width: 50%; height: 50%"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Radar Chart</div>
          </div>
          <div class="card-body">
            <div class="chart-container">
              <canvas id="radarChart"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Bubble Chart</div>
          </div>
          <div class="card-body">
            <div class="chart-container">
              <canvas id="bubbleChart"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Multiple Line Chart</div>
          </div>
          <div class="card-body">
            <div class="chart-container">
              <canvas id="multipleLineChart"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Multiple Bar Chart</div>
          </div>
          <div class="card-body">
            <div class="chart-container">
              <canvas id="multipleBarChart"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Chart with HTML Legends</div>
          </div>
          <div class="card-body">
            <div class="card-sub">
              Sometimes you need a very complex legend. In these cases,
              it makes sense to generate an HTML legend. Charts provide
              a generateLegend() method on their prototype that returns
              an HTML string for the legend.
            </div>
            <div class="chart-container">
              <canvas id="htmlLegendsChart"></canvas>
            </div>
            <div id="myChartLegend"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include  $mphpToInc . 'footer.php'; ?>
<?php include  $mphpToInc . 'endlinks.php'; ?>