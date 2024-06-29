<?php
class Controller
{
    public function model ($model,$param=[]){
        require_once ('../app/models/'. $model .'.php');
        return new $model($param);
    }
    public function view ($view ,$data=[]){
        global $dbc;
        require_once ('../app/views/'.$view.'.php');
    }
}