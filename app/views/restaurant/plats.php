<h2>Mes Plats</h2>
<a href="index.php?action=ajouter_plat">Ajouter un plat</a>
<ul>
    <?php foreach ($plats as $plat): ?>
        <li>
            <strong><?= $plat['nom'] ?></strong> - <?= $plat['prix'] ?> TND
            <br><?= $plat['description'] ?>
            <a href="index.php?action=supprimer_plat&id=<?= $plat['id'] ?>">🗑️ Supprimer</a>
        </li>
    <?php endforeach; ?>
</ul>
