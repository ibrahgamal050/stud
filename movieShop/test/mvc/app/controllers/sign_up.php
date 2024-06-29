<?php
class Sign_Up extends Controller{
    public function index (){
      if (isset($_SESSION['auth'])&& $_SESSION['roll'] != 'admin') header("Location: /test/mvc/public/home");
      if (isset($_SESSION['auth'])&& $_SESSION['roll'] == 'admin') header("Location: /test/mvc/public/adminPage");

        $this->view('clientSide/sign_up');
      }

      public function save (){
        if (isset($_SESSION['auth'])&& $_SESSION['roll'] != 'admin') header("Location: /test/mvc/public/home");
        if (isset($_SESSION['auth'])&& $_SESSION['roll'] == 'admin') header("Location: /test/mvc/public/adminPage");

        $this->model('DbHandler',["addUser"]);
    }
}
