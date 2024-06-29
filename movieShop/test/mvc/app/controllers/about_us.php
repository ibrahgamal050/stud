<?php
class About_us extends Controller {
    public function index (){
     // $aboutUs = $this->model('GetAboutUs') ;
      $aboutUs = $this->model('DbHandler',["getAboutUs"]) ;
      $this->view('clientSide/about_us',['aboutUs' => $aboutUs->getAboutUs()]);
    }
    public function admin (){
      if (!isset($_SESSION['auth'])) header("Location: /test/mvc/public/home");
      if($_SESSION['roll'] != 'admin') header("Location: /test/mvc/public/home");

      $aboutUs = $this->model('DbHandler',["getAboutUs"]) ;
      $this->view('adminSide/about_us_admin',['aboutUs' => $aboutUs->getAboutUs()]);
    } 
    public function save (){
      if (!isset($_SESSION['auth'])) header("Location: /test/mvc/public/home");
      if($_SESSION['roll'] != 'admin') header("Location: /test/mvc/public/home");

      $aboutUs = $this->model('DbHandler',["updateAboutUs"]) ;
      $this->view('adminSide/about_us_admin');
    }
}
