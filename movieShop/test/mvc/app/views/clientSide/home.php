<!DOCTYPE html>

<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/head.php";?>
<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/clientHeader.php";?>

<body >
    <div class = "home">
        <div class="grid-container">
            <?php
            foreach($data['movies'] as $row){
                    echo
                    "<div class='grid-item '>
                    <a href='/test/mvc/public/movie_detail/{$row->id}' target='new window' class = 'fullClick'></a>
                    <img src='/test/mvc/public/img/" . $row->image . "'/>
                    <span class='movie-price'> price <em>" . $row->price . "$</em></span>
                    <span class='basket'> <em><img src='/test/mvc/public/img/shopping-cart.png'></em></span>
                    <span class='movie-title'><em>" . $row->name . "</em></span></div>";
                }
            ?>
        </div>
    </div>
</body>

<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/clientFooter.php";?>

</html>