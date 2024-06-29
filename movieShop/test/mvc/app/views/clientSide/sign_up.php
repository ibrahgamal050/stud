<!DOCTYPE html>

<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/head.php";?>
<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/clientHeader.php";?>

<body>
  

    <div class ="register">
        <div class="reg-container">
            <form action="/test/mvc/public/sign_up/save" method="POST">
                <input type="text" placeholder="UserName" name="username" required>
                <input type="password" placeholder="Password" name="password" required>
                <input type="password" placeholder="RePassword" name="Repassword" required>
                <button type="submit" name="submit">SignUp</button>
            </form>
        </div>
    </div>   
</body>
<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/clientFooter.php";?>

</html>