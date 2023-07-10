<div class="p-1">
    <h2 class="mb-3">Ajout d'une nouvelle activité</h2>
    <div class="card">
        <form action="<?= site_url("admin/ajoutActivite") ?>" method="post">
            <div class="mb-3 d-flex flex-column">
                <label class="mb-2" for="quantite">Nom de l'activité : </label>
                <div class="d-flex align-items-end gap-1">
                    <input type="text" name="nom" placeholder="ex : Cardio">
                </div>
            </div>
            <h4>Liste des activités : </h4>
            <button class="btn-4 add" style="width: 30px; height:30px; border:none;">+</button>
            <input type="hidden" name="n_activity" value="1" class="hide">
            <div class="activity">
                <div>
                    <div class="mb-3 d-flex flex-row align-items-center gap-1">
                        <label class="mb-2" for="quantite">Nom de l'activité et fréquence : </label>
                        <input type="text" name="nom1" placeholder="ex : Pompe">
                        <input type="number" name="freq1" placeholder="ex : 10">
                        <select name="unite1" id="">
                            <?php
                            foreach ($unite as $u) { ?>
                                <option value="<?= $u['unite_activite_id']; ?>"><?= $u['unite_name']; ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>

            </div>
            <input type="submit" value="Ajouter l'activité" class="btn-1">
        </form>
    </div>
</div>
<script>
    const btn = document.querySelector(".add");
    const act = document.querySelector(".activity");
    var i = 1
    var hide = document.querySelector(".hide")
    btn.addEventListener('click', (e) => {
        e.preventDefault()
        i += 1
        let a = `
            <div class="mb-3 d-flex flex-row align-items-center gap-1">
                        <label class="mb-2" for="quantite">Nom de l'activité et fréquence : </label>
                        <input type="text" name="nom` + i + `" placeholder="ex : Pompe">
                        <input type="number" name="freq` + i + `" placeholder="ex : 10">
                        <select name="unite` + i + `" id="">
                            <?php
                            foreach ($unite as $u) { ?>
                                <option value="<?= $u['unite_activite_id']; ?>"><?= $u['unite_name']; ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
        `
        let b = document.createElement('div')
        b.innerHTML = a
        act.appendChild(b)
        hide.value = i
    })
</script>