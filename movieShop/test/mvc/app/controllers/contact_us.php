<?php
class Contact_us extends Controller {

    public function index (){
      $contactUs = $this->model('DbHandler',["getContactUs"]) ;

      $this->view('clientSide/contact_us',['contactUs'=> $contactUs->getContactUs()]);
    }

    public function admin (){
      if (!isset($_SESSION['auth'])) header("Location: /test/mvc/public/home");
      if($_SESSION['roll'] != 'admin') header("Location: /test/mvc/public/home");

      $contactUs = $this->model('DbHandler',["getContactUs"]) ;
      $this->view('adminSide/contact_us_admin',['contactUs'=> $contactUs->getContactUs()]);
    }

    public function save (){
      if (!isset($_SESSION['auth'])) header("Location: /test/mvc/public/home");
      if($_SESSION['roll'] != 'admin') header("Location: /test/mvc/public/home");

      $this->model('DbHandler',["updateContactUs"]) ;
      $this->view('adminSide/contact_us_admin');
  }
}
