<?php include '../../globalvar/globalvariable.php'; ?>
<?php include  $connToPan . 'config.php'; ?>
<?php include  $mphpToInc . 'header.php'; ?>
<?php include  $mphpToInc . 'sidebar.php';?>
<?php include  $funToPan . 'function.php'; ?>
<?php include  $mphpToInc . 'navbar.php'; ?>

<div class="container">
	<div class="page-inner">
		<div class="page-header">
			<h3 class="fw-bold mb-3">Avatars</h3>
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
					<a href="#">Avatars</a>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Sizing</h4>

					</div>
					<div class="card-body">
						<p class="demo">
						<div class="avatar avatar-xxl">
							<img src="../assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
						</div>

						<div class="avatar avatar-xl">
							<img src="../assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
						</div>

						<div class="avatar avatar-lg">
							<img src="../assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
						</div>

						<div class="avatar">
							<img src="../assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
						</div>

						<div class="avatar avatar-sm">
							<img src="../assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
						</div>

						<div class="avatar avatar-xs">
							<img src="../assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Status Indicator</h4>

					</div>
					<div class="card-body">
						<p class="demo">
						<div class="avatar avatar-online">
							<img src="../assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
						</div>

						<div class="avatar avatar-offline">
							<img src="../assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
						</div>

						<div class="avatar avatar-away">
							<img src="../assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Shape</h4>

					</div>
					<div class="card-body">
						<p class="demo">
						<div class="avatar">
							<img src="../assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded">
						</div>

						<div class="avatar">
							<img src="../assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Group</h4>

					</div>
					<div class="card-body">
						<p class="demo">
						<div class="avatar-group">
							<div class="avatar">
								<img src="../assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle border border-white">
							</div>
							<div class="avatar">
								<img src="../assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle border border-white">
							</div>
							<div class="avatar">
								<img src="../assets/img/mlane.jpg" alt="..." class="avatar-img rounded-circle border border-white">
							</div>
							<div class="avatar">
								<span class="avatar-title rounded-circle border border-white">CF</span>
							</div>
						</div>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include  $mphpToInc . 'footer.php';?>
<?php include  $mphpToInc . 'endlinks.php';?>