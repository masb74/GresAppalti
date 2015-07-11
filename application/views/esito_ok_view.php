<?php include 'head.php'; ?>

<!-- start: PAGE -->
<div class="main-content">

<div class="container">

					<!-- start: PAGE HEADER -->
					<div class="row">
						<div class="col-sm-12">

							<!-- start: PAGE TITLE & BREADCRUMB -->
							<ol class="breadcrumb">
								<li>
									<i class="clip-home-3"></i>
									<a href="#">
										Home
									</a>
								</li>
								<li class="active">
									Notifica
								</li>
							</ol>
							<div class="page-header">
								<h1>Notifica <small> </small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
					<!-- end: PAGE HEADER -->
					
<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading">
			<i class="fa fa-bell"></i>
			Notifica
			<div class="panel-tools">
				<a href="#" class="btn btn-xs btn-link panel-collapse collapses">
				</a>
				<a data-toggle="modal" href="#panel-config" class="btn btn-xs btn-link panel-config">
					<i class="fa fa-wrench"></i>
				</a>
				<a href="#" class="btn btn-xs btn-link panel-refresh">
					<i class="fa fa-refresh"></i>
				</a>
				<a href="#" class="btn btn-xs btn-link panel-expand">
					<i class="fa fa-resize-full"></i>
				</a>
				<a href="#" class="btn btn-xs btn-link panel-close">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
		<div class="panel-body">
			<div class="alert alert-block alert-success fade in">
				<button type="button" class="close" data-dismiss="alert">
					×
				</button>
				<h4 class="alert-heading"><i class="fa fa-check-circle"></i> Successo!</h4>
				<p><?php echo $messaggio; ?></p>
			</div>
		</div>
	</div>
</div>

</div>
</div>

<?php include 'footer.php'; ?>