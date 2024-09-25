<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php
            include("./pages/head.php");
        ?>
    </head>
    <body>
        <!--====== Start Preloader ======-->
           
        <!--====== End Preloader ======-->
        <!--====== Start Header ======-->
        <header class="header-area header-area-v1">
            <?php
                include("./pages/headertop.php");
                include("./pages/nav.php");
            ?>
        </header><!--====== End Header ======-->
            <?php
                include("./pages/content.php");
            ?>
        <!--====== Start Footer ======-->
            <?php
                include("./pages/footer.php");
            ?>
        <!--====== End Footer ======-->
        <!--====== back-to-top ======-->
        <a href="#" class="back-to-top" ><i class="flaticon-up-arrow-angle"></i></a>
        <?php
                include("./pages/js.php");
        ?>
    </body>
</html>