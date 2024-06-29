<?php
class DbHandler {
    private $movies = [];
    private $aboutUs;
    private $contactUs;
    private $movie ;
    private function movie($id){
        global $dbc;
        $query = " SELECT * FROM movies WHERE id ='{$id}'";
        $response = @mysqli_query($dbc, $query);
        if ($response) {
            while ($row = mysqli_fetch_assoc($response)) {
                $movie = new Movie();
                $movie->id =$row['id'];
                $movie->name =$row['name'] ;
                $movie->description =$row['description'];
                $movie->image = $row['image'];
                $movie->rating =$row['rating'];
                $movie->price =$row['price'];
                $this->movie= $movie;
            
            }
        }
    }
    public function getMovie(){
        return $this->movie;
    }

    private function deleteMovie($id){
        global $dbc ;
        $query = " DELETE FROM movies WHERE id ='{$id}'";
        if (mysqli_query($dbc, $query)) {
        header("Location: /test/mvc/public/adminPage");
        } else {
        echo "Error: " . $query . "<br>" . mysqli_error($dbc);
        }
    }
    private function AboutUs(){
        $id = 'aboutUs';
        global $dbc;
        $query = " SELECT * FROM content WHERE id ='{$id}'";
        $response = @mysqli_query($dbc, $query);
        if ($response) {
            while ($row = mysqli_fetch_assoc($response)) {
                $this->aboutUs = $row['description'];
            }
        }
    }
    public function getAboutUs(){
       return $this->aboutUs;
    }
    private function addMovie(){    
        global $dbc;     
        $_name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $image = $_POST["image"];
        $rating = $_POST["rating"];
        //add new movie
        $sql = "INSERT INTO movies ( name, description, price, image, rating )
                VALUES ('{$_name}','{$description}','{$price}','{$image}','{$rating}')";
        if (mysqli_query($dbc, $sql)) {
                    header("Location: /test/mvc/public/adminPage");
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($dbc);

        }
   }
    private function AllMovies(){
        global $dbc;
        $query = ("SELECT * FROM movies");
        $response = @mysqli_query($dbc, $query);
        if ($response) {
            $i =0;
            while ($row = mysqli_fetch_assoc($response)) {
                $movie = new Movie();
                $movie->id =$row['id'];
                $movie->name =$row['name'] ;
                $movie->description =$row['description'];
                $movie->image = $row['image'];
                $movie->rating =$row['rating'];
                $movie->price =$row['price'];
                $this->movies[$i]= $movie;
                $i++;
            }
        } else {
            echo ("CANN'T GET DATA FROM SQL SERVER");
            echo mysqli_error(($dbc));
        }
        mysqli_close($dbc);
    }
    public function getAllMovies(){
       return $this->movies;
    }
    private function ContactUs(){
        $id = 'contactUs';

        global $dbc;
        $query = " SELECT * FROM content  WHERE id ='{$id}'";
            $response = @mysqli_query($dbc, $query);
            if ($response) {
                while ($row = mysqli_fetch_assoc($response)) {
                    $this->contactUs = $row['description'];
                }
            } else {
                echo ("CANN'T GET DATA FROM SQL SERVER");
                echo mysqli_error(($dbc));
            }
    }
    public function getContactUs(){
       return $this->contactUs;
    }
    private function updateAboutUs(){
        global $dbc;
        $id = 'aboutUs';
        $aboutUs = $_POST['aboutUs'];
        $sql = "UPDATE content SET description = '{$aboutUs}' WHERE id ='{$id}'";
    
        if (mysqli_query($dbc, $sql)) {
            header("Location: /test/mvc/public/about_us/admin");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbc);
        }
    }
    private function updateContactUs(){
        global $dbc;
        $contactUs = $_POST['contactUs'];
        $id = 'contactUs';
        $sql = "UPDATE content SET description = '{$contactUs}' WHERE id ='{$id}'";

        if (mysqli_query($dbc, $sql)) {
            header("Location: /test/mvc/public/contact_us/admin");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbc);
        }
        
    }
    private function updateMovie ($movie){
        global $dbc;
        $movie->setName($_POST["name"]);
        $movie->setDescription($_POST["description"]);
        $movie->setPrice($_POST["price"]);
        if($_POST["image"] != null) $movie->setImage($_POST["image"]);  
        $movie->setRating($_POST["rating"]);
        //add new movie
        $sql = "UPDATE movies
                SET name = '{$movie->getName()}', description = '{$movie->getDescription()}' , price ='{$movie->getPrice()}', image = '{$movie->getImage()}', rating='{$movie->getRating()}' Where id = {$movie->getId()}";

        if (mysqli_query($dbc, $sql)) {
            header("Location: /test/mvc/public/adminPage");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbc);
        }
}

private function userExist(){
    global $dbc ;
    $username = $_POST["username"];
    $password = $_POST["password"];
    $roll = '';
    $found = false;
    $query = " SELECT * FROM users WHERE username ='{$username}'";
    $response = @mysqli_query($dbc, $query);
    if ($response) {
        while ($row = mysqli_fetch_assoc($response)) {
            if ($password == $row['password']) {
                $roll = $row['roll'];
                $found = true;
                break;
            }
        }
    }
    if ($found) {
        session_start();
        $_SESSION['auth'] = true;
        $_SESSION['roll'] = $roll;
        if($roll == 'admin')  header("Location: /test/mvc/public/adminPage");
        else header("Location: /test/mvc/public/home");
        die();
        
    } else  {
        header("Location: /test/mvc/public/login");
    }
}
private function addUser(){
    global $dbc;
    $username = $_POST["username"];
    $password = $_POST["password"];
    $rePassword = $_POST["Repassword"];
    $found = false;

    $query = " SELECT username FROM users WHERE username ='{$username}'";
    $response = @mysqli_query($dbc, $query);
    if ($response) {
        while ($row = mysqli_fetch_assoc($response)) {
            $found = true;
        }
    }

    //add new user
    if ($password == $rePassword) {
        if (!$found) {
            $sql = "INSERT INTO users (username , password)
                            VALUES ('{$username}', '{$password}')";
            if (mysqli_query($dbc, $sql)) {
                header("Location: /test/mvc/public/login");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($dbc);
            }
        } else  echo "<script>alert('username already exist')</script>";
    } else  echo "<script>alert('rePassword not matching with password')</script>";
}
    public function __construct($params)
    {
        //[0] => status # [1] => param
        if($params[0]=="getMovie") $this->movie($params[1]);
        else if ($params[0] == "getAllMovies") $this->AllMovies();
        else if ($params[0] == "addMovie") $this->addMovie();
        else if ($params[0] == "updateMovie") $this->updateMovie($params[1]);
        else if ($params[0] == "deleteMovie") $this->deleteMovie($params[1]);
        else if ($params[0] == "getAboutUs") $this->AboutUs();
        else if ($params[0] == "updateAboutUs") $this->updateAboutUs();
        else if ($params[0] == "getContactUs") $this->ContactUs();
        else if ($params[0] == "updateContactUs") $this->updateContactUs();
        else if ($params[0] == "userExist") $this->userExist();
        else if ($params[0] == "addUser") $this->addUser();
    }
}