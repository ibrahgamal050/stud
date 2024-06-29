<?php
class AddNewMovie extends Controller {
    public function index (){
      if (!isset($_SESSION['auth'])) header("Location: /test/mvc/public/home");
      if($_SESSION['roll'] != 'admin') header("Location: /test/mvc/public/home");

      $this->view('adminSide/addnewMovie');
    }
    public function save (){
      if (!isset($_SESSION['auth'])) header("Location: /test/mvc/public/home");
      if($_SESSION['roll'] != 'admin') header("Location: /test/mvc/public/home");
      
      $this->model('DbHandler',["addMovie"]) ;
      $this->view('adminSide/adminPage');
    }
}
