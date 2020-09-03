<?php $this->title = "Modifier l'article"; ?>
<h1>Mon blog</h1>
<p>En construction</p>
<div>
    <form method="post" action="index.php?route=modifierChapitre&articleId=<?= htmlspecialchars($chapitre->getId()); ?>">
        <label for="title">Titre</label><br>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($chapitre->getTitle()); ?>"><br>
        <label for="content">Contenu</label><br>
        <textarea id="content" name="content"><?= htmlspecialchars($chapitre->getContent()); ?></textarea><br>
        <label for="author">Auteur</label><br>
        <input type="text" id="author" name="author" value="<?= htmlspecialchars($chapitre->getAuthor()); ?>"><br>
        <input type="submit" value="Mettre à jour" id="submit" name="submit">
    </form>
    <a href="index.php">Retour à l'accueil</a>
</div>