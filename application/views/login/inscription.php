<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo base_url('assets/fonts/icomoon/style.css'); ?>" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/scss/bootstrap/bootstrap.css'); ?>" />

  <!-- Style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/scss/style.css'); ?>" />

  <title>Inscription</title>
</head>

<body>
  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('<?php echo base_url('assets/images/bg_3.jpeg'); ?>')"></div>
    <div class="contents order-2 order-md-1">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Inscrivez-vous à <strong>Nutrivit</strong></h3>
            <p class="mb-4">
              En vous inscrivant vous pourriez avoir accès à notre programme personnalisé pour votre santé.
            </p>
            <form action="<?php echo base_url('Profil/inscription'); ?>" method="post">
              <div class="d-flex align-items-center">
                <div class="form-group w-100">
                  <label for="nom">Nom d'utilisateur:</label>
                  <input type="text" class="form-control" placeholder="Votre nom d'utilisateur" id="nom" name="username" />
                </div>
              </div>
              <div class="form-group mb-3">
                <label for="password">Votre adresse e-mail:</label>
                <input type="email" class="form-control w-100" placeholder="votre-email@example.com" id="email" name="email" />
              </div>
              <div class="form-group last mb-3">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" placeholder="Votre mot de passe" id="password" name="password" />
              </div>
              <input type="submit" value="S'inscrire" class="btn btn-block btn-primary" />
            </form>
            <div class="d-flex mb-5 align-items-center">
              <span class="ml-auto"><a href="<?php echo base_url('profil'); ?>" class="forgot-pass">Déjà inscrit ? Connectez-vous ici !</a></span>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</body>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>

</html>