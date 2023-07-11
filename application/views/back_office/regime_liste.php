<div class="p-1">
    <h2 class="mb-3">Liste des régimes diponibles</h2>
    <div class="card">
        <table class="table table-borderless" id="filter">
            <thead>
                <tr class="text-center">
                    <th scope="col">Désignation du régime</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <div class="line"></div>
            <tbody>
                <?php
                foreach ($regime as $r) { ?>
                    <tr class="text-center">
                        <td><?= $r['name'] ?></td>
                        <td class="d-flex justify-content-center align-items-center gap-2"> <a href="#" class="btn-4 link"><i class="fa-solid fa-pen" style="color:white; font-size:14px;"></i></a> <a href="<?= site_url("admin/deleteDiet/" . $r['id']) ?>" class="btn-2 link"><i class="fa-solid fa-trash" style="color:white; font-size:14px;"></i></a></td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</div>