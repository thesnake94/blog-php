<?php
// Inclure le fichier header.php
include 'includes/header.php';
// Inclure le fichier sidebar.php
include 'includes/sidebar.php';
?>
<?php


if (isset($_GET['edit_postid'])){
    $post_id = $_GET['edit_postid'];
    if (empty($post_id)) {
        echo "<script>alert('Problème')</script>";
    }
}

// Si la méthode de requête est GET
// Alors
//     Récupérer la valeur de edit_postid
//     Si edit_postid est vide
//         Alors
//             Rediriger vers post_list.php
//     Sinon
//         Récupérer la valeur de id
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Ajouter un nouveau post</h2>
        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = mysqli_real_escape_string($db->link, $_POST['title']);
            $category =  mysqli_real_escape_string($db->link, $_POST['category_id']);
            $author =  mysqli_real_escape_string($db->link, $_POST['author']);
            $tags =  mysqli_real_escape_string($db->link, $_POST['tags']);
            $body = mysqli_real_escape_string($db->link,$_POST['body']);
            $image = $_FILES['image'];
            
            $permitted = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];
            
            //explode : convertir en binaire
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
            $uploaded_image = "uploads/" . $unique_image;

            $cat = "SELECT category_id FROM category WHERE name = '$category'";

            $categoryname = $db->select($cat);
            $categoryname = $categoryname->fetch_assoc()["category_id"];
            if (empty($title)) {
                echo "<script>alert('Veuillez entrer un titre !');</script>";
            } else {
                move_uploaded_file($file_temp, $uploaded_image);
                $quer = "UPDATE post SET category_id = '$categoryname', title = '$title', body =  '$body', image = '$uploaded_image', author = '$author', tags = '$tags' WHERE id =  $post_id";
                //$query = "UPDATE category SET name = '$name' WHERE category_id='$category_id'";
                //$quer = "INSERT INTO post(category_id, title, body,image, author, tags) VALUES(5, 'test', 'test','m', 'test', 'test')";
                $post = $db->update($quer);
                if ($post == true) {
                    echo "<script>alert('Post modifié avec succès !'); window.location.href= 'post_list.php'</script>";
                } else {
                    echo "<script>alert('Erreur !');</script>";
                }
            }
        }
        // Si la méthode de requête est POST
        // Alors
        //     Récupérer la valeur de title
        //     Récupérer la valeur de category_id
        //     Récupérer la valeur de author
        //     Récupérer la valeur de tags
        //     Récupérer la valeur de body
        //     Récupérer la valeur de image
        //     Si title est vide
        //         Alors
        //             Afficher un message d'erreur
        //         Sinon
        //             Insérer le post dans la table post
        //             Si le post est inséré
        //                 Alors
        //                     Afficher un message de succès
        //                 Sinon
        //                     Afficher un message d'erreur
        ?>
        <div class="block">
            <?php

            // Récupérer le post de la table post
            // Tant que le post est récupéré
            //     Afficher les valeurs de title, category_id, author, tags, body et image dans les champs correspondants
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input type="text" name="title" value="" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Categories</label>
                        </td>
                        <td>
                            <select id="select" name="category_id">
                                    <option>Select Category </option>
                                    <?php
                                    $query = "SELECT * FROM category";
                                    $requete = $db->select($query);
                                    if ($requete) {
                                        while ($result = $requete->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $result['name'];?>"><?php echo $result['name'];?></option>
                                    <?php }}?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Télécharger une image</label>
                        </td>
                        <td>
                            <img src="" height="60px" width="100px" alt="">
                            <input type="file" name="image" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Nom de l'auteur</label>
                        </td>
                        <td>
                            <input type="text" name="author" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tags</label>
                        </td>
                        <td>
                            <input type="text" name="tags" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Contenu</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="body"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Sauvegarder" />
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