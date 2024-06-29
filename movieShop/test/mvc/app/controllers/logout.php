<?php
class Logout extends Controller{
    public function index (){
        if (!isset($_SESSION['auth'])) header("Location: /test/mvc/public/home");
        $this->view('clientSide/logout');
    }
}
