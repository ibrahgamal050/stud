<!DOCTYPE html>

<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/head.php";?>
<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/clientHeader.php";?>

<body>
    <div class ="content">
        <div class="container">
            <h1>Contact Us Page</h1><br>
            <?php
                $contactUs =$data['contactUs'];
                echo ("<p>{$contactUs}</p>");
            ?>
        </div>
    </div>
</body>
<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/clientFooter.php";?>

</html>