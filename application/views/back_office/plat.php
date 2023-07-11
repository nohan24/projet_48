<div class="p-1">
    <h2 class="mb-3">Plat</h2>
    <div class="card mb-2">
        <h4 class="mb-3">Ajout d'un nouveau plat</h4>
        <form action="<?= site_url("admin/insertPlat") ?>" method="post">
            <div class="mb-3 d-flex flex-column">
                <label class="mb-2" for="quantite">Nom du plat : </label>
                <div class="d-flex align-items-end gap-1">
                    <input type="text" name="plat" placeholder="ex: Salade de mortadelle">
                </div>
            </div>
            <div class="form-group mb-3">
                <div class="mb-2">
                    <i><label for="radio1">Conditions de santé spéciales :</label></i>
                </div>
                <?php for ($i = 0; $i < count($param); $i++) { ?>
                    <div class="d-flex gap-2 align-items-center">
                        <input class="form-check-input" type="checkbox" name="restriction[]" id="radio1" value="<?php echo $param[$i]['id']; ?>">
                        <label class="form-check-label" class="ms-2" for="radio1"><?php echo $param[$i]['name']; ?></label>
                    </div>
                <?php } ?>
            </div>
            <input type="submit" value="Valider l'ajout" class="btn-1">
        </form>
    </div>

    <div class="card">
        <h4>Liste des plats</h4>
        <?php
        var_dump($plat); ?>
    </div>
</div>