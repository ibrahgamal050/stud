<!DOCTYPE html>

<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/head.php";?>
<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/adminHeader.php";?>

<body>
    <div class = "addNewMovie">    
        <div class='container'>

            <form action='/test/mvc/public/addNewMovie/save' method='POST'>
                <label>Name: <input type="text" id="name" name="name" required></label>
                <label>description: <textarea rows="15" cols="80" name="description" required> </textarea></label>
                <label>price: <input type="text" id="price" name="price"  required></label>
                <label>rating: <input type="text" id="rating" name="rating"  required></label>
                <label>image: <input type="file" id="iamge" name="image" accept="image/*" required></label>
                <label><input class="saveButton" type="submit" name="save" value="Save"></label>
            </form>
        </div>
    </div>
</body>

<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/adminFooter.php";?>

</html>