<?php
// Inclure le fichier header.php
include "includes/header.php";
// Inclure le fichier sidebar.php
//include "includes/sidebar.php";
?>

<?php
// Inclure la variable $db = new Database();
$db = new Database();


if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $del_postid = $_GET['del_postid'];

    if(isset($del_postid)){
        $del_postid = $_GET['del_postid'];

        $query="SELECT * FROM post";
        $post= $db->crate($query);

        while($post->fetch_assoc()){
            $query="SELECT * FROM post";

            $del_postid =$_GET['id'];
            $delete_id = "DELETE FROM post WHERE id = '$del_postid'";
            $delete_data = $db->delete($delete_id);

            if($delete_data){
                echo "<span style='color:green;font-size:18px;'>Post Suprimer</ span>";
                header('location:post_list.php');
            } else {
                echo "<span style='color:red;font-size:18px;'>Post Non Suprimer</ span>";
                header('location:post_list.php');
            }
        }
    } else {
        header('post_list.php');
    }
}



// Si la méthode de requête est GET
// Alors
//     Récupérer la valeur de del_postid
//     Si del_postid est vide
//         Alors
//             Rediriger vers post_list.php*
//     Sinon
//         Récupérer la valeur de delete_id
//         Récupérer les données de la table post
    //         Tant que les données sont récupérées
    //             Récupérer la valeur de image
//             Supprimer l'image
//         Supprimer les données de la table post
//         Si les données sont supprimées
    //             Alors
    //                 Afficher un message de succès
    //                 Rediriger vers post_list.php
//             Sinon
//                 Afficher un message d'erreur
//                 Rediriger vers post_list.php
?>
<?php
include "includes/footer.php";
?>
