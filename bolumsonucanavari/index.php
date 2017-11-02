<?php ob_start();
include("veritabani.php");
session_start();
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>BSC</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <div id="container">
            <?php   include("header.php");
                    include("content.php");
                    include("footer.php");
            ?>
        </div>
    </body>
</html>
<?php ob_end_flush();?>