<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?= $title ?></title>

	<!-- Bootstrap core CSS -->
	<link href="<?= base_url('assets') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link href="<?= base_url('assets') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

	<!-- Custom styles for this template -->
	<link href="<?= base_url('assets') ?>/css/clean-blog.min.css" rel="stylesheet">

</head>
<body>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand" href="<?= base_url('home') ?>"><?= $title ?></a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				Menu
				<i class="fas fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('home') ?>">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('home/about') ?>">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('home/contact') ?>">Contact</a>
					</li>
					<?php if($this->session->userdata('id') != NULL){?>
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline small"><?= $this->session->userdata('username') ?></span>
								<!-- <img class="img-profile rounded-circle" src="<?= base_url('assets/') ?>img/undraw_profile.svg"> -->
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="<?= base_url('dashboard') ?>">
									<i class="fas fa-fw fa-tachometer-alt"></i>
									Dashboard
								</a>
								<a class="dropdown-item" href="<?= base_url('dashboard/profile') ?>">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									Profile
								</a>
								<a class="dropdown-item" href="<?= base_url('dashboard/logout') ?>">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>
					<?php } else { ?>
						<li class="nav-item">
							<a class="nav-link btn btn-outline-warning rounded" href="<?= base_url('auth') ?>">Login</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</nav>
