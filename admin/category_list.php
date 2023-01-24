<?php
// Inclure le fichier header.php
include 'includes/header.php';
// Inclure le fichier sidebar.php
include 'includes/sidebar.php';
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Category List</h2>
        <?php

        if(isset($_GET['delid'])){
            $delid=$_GET['delid'];
            $delete_query="DELETE FROM category WHERE category_id='$delid' ";
            $delete_data = $db->delete($delete_query);

            if($delete_data){
                echo "<span style ='color:green;font-size:18px'>La catégorie a été supprimée </span>";       
            }else{
                echo "<span style ='color:red;font-size:18px'>ERROR</span>";
            }
        } else {
            echo "ERROR";
        }

        // Si la méthode de requête est GET
        // Alors
        //     Récupérer la valeur de delid
        //     Supprimer la catégorie de la table category
        //     Si la catégorie est supprimée
        //         Alors
        //             Afficher un message de succès
        //         Sinon
        //             Afficher un message d'erreur
        ?>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>N. De série</th>
                        <th>Nom Catégorie</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM category";
                    $category = $db->select($query);

                    if ($category) {
                        while ($result = $category->fetch_assoc()) {
                            $query = "SELECT * FROM category";

                    // Récupérer toutes les catégories de la table category
                    // Tant que la catégorie est récupérée
                    //     Afficher la catégorie
                    ?>
                    <tr class="odd gradeX">
                        <td><?=$result['category_id']?></td>
                        <td><?=$result['name']?></td>
                        <td><a href="edit_category.php?catid=<?php echo $result['category_id']?>">Modifier</a>
                            || <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer?')" href="?delid=<?php echo $result['category_id'];?>">Supprimer</a></td>
                    </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();


    });
</script>

<?php
// Inclure le fichier footer.php
include 'includes/footer.php';
?>
