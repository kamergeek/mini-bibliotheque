<?php
?>
<nav style="background:#1a1a2e; padding:15px; margin-bottom:20px; display:flex; align-items:center; justify-content:space-between; border-bottom: 2px solid #00d4ff;">
    <?php if (isset($_SESSION['role'])) { ?>
        <div>
            <a href="livres.php" style="color:#00d4ff; margin-right:15px;">📚 Livres</a>
            <a href="ajouter_livre.php" style="color:#00d4ff; margin-right:15px;">➕ Ajouter</a>
            <?php if ($_SESSION['role'] === 'administrateur') { ?>
                <a href="inscription.php" style="color:#00d4ff; margin-right:15px;">👤 Créer un compte</a>
            <?php } ?>
        </div>
        <a href="logout.php" style="color:#ff4757;">🚪 Déconnexion</a>
    <?php } else { ?>
        <div></div>
        <a href="login.php" style="color:#00d4ff;">🔑 Connexion</a>
    <?php } ?>
</nav>
