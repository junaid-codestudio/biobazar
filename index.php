<?php

if( !isset($_SESSION)) {
	session_start();
}
// echo json_encode($_SESSION); exit;
if( !isset($_GET['lang'])) {
	$_GET['lang'] = 'en';
}
$page_lang = $_GET['lang'];

require_once 'lang/de.php';
require_once 'lang/en.php';
require_once 'lang/fr.php';
require_once 'lang/pt.php';
require_once 'includes/functions.php';

// echo json_encode($en); exit;
// echo $en['page_title']; exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php __('page_title'); ?></title>

	<link rel="shortcut icon" href="assets/images/FB_profileImage.jpg" type="image/x-icon">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
	crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.css"
	integrity="sha512-f73UKwzP1Oia45eqHpHwzJtFLpvULbhVpEJfaWczo/ZCV5NWSnK4vLDnjTaMps28ocZ05RbI83k2RlQH92zy7A==" crossorigin="anonymous"/>
	<link rel="stylesheet" href="assets/css/styles.css">

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
	crossorigin="anonymous"></script>

</head>
<body>

	<div class="nav-green text-dark text-center p-2 h6">
		<?php __('top_nav_text') ?>
	</div>
	<div class="bg-gray pt-4 pb-5">
		<div class="container">
			<div class="offset-xl-3 offset-lg-3 offset-md-2 offset-sm-2 col-xl-6 col-lg-6 col-md-8 col-sm-8 col-xs-8 pb-5 mb-5">
				<div class="col-12 pt-2 pb-5 mb-5">
					<img src="assets/images/logo.png" class="img-fluid" alt="<?php __('page_title') ?>">
				</div>
			</div>
		</div>
		<div class="container-fluid offset-xl-2 offset-lg-1 offset-md-1 col-xl-8 col-lg-11 col-md-10">
			<div class="pt-4">
				<div class="display-4 pt-5 text-bold main-title">
					<?php __('organic_products_from_portugal') ?>
				</div>
			</div>
			<br>
			<div class="text-normal noto-sans col-11 h4">
				<?php __('top_nav_text') ?>
			</div>
		</div>
	</div>

	<div class="bg-white pt-3 pb-3">
		<div class="offset-xl-2 offset-lg-1 offset-md-1 col-8 pt-4 pb-4 ">
			<?php
			// $_SESSION['mail_sent_success'] = true;
			if(isset($_SESSION['mail_sent_success']) && $_SESSION['mail_sent_success']) {
				unset($_SESSION['mail_sent_success']);
				?>
				<div class="h4 noto-sans text-center row col-11 text-dark">
					<?php 
					__('thanks_for_registering');
					?>
				</div>
				<?php 
			}
			else {
				?>
				<form class="row" action="includes/save_send_emails.php?lang=<?php echo $page_lang; ?>" method="POST">
					<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-xs-12 text-center">
						<label class="h4 noto-sans pt-3" for="inlineFormInputName2"><?php __('register_your_email') ?></label>&nbsp;
					</div>
					<div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12 text-center">
						<input type="email" class="form-control email pt-5 pb-3 mt-n1" id="inlineFormInputName2" placeholder="" name="email" required>
						<span class="floating-label h4">Email</span>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 text-center">
						<button type="submit" class="btn btn-outline-dark pl-5 pr-5 btn-lg rounded-1 h3">Submit</button>
					</div>
				</form>
				<?php
			}
			?>
		</div>
	</div>

	<div class="nav-green p-5">
		<footer class="container-fluid p-5 footer">
			<div class="row text-normal">
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 text-left text-md-center text-sm-center mb-md-4 mb-sm-4 h6">
					Copyright &copy; 2020 Biobazar - All Rights Reserved.
				</div>
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 text-center text-md-center text-sm-center mb-md-4 mb-sm-4 h6">
					<a href="https://www.facebook.com/biobazar.ch" title="Facebook" class="bg-transparent text-dark">
						<span class="fab fa-facebook fa-2x"></span>
					</a>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 text-right text-md-center text-sm-center mb-md-4 mb-sm-4 h6">
					Engimattstrasse 36, 8002 Zurich
				</div>
			</div>
			<div class="container col-xl-6 col-lg-8 col-md-8 col-sm-12 offset-xl-3 offset-lg-2 offset-md-2 offset-sm-2">
				<div class="row text-normal mt-5">
					<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 text-center mb-md-4 mb-sm-4">
						<a class="text-dark h6" href="index.php?lang=en" title="English">English</a>
					</div>
					<div class="col-xl-1 col-lg-1 d-none d-xl-inline-block d-lg-inline-block col-sm-0 text-center">
						|
					</div>
					<div class=" col-xl-2 col-lg-2 col-md-12 col-sm-12 text-center mb-md-4 mb-sm-4">
						<a class="text-dark h6" href="index.php?lang=de" title="English">German</a>
					</div>
					<div class="col-xl-1 col-lg-1 d-none d-xl-inline-block d-lg-inline-block col-sm-0 text-center">
						|
					</div>
					<div class=" col-xl-2 col-lg-2 col-md-12 col-sm-12 text-center mb-md-4 mb-sm-4">
						<a class="text-dark h6" href="index.php?lang=fr" title="English">French</a>
					</div>
					<div class="col-xl-1 col-lg-1 d-none d-xl-inline-block d-lg-inline-block col-sm-0 text-center">
						|
					</div>
					<div class=" col-xl-2 col-lg-2 col-md-12 col-sm-12 text-center mb-md-4 mb-sm-4">
						<a class="text-dark h6" href="index.php?lang=pt" title="English">Portuguese</a>
					</div>
				</div>
			</div>
		</footer>
	</div>

</body>
</html>