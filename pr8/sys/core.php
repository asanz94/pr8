<?php


class Core{ 
  private static $conf;
    public static $controller;
    public static $params = array();

	public static function init(){
            $conf=Config::getIns();
            static::router();
      }

     public static function router(){
            $URI=explode('/',$_SERVER['REQUEST_URI']);
            //redirects Control to respective controller
            var_dump($URI);
            Request::retrieve();
            $route=Request::getCount();
            $accion=Request::getAction();      
            $fileroute=strtolower($route).'.php';
             echo "</br>".$accion."es la accion"."</br>";
             echo "</br>".$route."es el route"."</br>"; 
        if(is_file(APP."controller".DS.$fileroute)){
            $nombreClasse=ucfirst($route);
          echo $nombreClasse;
            self::$controller=new $nombreClasse(self::$params);
            return self::$controller->$accion();
                 }else{
                  self::$controller=new error;
                  self::$controller->$accion();
                 }
	}
}