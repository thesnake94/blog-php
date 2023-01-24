<?php
// Inclure le fichier header.php
include 'includes/header.php';
// Inclure le fichier sidebar.php
include 'includes/sidebar.php';
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Boite de réception
        <?php
        //                count unseen messages
        $query = "SELECT * FROM contact WHERE status ='0'";
        $message = $db->select($query);
        if ($message) {
            $count = mysqli_num_rows($message);
            echo "(" . $count . ")";
        } else {
            "(0)";
        }
        ?>
        </h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th width="5%">SL No</th>
                        <th width="12%">Nom</th>
                        <th width="18%">Subject</th>
                        <th width="20%">Email</th>
                        <th width="35%">Message</th>
                        <th width="10%">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $query = "SELECT * FROM contact";
                    $contact = $db->select($query);

                    if ($contact) {
                        while ($result = $contact->fetch_assoc()) {
                            $query = "SELECT * FROM contact";

                    // Récupérer les données de la table post
                    // Tant que les données sont récupérées
                    //     Afficher les données
                    ?>
                    <tr class="odd gradeX">
                        <td><?=$result['id']?></td>
                        <td><?=$result['name']?></td>
                        <td><?=$result['subject']?></td>
                        <td><?=$result['email']?></td>
                        <td><?=$result['message']?></td>
                        <td><?=$result['date']?></td>
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