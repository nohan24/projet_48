<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/back_style.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title><?php echo $title; ?></title>
</head>

<body>
    <nav class="sidebar">
        <div class="menu-content d-flex flex-column align-items-center">
            <ul class="menu-items w-75" style="padding:0px;">
                <li class="text-center p-3" style="font-size:30px;">Nutrivit</li>
                <li class="item">
                    <div class="submenu-item">
                        <span><i class="fa-solid fa-chart-simple"></i> Tableau de bord</span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                    <ul class="menu-items submenu">
                        <li class="text-center p-3" style="font-size:30px;">Nutrivit</li>
                        <div class="menu-title">
                            <i class="fa-solid fa-chevron-left"></i>Tableau de bord
                        </div>
                        <li class="item">
                            <a href="<?= site_url("admin") ?>"><i class="fa-regular fa-circle"></i> Statistique</a>
                        </li>
                    </ul>
                </li>
                <li class="item">
                    <div class="submenu-item">
                        <span><i class="fa-brands fa-nutritionix"></i> Régime</span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                    <ul class="menu-items submenu">
                        <li class="text-center p-3" style="font-size:30px;">Nutrivit</li>
                        <div class="menu-title">
                            <i class="fa-solid fa-chevron-left"></i>Régime
                        </div>
                        <li class="item">
                            <a href="<?php echo site_url("admin/regime/ajout"); ?>"><i class="fa-regular fa-circle"></i> Ajout d'un régime</a>
                        </li>
                        <li class="item">
                            <a href="<?= site_url("admin/regime/liste") ?>"><i class="fa-regular fa-circle"></i> Liste des régimes</a>
                        </li>
                        <li class="item">
                            <a href="<?= site_url("admin/regime/plat"); ?>"><i class="fa-regular fa-circle"></i> Plat</a>
                        </li>

                    </ul>
                </li>
                <li class="item">
                    <div class="submenu-item">
                        <span><i class="fa-solid fa-person-running"></i> Activités</span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                    <ul class="menu-items submenu">
                        <li class="text-center p-3" style="font-size:30px;">Nutrivit</li>
                        <div class="menu-title">
                            <i class="fa-solid fa-chevron-left"></i>Activités
                        </div>
                        <li class="item">
                            <a href="<?php echo site_url('admin/activite/ajout'); ?>"><i class="fa-regular fa-circle"></i> Ajout</a>
                        </li>
                        <li class="item">
                            <a href="<?= site_url("admin/activite/liste"); ?>"><i class="fa-regular fa-circle"></i> Liste</a>
                        </li>

                    </ul>

                </li>

                <li class="item">
                    <div class="submenu-item">
                        <span><i class="fa-solid fa-money-check"></i> Code monnaie</span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                    <ul class="menu-items submenu">
                        <li class="text-center p-3" style="font-size:30px;">Nutrivit</li>
                        <div class="menu-title">
                            <i class="fa-solid fa-chevron-left"></i>
                            Code monnaie
                        </div>
                        <li class="item">
                            <a href="<?= site_url("admin/code") ?>"><i class="fa-regular fa-circle"></i>Validation</a>
                        </li>
                    </ul>
                <li class="item">
                    <a href="<?= site_url("admin/parametre"); ?>"><i class="fa-solid fa-list-check"></i>Paramètre</a>
                </li>

                <li class="red">
                    <a href="<?= site_url("profil/logout"); ?>"><i class="fa-solid fa-right-from-bracket me-4"></i>Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="main py-3 px-4">
        <?php $this->load->view($content); ?>
    </main>

    <script>
        const sidebar = document.querySelector(".sidebar");

        const menu = document.querySelector(".menu-content");
        const menuItems = document.querySelectorAll(".submenu-item");
        const subMenuTitles = document.querySelectorAll(".submenu .menu-title");
        menuItems.forEach((item, index) => {
            item.addEventListener("click", () => {
                menu.classList.add("submenu-active");
                item.classList.add("show-submenu");
                menuItems.forEach((item2, index2) => {
                    if (index !== index2) {
                        item2.classList.remove("show-submenu");
                    }
                });
            });
        });
        subMenuTitles.forEach((title) => {
            title.addEventListener("click", () => {
                menu.classList.remove("submenu-active");
            });
        });
    </script>
</body>

</html>