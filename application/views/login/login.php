<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url('assets/fonts/icomoon/style.css'); ?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.min.css'); ?>">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/scss/bootstrap/bootstrap.css'); ?>">

  <!-- Style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/scss/style.css'); ?>">

  <title>Login</title>
</head>

<body>
  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url(<?php echo base_url('assets/images/bg_2.jpeg'); ?>);"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Se connecter à <strong>Nutrivit</strong></h3>
            <p class="mb-4">Connectez-vous pour pouvoir profiter de votre régime personnalisé.</p>
            <form action="<?= site_url("profil/connect") ?>" method="post">
              <div class="form-group first">
                <label for="email">Votre adresse email:</label>
                <input type="text" class="form-control" placeholder="votre-email@gmail.com" name="email" id="email">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" placeholder="Votre mot de passe" name="password" id="password">
              </div>


              <input type="submit" value="Se connecter" class="btn btn-block btn-primary">
            </form>
            <div class="d-flex mb-5 align-items-center">
              <span class="ml-auto"><a href="<?php echo base_url('Profil/signin'); ?>" class="forgot-pass">Pas encore inscrit ? Créez un compte !</a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <script src="js/jquery-3.3.1.min.js"></script> -->
  <script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/validate.js'); ?>"></script>
</body>

</html>