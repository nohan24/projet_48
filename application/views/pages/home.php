<h2><?= $tittle?></h2>
<?php
    session_start();
    if( !isset($_SESSION['id']) ){
       redirect('Login/login');
    }
?>
<p>
    <a href="<?= site_url('Login/logout')?>">Se deconnecter</a>
</p>