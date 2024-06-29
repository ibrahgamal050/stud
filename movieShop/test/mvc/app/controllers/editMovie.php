<?php

class EditMovie extends Controller {
    public function index ($id=''){
      if (!isset($_SESSION['auth'])) header("Location: /test/mvc/public/home");
      if($_SESSION['roll'] != 'admin') header("Location: /test/mvc/public/home");

      $movie = $this->model('DbHandler',["getMovie",$id]);
      $this->view('adminSide/editMovie' ,['movie' => $movie->getMovie()]);
    }

    public function save ($id='',$image=''){
      if (!isset($_SESSION['auth'])) header("Location: /test/mvc/public/home");
      if($_SESSION['roll'] != 'admin') header("Location: /test/mvc/public/home");
  
      $movie = $this->model('Movie');
      $movie->setId($id);
      $movie->setImage($image);
      $movie = $this->model('DbHandler',["updateMovie",$movie]);
      $this->view('adminSide/adminPage');
    }  

    public function delete ($id=''){
      if (!isset($_SESSION['auth'])) header("Location: /test/mvc/public/home");
      if($_SESSION['roll'] != 'admin') header("Location: /test/mvc/public/home");
  
      $this->model('DbHandler',["deleteMovie",$id]);      
      $this->view('adminSide/adminPage' );
    }
}