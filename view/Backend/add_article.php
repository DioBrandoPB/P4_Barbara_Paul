<?php $this->title = "Nouveau chapitre"; ?>
<?php if ($this->session->get('role') === 'admin') { ?>
<section id="nouveauChapitre">
  <div class="container-fluid">
    <form id="nouveauChapitre" method="post" action="index.php?route=ajouterChapitre">
      <label for="title">Titre</label><br>
      <input type="text" id="title" name="title"><br>
      <label for="content">Contenu</label><br>
      <textarea id="content" name="content"></textarea><br>

      <input class="btn btn-primary" type="submit" value="Envoyer" id="submit" name="submit">
      <p>Le chapitre sera en brouillon par défaut, n'oubliez pas de le publier depuis le tableau de bord !</p>
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
    entity_encoding : "raw",
    height : "480",
    force_br_newlines : false,
      force_p_newlines : true,

  });
</script>

