<!DOCTYPE html>
<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/head.php";?>
<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/clientHeader.php";?>


<body >
    <div class ="content">
        <div class="container" >
            <h1>About Us Page</h1><br>
        <?php
        $aboutUs= $data['aboutUs'];
            echo ("<p>{$aboutUs}</p>");
        ?>
        </div>
    </div>
</body>

<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/clientFooter.php";?>

</html>