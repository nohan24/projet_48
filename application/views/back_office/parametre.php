<div class="p-1">
    <h2 class="mb-3">Paramètre</h2>
    <div class="card mb-2">
        <h4>Ajout d'un nouveau paramètre</h4>
        <form action="<?= site_url("admin/insertParametre"); ?>" method="post">
            <label>Nom du paramètre : </label>
            <input type="text" name="param_name" placeholder="ex : Diabète"><br><br>
            <input type="submit" value="Ajouter le paramètre" class="btn-1" id="">
        </form>
    </div>
    <div class="card">
        <h4>Liste des paramètres</h4>
        <table class="table table-borderless" id="filter">
            <thead>
                <tr class="text-center">
                    <th scope="col">Nom du paramètre</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <div class="line"></div>
            <tbody>
                <?php
                foreach ($parametre as $p) { ?>
                    <tr class="text-center">
                        <form action="<?= site_url("admin/modificationParametre"); ?>" method="post">
                            <th>

                                <input type="hidden" name="param_id" value="<?= $p['id'] ?>">
                                <input type="text" name="param" value="<?= $p['name'] ?>">

                            </th>
                            <td class="d-flex justify-content-center gap-2"> <button style="border: none;" class="btn-4 link"><i class="fa-solid fa-pen" style="color:white; font-size:14px;"></i> </button> <a href="<?php echo site_url('admin/deleteParametre/' .  $p['id']); ?>" class="btn-2 link"><i class="fa-solid fa-trash" style="color:white; font-size:14px;"></i></a></td>
                        </form>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</div>