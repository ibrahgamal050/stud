<!DOCTYPE html>

<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/head.php";?>
<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/adminHeader.php";?>

<body>
    <div class = "home">  
        
        <div class = addButtonContainer>
            <form action='/test/mvc/public/addNewMovie' method='POST'>
            <button class = 'addButton' name = 'addNewMovie'>add new Movie</button> </form>
        </div>  


        <div class="grid-container">
            <?php
            
            foreach($data['movies'] as $row) {
                    echo "
                    <div class='grid-item '>   
                    <a href='/test/mvc/public/editMovie/{$row->id}' target='new window' class = 'fullClick'></a>
                    <img src='/test/mvc/public/img/" . $row->image . "'/>
                    <span class='movie-price'> price <em>" . $row->price . "$</em></span>
                    <span class='basket'> <em><img src='/test/mvc/public/img/shopping-cart.png'></em></span>
                    <span class='movie-title'><em>" . $row->name . "</em></span></div>";
                }
            ?>
        </div>
    </div>
</body>
<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/adminFooter.php";?>
</html>