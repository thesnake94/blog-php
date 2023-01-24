<?php include "config/config.php" ?>
<?php include "db/Database.php" ?>
<?php include "classes/format.php" ?>

<?php
$db = new Database();
$format = new Format();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!--===== Meta Tag =====-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Runaway - Personal Portfolio HTML Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="business, agency, blog, cv, creative, html, one page, personal, portfolio, resume, responsive, bootstrap, photography, designer, developer">
    <meta name="author" content="root">

    <!--	Css Links
   ==================================================-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon.css">
    <link rel="stylesheet" href="css/plugins.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css" id="color-change">

    <!-- Favicon
   ==================================================-->
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.ico">

    <!--	Title
  ==================================================-->
    <title>PHP Blog</title>

</head>

<body id="top" class="page-load">
    <!--	Start Back to top
=================================================-->
    <a href="#" id="scroll" style="display: none;"><span></span></a>
    <!--    End Back to top
==================================================-->


    <!-- Wrapper Start
==================================================-->
    <div id="page_wrapper">
        <div class="row">
            <!-- Start Nav Menu
        ==============================================-->
            <header class="main_nav">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light w-100">
                        <!--               For show blog title  & logo from database-->
                        <?php
                        $query = "SELECT * FROM title WHERE id='1'";
                        $title = $db->select($query);
                        if ($title) {
                            while ($result = $title->fetch_assoc()) {

                        ?>
                                <a class="navbar-brand p_0" href="index.php#top"><img class="nav-logo" src="admin/<?php echo $result['logo'] ?>" style="height: 50px; width: 60px;" alt="logo"> <span><?php echo $result['title'] ?></span></a>
                        <?php }
                        } ?>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                                <li class="nav-item"><a class="nav-link" href="../../Blog_soutenance/admin/login.php">Connexion</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>
            <!-- End Nav Menu