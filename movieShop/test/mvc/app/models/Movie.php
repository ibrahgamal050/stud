<?php
class Movie {
   public $id ;
    public $name;
   public $description;
   public $price;
   public $image;
   public $rating;

public function setName($name){
    $this->name =$name;
}
public function setId($id){
    $this->id =$id;
}
public function setDescription($description){
    $this->description =$description;
}
public function setPrice($price){
    $this->price =$price;
}

public function setImage($image){
    $this->image =$image;
}


public function setRating($rating){
    $this->rating =$rating;
}

public function getImage(){
    return $this->image;
 }
 public function getName(){
    return $this->name;
}
public function getPrice(){
    return $this->price;
}

public function getId(){
    return $this->id;
}
public function getRating(){
    return $this->rating;
 }
 public function getDescription(){
    return $this->description;
 }
 

    /**
     * @param mixed $id 
     * @param mixed $name 
     * @param mixed $description 
     * @param mixed $price 
     * @param mixed $image 
     * @param mixed $rating 
     */
 
    public function __construct() {
    }
       
}