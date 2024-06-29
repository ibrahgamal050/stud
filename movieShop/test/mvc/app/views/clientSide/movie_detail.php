<!DOCTYPE html>

<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/head.php";?>
<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/clientHeader.php";?>

<body>
   
    <div class = "movieDetail">
        <div class="detail">
            <div class="detail-container">
                <?php
                $movie = $data['movie']; 
                $id = $movie->id;
                if ($id == null) header("Location: /test/mvc/public/home");
                echo ("
                    <div class='detail-item item1'>
                    <h3> {$movie->name}</h3>
                    </div>
                    <div class='detail-item item2'>
                        <img src='/test/mvc/public/img/{$movie->image}' />
                    </div>
                    <div class='detail-item item6'>
                        <h3>Imdb {$movie->rating}/10</h3>
                    </div>
                        <div class='detail-item item3'>
                    <p>
                        {$movie->description}
                    </p>
                    <ul>

                    </ul>
                    </div>
                    <div class='detail-item item4'>
                        <h3>price: {$movie->price}$</h3>
                    </div>
                    <div class='detail-item item5'>
                    <button> Add To Basket</button>
                    </div>");
                ?>
            </div>
        </div>
    </div>
</body>

<?php include "$_SERVER[DOCUMENT_ROOT]/test/mvc/app/templates/clientFooter.php";?>
</html>