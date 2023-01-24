<?php
// Inclure le fichier header.php
include 'includes/header.php';

// Inclure le fichier sidebar.php
include 'includes/sidebar.php';
?>

<?php
// si la méthode de requête est GET
// Alors
//     Récupérer la valeur de msg_id
//     Si msg_id est vide
//         Alors
//             Rediriger vers inbox.php
//     Sinon
//         Récupérer la valeur de id
// Sinon
//     Rediriger vers inbox.php


if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $query = 'SELECT msg_id';
    if (empty($msg_id)) {
        header("Location: inbox.php");
    } else {
        $id = $_GET['id'];
    }
} else {
    header("Location: inbox.php");
}

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Voir les messages</h2>
        <?php
        // Si la méthode de requête est POST
        // Alors
        //     Rediriger vers inbox.php
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            header ("Location: index.php");
        }

        ?>
        <div class="block">
            <?php
            // Selecter tous les messages de la table contact
            // Si le message est sélectionné
            // Alors
            //     Tant que le message est sélectionné
            //         Alors
            //             Afficher le message


            $query = $db->query('SELECT * from contact');
            if ('message' == TRUE){
                while ($db = $query->fetch()) {
                    echo  $contact['message'];
                }
            }
            
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label>Nom</label>
                        </td>
                        <td>
                            <input type="text" readonly value="<?= $result['name']?>" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="text" readonly value="<?= $result['email']?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Objet</label>
                        </td>
                        <td>
                            <input type="text" readonly value="<?= $result['subject']?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Message</label>
                        </td>
                        <td>
                            <textarea style="width: 60%" readonly rows="12"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="ok" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<?php
// Inclure le fichier footer.php
include 'includes/footer.php';
?>