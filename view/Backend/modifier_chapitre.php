<?php $this->titre = "Modifier l'chapitre"; ?>
<?php if ($this->session->get('role') === 'admin') { ?>
    <section id="modifierChapitre">

        <div class="container-fluid">
            <form method="post" action="index.php?route=modifierChapitre&chapitreId=<?= htmlspecialchars($chapitre->getId()); ?>">
                <label for="titre">Titre</label><br>
                <input type="text" id="titre" name="titre" value="<?= htmlspecialchars($chapitre->getTitle()); ?>" ><br>
                <label for="contenu">Contenu</label><br>
                <textarea id="contenu" name="contenu" ><?= htmlspecialchars($chapitre->getContent()); ?></textarea><br>
                <input class="btn btn-primary" id="chapitrebtnmodif" type="submit" value="Sauvegarder" id="submit" name="submit">
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
        width: '100%',
        height: 300,
        plugins: 'image code',
        browser_spellcheck: true,
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
                title: 'Help',
                items: 'help'
            }
        },
        branding: false,
        mobile: {
            menubar: true
        },
        // upload image functionality
        images_upload_url: '../view/Backend/upload.php',

        images_upload_handler: function(blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', 'upload.php');

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