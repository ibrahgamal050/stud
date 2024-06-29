<!DOCTYPE html>


<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/head.php";?>
<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/adminHeader.php";?>

<body >
    <div class ="content">
        <div class="container">
            <h1>Contact Us Page</h1><br>
            <?php  
            $contactUs =$data['contactUs'];
            echo "
                <form action ='/test/mvc/public/contact_us/save' method = 'POST'>
                    <label> desc : <textarea rows='15' cols='80' name='contactUs' required>{$contactUs}</textarea></label>
                    <label> <input class ='saveButton' type= 'submit' name = 'save' value ='save'/></label>
                </form>";
            ?>
        </div>
    </div>
</body>

<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/adminFooter.php";?>
</html>