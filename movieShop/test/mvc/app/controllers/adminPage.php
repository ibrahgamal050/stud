<?php
class AdminPage extends Controller {
    public function index (){
      if (!isset($_SESSION['auth'])) header("Location: /test/mvc/public/home");
      if($_SESSION['roll'] != 'admin') header("Location: /test/mvc/public/home");

      $movies = $this->model('DbHandler',["getAllMovies"]);
      
      $this->view('adminSide/adminPage' ,['movies' => $movies->getAllMovies()]);      
    }
}