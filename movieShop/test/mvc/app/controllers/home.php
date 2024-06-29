<?php
class Home extends Controller {
    public function index (){
      $movies = $this->model('DbHandler',["getAllMovies"]);
      $this->view('clientSide/home' ,['movies' => $movies->getAllMovies()]);
    }
}