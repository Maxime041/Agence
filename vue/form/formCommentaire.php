
<div class="container mt-4"></div>
    <h1 class="text-center text-primary mb-4">Ajouter un commentaire</h1>

    <div class="d-flex justify-content-center">
        <form action="" method="POST" class="w-75 shadow p-4 rounded bg-white">
            <div class="form-group mt-3">
                <label for="commentaire">Commentaire :</label>
                <textarea id="commentaire" name="commentaire" class="form-control" required></textarea>
            </div>

            <div class="form-group mt-3">
                <label for="note">Note :</label>
                <input type="number" id="note" name="note" class="form-control" min="0" max="5" required>
            </div>

            <button type="submit" name="addCom" class="btn btn-primary mt-2">Poster Commentaire</button>
        </form>
    </div>

    <div class="mt-4">
        <h2 class="text-center text-secondary">Commentaires</h2>
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

