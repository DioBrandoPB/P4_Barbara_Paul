<?php $this->titre = "Nouveau chapitre"; ?>
<?php if ($this->session->get('role') === 'admin') { ?>
<section id="nouveauChapitre">
  <div class="container-fluid">
    <form id="nouveauChapitre" method="post" action="index.php?route=ajouterChapitre">
      <label for="titre">Titre</label><br>
                <input type="text" id="titre" name="titre" onfocus="verificationVide4()" onblur="verificationVide4()" onkeyup="verificationVide4()"><br>
                <label for="contenu">Contenu</label><br>
                <textarea id="contenu" name="contenu"></textarea><br>
                <input class="btn btn-primary" id="chapitrebtn" type="submit" value="Sauvegarder" id="submit" name="submit">
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
      width:'100%',
    height: 300,
    plugins: 'image code',
    browser_spellcheck : true,
    menu: {
        file: { 
            title: 'File', 
            items: 'newdocument restoredraft | preview | print' 
        },
        edit: { 
            title: 'Edit', 
            items: 'undo redo | cut copy paste | selectall | searchreplace' 
        },
        view: { 
            title: 'View', 
            items: 'code | visualaid visualchars visualblocks | preview fullscreen' 
        },
        insert: { 
            title: 'Insert', 
            items: 'image link media template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor toc | insertdatetime' 
        },
        format: { 
            title: 'Format', 
            items: 'bold italic underline strikethrough superscript subscript codeformat | formats blockformats fontformats fontsizes align | forecolor backcolor | removeformat' 
        },
        tools: { 
            title: 'Tools', 
            items: 'code wordcount' 
        },
        table: { 
            title: 'Table', 
            items: 'inserttable | cell row column | tableprops deletetable' 
        },
        help: { 
            title: 'Help', items: 'help' 
        },
        toolbar: {
          items:'image link media template codesample inserttable'
        }
    },
    branding: false,
    mobile: {
        menubar: true
    },
    
    // upload image functionality
    images_upload_url: '../../Public/img',
    
    images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', 'upload');

            xhr.onload = function() {
              var json; 

              if (xhr.status != 200) {
                failure('HTTP Error: ' + xhr.status);
                return;
              }

              console.log(xhr.response);
              //your validation with the responce goes here

              success(xhr.response);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
       }

 });
</script>

