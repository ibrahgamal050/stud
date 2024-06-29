<?php
class Movie_detail extends Controller{
    public function index ($id=''){
      $DbHandler = $this->model('DbHandler',["getMovie",$id]) ;
      $this->view('clientSide/movie_detail',['movie' => $DbHandler->getMovie()]);
    }
}
