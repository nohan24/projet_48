<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" />
  <link rel="stylesheet" href="<?php echo base_url('assets/scss/bootstrap/bootstrap.css'); ?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/scss/style.css'); ?>" />
  <title>Suggestions</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Nutrivit</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex align-items-center" id="navbarNav">
      <ul class="navbar-nav">

        <li class="nav-item">
          <form action="<?= site_url("transaction/crediter"); ?>" method="post">
            <input type="number" placeholder="Code" name="code">
            <input type="submit" value="Demande de validation">
            <select id="">
              <?php
              foreach ($codes as $c) { ?>
                <option><?= $c['code_id'] ?> => <?= number_format($c['value'], 2) . " Ar" ?></option>
              <?php }
              ?>
            </select>
          </form>
        </li>
        <li class="m-1">
          <span>Votre argent : <?php echo number_format($money, 2) . " Ar"; ?></span>
        </li>
        <li class="nav-item">
          <a href="<?php echo site_url('profil/logout'); ?>" class="nav-link" style="color:red;">Deconnexion</a>
        </li>

      </ul>

    </div>
  </nav>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="h3 text-center">Régimes suggérés</div>
      <a href="<?= site_url("regime/SuggestionPdf"); ?>"><i class="fa-solid fa-file-pdf"></i></a>
      <i class="fa-solid fa-file-pdf"></i>
      <div class="row">
        <?php if (count($regime) == 0) { ?>
          <p>Il n'existe pas de régimes adaptés pour vous.</p>
        <?php } else
          for ($i = 0; $i < count($regime); $i++) {
        ?>
          <?php
            $detail = $this->Suggestion_model->getDetail($_SESSION['user'], $regime[$i]['id']);
          ?>
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img src="<?php echo base_url('assets/images/regime/' . $regime[$i]['path_img']); ?>" alt="regime" class="bd-placeholder card-img-top">
              <div class="card-body">
                <p class="text-center text-danger font-weight-bold"><?php echo $regime[$i]['name']; ?> ( <?php echo $detail[0]; ?> semaine(s) )</p>
                <ul class=" mb-4 list-group list-group-flush">
                  <li class="list-group-item">Viandes: <?php echo $regime[$i]['pour_viande']; ?>%</li>
                  <li class="list-group-item">Poissons: <?php echo $regime[$i]['pour_poisson']; ?>%</li>
                  <li class="list-group-item">Volailles: <?php echo $regime[$i]['pour_volaille']; ?>%</li>
                </ul>
                <div class="d-flex justify-content-between align-items-center">
                  <a href="<?php echo base_url('regime/apropos/' . $regime[$i]['id']); ?>" class="link">En savoir plus</a>
                  <small class="text-muted"><?php echo number_format($detail[1], 2); ?> Ar</small>
                </div>

                <a href="<?php echo base_url('regime/acheter/' . $regime[$i]['id'] . '/' . $detail[1]); ?>">
                  <button class="btn btn-block btn-primary">Acheter</button>
                </a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  </div>
  <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</body>

</html>