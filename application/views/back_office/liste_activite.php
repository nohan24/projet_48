<div class="p-1">
    <h2 class="mb-3">Liste des activités</h2>
    <div class="card">
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
                foreach ($activite as $a) { ?>
                    <tr class="text-center">
                        <th><?= $a['activite_name'] ?></th>
                        <td class="d-flex justify-content-center gap-2"> <a href="<?php echo site_url('admin/activite/modification/' . $a['activite_id']); ?>" class="btn-4 link"><i class="fa-solid fa-pen" style="color:white; font-size:14px;"></i></a> <a href="<?php echo site_url('admin/delete/' .  $a['activite_id']); ?>" class="btn-2 link"><i class="fa-solid fa-trash" style="color:white; font-size:14px;"></i></a></td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</div>