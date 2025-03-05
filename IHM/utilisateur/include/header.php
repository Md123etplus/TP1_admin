<?php
    $active_page = explode(".",basename($_SERVER['PHP_SELF']))[0] ;
?>
<header>
    <img src="/IHM/utilisateur/static/image/ants.jpg" alt="logo">
    <div class="navbar">
        <a class="<?php echo ($active_page == "Utilisateurs")?  "active" :  "" ;?>" href="/index.php">Home</a>
        <a class="<?php echo ($active_page == "form_add")?  "active" :  "" ;?>" href="/IHM/utilisateur/form_add.php">Ajouter cv</a>
    </div>
</header>