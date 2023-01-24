<?php
// Inclure le fichier header.php
include 'includes/header.php';
// Inclure le fichier sidebar.php
include 'includes/sidebar.php';
?>;
<div class="grid_10">
    <div class="box round first grid">
        <h2>Mettre à jour le texte du droit d'auteur</h2>
        <!--   For update copyright media -->
        <?php
        // Si la méthode de requête est POST
        // Alors
        //     Récupérer la valeur de copyright
        //     Si copyright est vide
        //         Alors
        //             Afficher un message d'erreur
        //         Sinon
        //             Mettre à jour le copyright dans la table footer
        //             Si le copyright est mis à jour
        //                 Alors
        //                     Afficher un message de succès
        //                 Sinon
        //                     Afficher un message d'erreur

        // $showname = "SELECT * FROM copyright WHERE id = '$id'";
        // $showname = $copyright->fetch();


        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $copyright = mysqli_real_escape_string($db->link, $_POST['copyright']);
            if (empty($copyright)){
                echo "Votre copyright n'a pas été mis à jour !";
            } else  {
                if (!empty($copyright)){
                $query = "UPDATE footer SET copyright = '$copyright'";
                $event = $db->update($query);
                echo "<script>alert('Votre copyright a été modifié avec succès !');</script>";
            } else {
                echo "<script>alert('Votre copyright n'a pas été modifié malheureusement une erreur s'est produite...' </script>";
            }
            }
        }
        ?>

        <div class="block copyblock">
            <!--    For show social link from database-->
            <?php
            // Récupérer le copyright de la table footer
            // Tant que le copyright est récupéré
            //     Afficher le copyright

            $query = "SELECT copyright FROM footer";
            $copyright = $db->select($query);

            if ($copyright) {
                while ($result = $copyright->fetch_assoc()) {
                $query = "SELECT copyright FROM footer ";
                    
            
            ?>
            <form action="" method="post">
                <table class="form">
                    <tr>
                        <td>
                            <input type="text"  name="copyright" value="<?=$result['copyright']?>" class="large" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Modifier" />
                        </td>
                    </tr>
                </table>
            </form>
            <?php }} ?>
        </div>
    </div>
</div>
<?php
// Inclure le fichier footer.php
include 'includes/footer.php';
?>