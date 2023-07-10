<div class="p-1">

    <h2 class="mb-3">Modification de l'activite</h2>
    <div class="card">
        <form action="<?= site_url('admin/modificationActivite'); ?>" method="post">
            <div class="mb-3 d-flex flex-row align-items-center gap-1">
                <input type="hidden" name="id_act" value="<?= $act_id ?>">
                <label>Nom de l'activité : </label>
                <input type="text" name="act_name" value="<?php echo $this->Admin_model->getActiviteName($act_id); ?>">
            </div>
            <?php
            $i = 0;
            foreach ($detail as $d) {
                $i += 1;
            ?>
                <div class="activity">
                    <input type="hidden" name="hidden<?= $i ?>" value="<?= $d['detail_activite_id'] ?>">
                    <div>
                        <div class="mb-3 d-flex flex-row align-items-center gap-1">
                            <label class="mb-2" for="quantite">Nom de l'activité et fréquence : </label>
                            <input type="text" name="nom<?= $i ?>" placeholder="ex : Pompe" value="<?= $d['detail_name'] ?>">
                            <input type="number" class="text-center" name="freq<?= $i ?>" placeholder="ex : 10" value="<?= $d['rep']; ?>">
                            <select name="unite<?= $i ?>" id="">
                                <?php
                                foreach ($unite as $u) { ?>
                                    <?php
                                    if ($u['unite_activite_id'] == $d['unite_activite_id']) { ?>
                                        <option value="<?= $u['unite_activite_id']; ?>" selected><?= $u['unite_name']; ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $u['unite_activite_id']; ?>"><?= $u['unite_name']; ?></option>
                                    <?php }
                                    ?>
                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
            <input type="hidden" name="num_hidden" value="<?= $i ?>">

            <input type="submit" value="Valider la modification" class="btn-1">
        </form>
    </div>
</div>