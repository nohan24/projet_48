<div class="p-1">
    <h2 class="mb-3">Ajout d'un nouveau régime</h2>
    <div class="card">
        <form action="<?= site_url("admin/ajoutRegime") ?>" method="post" enctype="multipart/form-data">
            <div class="d-flex flex-column">
                <i><label for="">Image de couverture : </label></i>
                <input type="file" name="img" class="mb-3" style="background-color: white;">
            </div>

            <div class="mb-3 d-flex flex-column">
                <i><label>Désignation du régime :</label></i>
                <input type="text" class="w-25" name="nom">
            </div>

            <div class="mb-3 d-flex flex-column" style="font-size: 14px;">
                <i><label>Genre :</label></i>

                <div class="d-flex gap-2">
                    <span style="width: 70px;">Homme</span><input type="radio" name="genre" value="0">
                </div>
                <div class="d-flex gap-2">
                    <span style="width: 70px;">Femme</span><input type="radio" name="genre" value="1">
                </div>
            </div>

            <div class="mb-3 d-flex flex-column" style="font-size: 14px;">
                <i><label>Objectif :</label></i>

                <div class="d-flex gap-2">
                    <span style="width: 70px;">Perte</span><input type="radio" name="objectif" value="-1">
                </div>
                <div class="d-flex gap-2">
                    <span style="width: 70px;">Gain</span><input type="radio" name="objectif" value="1">
                </div>
            </div>

            <div class="mb-3">
                <i><label>Choix des nourritures :</label></i>
                <div class="mt-2 d-flex gap-5" style="flex-wrap: wrap;">
                    <?php
                    foreach ($plat as $p) { ?>
                        <div class="d-flex gap-2">
                            <span style="font-size: 15px;"><?= $p['name']; ?></span><input type="checkbox" name="plat[]" value="<?= $p['id'] ?>">
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="mb-3">
                <i><label>Choix des activités :</label></i>
                <div class="mt-2 d-flex gap-5" style="flex-wrap: wrap;">
                    <?php
                    foreach ($activite as $a) { ?>
                        <div class="d-flex gap-2">
                            <span style="font-size: 15px;"><?= $a['activite_name']; ?></span><input type="checkbox" name="activite[]" value="<?= $a['activite_id'] ?>">
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="mb-3 d-flex flex-column">
                <i><label>Prix par semaine :</label></i>
                <input type="number" min="0" step="0.01" class="w-25" name="prix">
            </div>

            <div class="mb-3 d-flex flex-column">
                <i><label>Poids par semaine :</label></i>
                <input type="number" min="0" step="0.01" class="w-25" name="poids" placeholder="ex: 0.2Kg">
            </div>

            <div class="mb-3 d-flex flex-column">
                <i><label>% en viande :</label></i>
                <input type="number" min="0" class="w-25" placeholder="ex: 10%" name="viande">
            </div>

            <div class="mb-3 d-flex flex-column">
                <i><label>% en poisson :</label></i>
                <input type="number" min="0" class="w-25" placeholder="ex: 25%" name="poisson">
            </div>

            <div class="mb-3 d-flex flex-column">
                <i><label>% en volaille :</label></i>
                <input type="number" min="0" class="w-25" placeholder="ex: 0%" name="volaille">
            </div>

            <input type="submit" value="Valider l'ajout" class="btn-1">
        </form>
    </div>
</div>