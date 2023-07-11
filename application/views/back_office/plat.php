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
        <table class="table table-borderless" id="filter">
            <thead>
                <tr class="text-center">
                    <th scope="col">Nom de l'activité</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <div class="line"></div>
            <tbody>
                <?php
                foreach ($plat as $p) { ?>
                    <tr class="text-center">
                        <th><?= $p['name'] ?></th>
                        <td class="d-flex justify-content-center gap-2"> <a href="#" class="btn-4 link"><i class="fa-solid fa-pen" style="color:white; font-size:14px;"></i></a> <a href="<?= site_url("admin/supprimerPlat/" . $p['id']); ?>" class="btn-2 link"><i class="fa-solid fa-trash" style="color:white; font-size:14px;"></i></a></td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</div>