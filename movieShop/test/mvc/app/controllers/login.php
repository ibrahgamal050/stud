<?php
class Login extends Controller {
    public function index (){
      if (isset($_SESSION['auth'])&& $_SESSION['roll'] != 'admin') header("Location: /test/mvc/public/home");
      if (isset($_SESSION['auth'])&& $_SESSION['roll'] == 'admin') header("Location: /test/mvc/public/adminPage");

      $this->view('clientSide/login');
    }
    public function login (){
      if (isset($_SESSION['auth'])&& $_SESSION['roll'] != 'admin') header("Location: /test/mvc/public/home");
      if (isset($_SESSION['auth'])&& $_SESSION['roll'] == 'admin') header("Location: /test/mvc/public/adminPage");

      $this->model('DbHandler',["userExist"]);
  }
}
