<?php

if( !isset($_SESSION)) {
	session_start();
}
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

    <link rel="shortcut icon" href="assets/images/favicon.webp" type="image/x-icon">

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

<div class="nav-green text-dark text-center p-2">
	<?php __('top_nav_text') ?>
</div>
<div class="bg-gray pt-4 pb-5">
    <div class="container">
        <div class="offset-4 col-4 pb-5 mb-5">
            <div class="offset-2 col-8 pt-2 pb-5 mb-5">
                <img src="assets/images/logo.png" class="img-fluid" alt="<?php __('page_title') ?>">
            </div>
        </div>
    </div>
    <div class="container-fluid offset-2 col-6">
        <div class="mt-5 pt-5">

        </div>
        <div class="mt-5 pt-5">
            <div class="h1 pt-5 text-bold main-title">
					<?php __('organic_products_from_portugal') ?>
                <br>
					<?php __('organic_products_from_portugal' , 'en') ?>
            </div>
        </div>
        <br>
        <div class="text-normal noto-sans" style="font-size: 22px;">
			  <?php __('top_nav_text') ?>
        </div>
    </div>
</div>

<div class="bg-white pb-5 pt-5">
    <div class="container-fluid offset-2 col-9 p-5">
        <form class="form-inline row" action="includes/save_send_emails.php" method="POST">
            <label class="h3 noto-sans mr-3" for="inlineFormInputName2"><?php __('register_your_email') ?></label>&nbsp;
            <input type="email" class="form-control email p-4" id="inlineFormInputName2" placeholder="Email" name="email" required>
            <button type="submit" class="btn btn-outline-dark ml-3 pl-5 pr-5 ml-2 btn-lg rounded-1">Submit</button>
        </form>
    </div>
</div>

<div class="nav-green p-5">
    <footer class="container-fluid p-5">
        <div class="row text-normal">
            <div class="col-md text-left">
                Copyright &copy; 2020 Biobazar - All Rights Reserved.
            </div>
            <div class="col-md text-center">
                <span class="fab fa-facebook fa-2x"></span>
            </div>
            <div class="col-md text-right">
                Engimattstrasse 36, 8002 Zurich
            </div>
        </div>
    </footer>
</div>

</body>
</html>