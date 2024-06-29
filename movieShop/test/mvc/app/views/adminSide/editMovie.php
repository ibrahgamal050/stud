<!DOCTYPE html>

<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/head.php";?>
<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/adminHeader.php";?>


<body>
  
    <div class = "editMovie">
        <?php
            $movie = $data['movie'];
            if ($movie->id == null) header("Location: /test/mvc/public/adminPage");

            echo "<div class = deleteButtonContainer>
                    <form action='/test/mvc/public/editMovie/delete/{$movie->id}' method='POST'>
                    <button class = 'deleteButton' name = 'deleteMovie'>delete Movie</button> </form>  </div>
                    <div class='container'>

                    <form action='/test/mvc/public/editMovie/save/{$movie->id}/{$movie->image}' name ='foo' method='POST'>
                        <label>Name: <input type='text' id='name' name='name' value='{$movie->name}'required></label>
                        <label>description: <textarea rows='15' cols='80' name='description'  required>{$movie->description}</textarea></label>
                        <label>price: <input type='text' id='price' name='price' value ='{$movie->price}' required></label>
                        <label>rating: <input type='text' id='rating' name='rating'value = '{$movie->rating}' required></label>
                        <label>image: <input type='file' id='iamge' name='image'  value = '{$movie->image}'  accept='image/*'></label>
                        <label><input class='saveButton' type='submit' name='save' value='Save'></label>
                    </form>
                    </div>
                    ";
            
        ?>
    </div>
</body>
<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/adminFooter.php";?>

</html>