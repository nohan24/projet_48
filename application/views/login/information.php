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
        <div class="bg order-1 order-md-2" style="background-image: url(<?php echo base_url('assets/images/bg_3.jpeg') ?>"></div>
        <div class="contents order-2 order-md-1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <h3>Completez votre inscription à <strong>Nutrivit</strong></h3>
                        <form action="<?php echo base_url('Profil/completion'); ?>" method="post">
                            <div class="form-group mb-3">
                                <label for="datenasissance">Date de naissance:</label>
                                <input data-date-format="dd/mm/yyyy" type="date" name="dtn" id="datenasissance" class="form-control" />
                            </div>
                            <div class="form-group mb-3">
                                <h6>Votre genre:</h6>
                                <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="homme" class="custom-control-input" name="gender" value="0" required />
                                        <label for="homme" class="custom-control-label">Homme</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="femme" class="custom-control-input" name="gender" value="1" required />
                                        <label for="femme" class="custom-control-label">Femme</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="poids">Poids</label>
                                    <input type="number" id="poids" placeholder="ex: 80 kg" name="poids" class="form-control w-100 d-block" min="45" />
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="taille">Taille</label>
                                    <input type="number" min="140" id="taille" name="taille" placeholder="ex: 170 cm" class="form-control w-100 d-block" />
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="objectif">Objectif</label>
                                <select name="objectif" id="objectif" class="form-control w-100 d-block">
                                    <?php for($i = 0; $i < count($objectif); $i++){ ?>
                                        <option value="<?php echo $objectif[$i]['idObjectif']; ?>"><?php echo $objectif[$i]['nomObjectif']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <div class="form-group">
                                    <div>
                                        <label for="radio1">Conditions de santé spéciales :</label>
                                    </div>
                                    <?php for ($i = 0; $i < count($param); $i++) { ?>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="restriction[]" id="radio1" value="<?php echo $param[$i]['id']; ?>">
                                            <label class="form-check-label" for="radio1"><?php echo $param[$i]['name']; ?></label>
                                        </div>
                                    <?php } ?>
                                </div>
                                <input type="submit" value="Valider l'inscription" class="btn btn-block btn-primary" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</html>