
<div class="container mt-4"></div>
    <h1 class="text-center text-primary mb-4">Liste des commentaires</h1>
        <?php if (!empty($commentaires)): ?>
            <ul class="list-group shadow">
                <?php foreach ($commentaires as $commentaire): ?>
                    <li class="list-group-item">
                        <p><strong><?= $commentaire['prenom'] . ' ' . $commentaire['nom'] ?></strong> 
                        (Note : <?= $commentaire['note'] ?>/5)</p>
                        <p><?= $commentaire['commentaire'] ?></p>
                        <small class="text-muted">Posté le <?= $commentaire['datecommenataire'] ?></small>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="text-center text-muted">Aucun commentaire pour ce véhicule.</p>
        <?php endif; ?>
    </div>
</div>
<br>

