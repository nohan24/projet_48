<div id="login">
    <form class="loginForm" action="<?= site_url('Login/login') ?>" method="post">
      <div class="field_container">
        <div class="icon_container"><i class="fas fa-fingerprint icon"></i></div>
        <div class="field"><input class="" type="text" name="email" placeholder="Adresse Email ..." id="username"/></div>
      </div>
      
      <div class="field_container">
        <div class="icon_container"><i class="fas fa-key icon"></i></div>
        <div class="field"><input type="password" name="password" placeholder="Mot de passe ... " id="password ... "/></div>
      </div>

      <button type="submit" class="lastElement">Se connecter</button>
    </form>
</div>