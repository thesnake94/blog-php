<?php
// Inclure le fichier header.php
include 'includes/header.php';
// Inclure le fichier sidebar.php
include 'includes/sidebar.php';
?>
<?php

//     Récupérer la valeur de catid
//     Si catid est vide
//         Alors
//          afficher message d'erreur


    $category_id = $_GET['catid'];
    if (empty ($category_id)){
        echo "probleme";
    }



 ?>


<div class="grid_10">

    <div class="box round first grid">
        <h2>Update Category</h2>
        <div class="block copyblock">
            <!--                Category update query-->
            <?php
            // Si la méthode de requête est POST
            // Alors
            //     Récupérer la valeur de name
            //     Si name est vide
            //         Alors
            //             Afficher un message d'erreur
            //         Sinon
            //             Mettre à jour la catégorie dans la table category
            //             Si la catégorie est mise à jour
            //                 Alors
            //                     Afficher un message de succès
            //                 Sinon
            //                     Afficher un message d'erreur


            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $name = mysqli_real_escape_string($db->link, $_POST['name']);
                
                if (empty($name)) {
                    echo "c'est vide ";
                } else {
                    $query = "UPDATE category SET name = '$name' WHERE category_id='$category_id'";
                    $event = $db->update($query);
                    echo "<script>alert('ça a été mis à jour !'); window.location.href='category_list.php' </script>";
                    
                }
            }

            ?>            
            <form method="post">
                <table class="form">
                    <tr>
                        <td>
                            <input type="text" name="name" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Modifier" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="category_list.php" >RETOUR</a>
                        </td>
                    </tr>
                </table>
            </form>
            
        </div>
    </div>
</div>
<?php
// Inclure le fichier footer.php
include 'includes/footer.php';
?>