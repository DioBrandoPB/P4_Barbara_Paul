<?php $this->title = "Modifier l'article"; ?>
<?php if ($this->session->get('role') === 'admin') { ?>
    <section id="modifierChapitre">

        <div class="container-fluid">
            <form method="post" action="index.php?route=modifierChapitre&chapitreId=<?= htmlspecialchars($chapitre->getId()); ?>">
                <label for="title">Titre</label><br>
                <input type="text" id="title" name="title" value="<?= htmlspecialchars($chapitre->getTitle()); ?>"><br>
                <label for="content">Contenu</label><br>
                <textarea id="content" name="content"><?= htmlspecialchars($chapitre->getContent()); ?></textarea><br>
                <input class="btn btn-primary" type="submit" value="Sauvegarder" id="submit" name="submit">
            </form>
            <a href="index.php">Retour à l'accueil</a>
        </div>
    </section>
<?php } ?>

<script src="js/tinymce/tinymce.min.js"></script>
</script>
<script>
    tinymce.init({
        language: 'fr_FR',
        selector: 'textarea',
        entity_encoding: "raw",
        height: "480",
        force_br_newlines: false,
        force_p_newlines: true,

    });
</script>