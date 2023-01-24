<?php
// Inclure le fichier header.php
include 'includes/header.php';
// Inclure le fichier sidebar.php
include 'includes/sidebar.php';
?>
<style>
    .left {
        float: left;
        width: 60%;
    }

    .right {
        float: left;
        width: 40%;
    }

    .right img {
        height: 140px;
        width: 150px;
    }
</style>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Mettre à jour le titre et la description du site</h2>
        <!--            For Update website Title & Logo-->
        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = mysqli_real_escape_string($db->link,$_POST['title']);
            $image = $_FILES['logo'];

            $permitted = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['logo']['name'];
            $file_size = $_FILES['logo']['size'];
            $file_temp = $_FILES['logo']['tmp_name'];
            
            //explode : convertir en binaire
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
            $uploaded_image = "uploads/" . $unique_image;

            if (empty($title)) {
                echo "<script>alert('Erreur titre vide')</script>";
            } else {
                $query = "UPDATE title SET title = '$title'";
                $event = $db->update($query);
                if ($event) {
                echo "<script>alert('Votre Titre a été modifié avec succès !');  window.location.href= 'index.php'</script>";
                } else {
                echo "<script>alert('Votre Titre n'a pas été modifié !');</script>";
                }
            } 
            if (in_array($file_ext, $permitted) == false) {
                echo "<script>alert('Votre Image n'a pas été modifié !');</script>";
            } else {
                move_uploaded_file($file_temp, $uploaded_image);
                $query1 = "UPDATE title SET logo = '$uploaded_image'";
                $updateL = $db->update("$query1");
                echo "<script>alert('Votre Image a été modifié !'); window.location.href= 'index.php'</script>";
            } 
        }
        ?>


        <!--               For show blog title  & logo from database-->
        <div class="block sloginblock">
            <div class="left">
                <form action="" method="post" enctype="multipart/form-data">
                    <?php 
                    
                    $request = "SELECT title FROM title";
                    $title_input = $db->select($request);

                    if ($title_input) {
                        while ($results = $title_input->fetch_assoc()) {
                        $query = "SELECT title FROM title ";
                        }
                    }
                    ?>
                    <table class="form">
                        <tr>
                            <td>
                                <label>Titre du site Web</label>
                            </td>
                            <td>
                                <input type="text" value="" name="title" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Télécharger le logo</label>
                            </td>
                            <td>
                                <input type="file" name="logo" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Modifier" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="right">
            <?php
                $query = "SELECT logo FROM title";
                $requete = $db->select($query);
                if ($requete) {
                    while ($result = $requete->fetch_assoc()) {
            ?>
                <img src="<?php $result['logo']?>" alt="Image du logo">
            <?php }}?>
            </div>
        </div>
    </div>
</div>
<div class="clear">
</div>
</div>
<?php
// Inclure le fichier footer.php
include 'includes/footer.php';
?>