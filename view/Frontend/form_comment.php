<form method="post" action="index.php?route=addComment&chapitreId=<?= htmlspecialchars($chapitre->getId()); ?>">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo"><br>
    <label for="content">Message</label><br>
    <textarea id="content" name="content"></textarea><br>
    <input type="submit" value="Ajouter" id="submit" name="submit">
</form>
