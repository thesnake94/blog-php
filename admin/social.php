<?php
// Inclure le fichier header.php
include 'includes/header.php';
// Inclure le fichier sidebar.php
include 'includes/sidebar.php';
?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Mettre à jour les médias sociaux</h2>
        <!--   For update social media -->
        <?php
        // Si la méthode de requête est POST
        // Alors
        //     Récupérer la valeur de facebook
        //     Récupérer la valeur de github
        //     Récupérer la valeur de skype
        //     Récupérer la valeur de linkedin
        //     Récupérer la valeur de google
         //     Si facebook, github, skype, linkedin ou google est vide
        //         Alors
        //             Afficher un message d'erreur
        //         Sinon
        //             Mettre à jour les médias sociaux dans la table tbl_social
        //             Si les médias sociaux sont mis à jour
        //                 Alors
        //                     Afficher un message de succès
        //                 Sinon
        //                     Afficher un message d'erreur



        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $facebook = mysqli_real_escape_string($db->link, $_POST['facebook']);
            $github = mysqli_real_escape_string($db->link, $_POST['github']);
            $skype = mysqli_real_escape_string($db->link, $_POST['skype']);
            $linkedin = mysqli_real_escape_string($db->link, $_POST['linkedin']);
            $google = mysqli_real_escape_string($db->link, $_POST['google']);
            
            if (empty($facebook) || empty($github) || empty($skype) || empty($linkedin) || empty($google)){
                echo "Vous n'avez pas mis à jour tous les réseaux! ";
            } else {
                if (!empty($facebook)  || !empty($github) || !empty($skype) || !empty($linkedin) || !empty($google)) {
                    $query = "UPDATE social SET facebook = '$facebook', github = '$github', skype = '$skype', linkedin = '$linkedin', google = '$google'";
                    $event = $db->update($query);
                    echo "<script>alert('Vos Média sociaux ont été modifié avec succès !');</script>";
                } else {
                    echo "<script>alert('Vos médias sociaux n'ont pas été modifié malheureusement une erreur s'est produite...' </script>";
                }

                
                // if (!empty($github)) {
                //     $query = "UPDATE social SET github = '$github'";
                //     $event = $db->update($query);
                //     echo "<script>alert('Votre github a été modifié avec succès !');</script>";
                // } else {
                //     echo "<script>alert('Votre réseau n'a pas été modifié malheureusement une erreur s'est produite...' </script>";
                // }
                // if (!empty($skype)) {
                //     $query = "UPDATE social SET skype = '$skype'";
                //     $event = $db->update($query);
                //     echo "<script>alert('Votre skype a été modifié avec succès !');</script>";
                // } else {
                //     echo "<script>alert('Votre réseau n'a pas été modifié malheureusement une erreur s'est produite...' </script>";
                // }
                // if (!empty($linkedin)) {
                //     $query = "UPDATE social SET linkedin = '$linkedin'";
                //     $event = $db->update($query);
                //     echo "<script>alert('Votre linkedin a été modifié avec succès !');</script>";
                // } else {
                //     echo "<script>alert('Votre réseau n'a pas été modifié malheureusement une erreur s'est produite...' </script>";
                // }
                // if (!empty($google)) {
                //     $query = "UPDATE social SET google = '$google'";
                //     $event = $db->update($query);
                //     echo "<script>alert('Votre google a été modifié avec succès !');</script>";
                // } else {
                //     echo "<script>alert('Votre réseau n'a pas été modifié malheureusement une erreur s'est produite...' </script>";
                // }
            }
        }

       
        ?>

        <div class="block">
            <!--     For show social link from database-->
            <?php

            // Récupérer les données de la table tbl_social
            // Tant que les données sont récupérées
             // Afficher les données
                 

             $query = "SELECT * FROM social";
             $social = $db->select($query);
 
             if ($social) {
                 while ($result = $social->fetch_assoc()) {
                 $query = "SELECT * FROM social ";

            ?>
            <form action="" method="post">
                <table class="form">
                    <tr>
                        <td>
                            <label>Facebook</label>
                        </td>
                        <td>
                            <input type="text" name="facebook" value="<?=$result['facebook']?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Github</label>
                        </td>
                        <td>
                            <input type="text" name="github" value="<?=$result['github']?>" class=" medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Skype</label>
                        </td>
                        <td>
                            <input type="text" name="skype" value="<?=$result['skype']?>" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>LinkedIn</label>
                        </td>
                        <td>
                            <input type="text" name="linkedin" value="<?=$result['linkedin']?>" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Google </label>
                        </td>
                        <td>
                            <input type="text" name="google" value="<?=$result['google']?>" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Modifier" />
                        </td>
                    </tr>
                </table>
            </form>
<?php  } }?>
        </div>
    </div>
</div>
<?php
// Inclure le fichier footer.php
include 'includes/footer.php';
?>