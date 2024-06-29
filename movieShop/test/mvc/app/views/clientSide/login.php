<!DOCTYPE html>
<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/head.php";?>
<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/clientHeader.php";?>

<body>
    <div class ="register">
        <div class="reg-container">
            <form action="/test/mvc/public/login/login" method="post">
                <a><input type="text" placeholder="UserName" name="username" required></a><br>
                <a><input type="password" placeholder="Password" name="password" required></a><br>
                <a><button type="submit" name="submit">Login</a>
            </form>

        </div>
    </div>
</body>

<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/clientFooter.php";?>

</html>
