<div class="p-1">
    <h2 class="mb-3">Demande de validation de code</h2>
    <div class="card">
        <table class="table table-borderless" id="filter">
            <thead>
                <tr class="text-center">
                    <th scope="col">Code</th>
                    <th scope="col">Utilisateur</th>
                    <th scope="col">Montant</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <div class="line"></div>
            <tbody>
                <?php
                foreach ($demande as $d) { ?>
                    <tr class="text-center">
                        <th><?= $d['code_id'] ?></th>
                        <td><?= $d['email'] ?></td>
                        <td><?= number_format($d['value'], 2) . " Ar" ?></td>
                        <td class="d-flex justify-content-center gap-2"> <a href="<?php echo site_url('admin/acceptCode/' . $d['code_id'] . '/' . $d['user_id'] . '/' . $d['value']); ?>" class="btn-3 link"><i class="fa-solid fa-check" style="color:white; font-size:14px;"></i></a> <a href="<?php echo site_url('admin/declineCode/' . $d['code_id'] . '/' . $d['user_id']); ?>" class="btn-2 link"><i class="fa-solid fa-trash" style="color:white; font-size:14px;"></i></a></td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</div>