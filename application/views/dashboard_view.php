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
									Dashboard
								</li>
							</ol>
							<div class="page-header">
								<h1>Dashboard <small>overview &amp; stats </small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->
					<div class="row">
						<?php if ($admin==1) : ?>
						<div class="col-sm-4">
							<div class="core-box">
								<div class="heading">
									<i class="clip-user-4 circle-icon circle-green"></i>
									<h2>Gestisci Utenti</h2>
								</div>
								<div class="content">
									Funzionalità riservata agli amministratori.
								</div>
								<a class="view-more" href="#">
									VAI <i class="clip-arrow-right-2"></i>
								</a>
							</div>
						</div>
						<?php endif; ?>
						<div class="col-sm-4">
							<div class="core-box">
								<div class="heading">
									<i class="clip-clip circle-icon circle-teal"></i>
									<h2>Inserisci Nuovo Progetto</h2>
								</div>
								<div class="content">
									
								</div>
								<a class="view-more" href="<?php echo base_url(); ?>index.php/progetti/aggiungi">
									VAI <i class="clip-arrow-right-2"></i>
								</a>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="core-box">
								<div class="heading">
									<i class="clip-database circle-icon circle-bricky"></i>
									<h2>Gestione Progetti Inseriti</h2>
								</div>
								<div class="content">
									
								</div>
								<a class="view-more" href="<?php echo base_url(); ?>index.php/progetti">
									VAI <i class="clip-arrow-right-2"></i>
								</a>
							</div>
						</div>
					</div>
					<!-- end: PAGE CONTENT-->
				</div>
			</div>
			<!-- end: PAGE -->



<?php include 'footer.php'; ?>