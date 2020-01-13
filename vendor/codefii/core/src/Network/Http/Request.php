<?php

// namespace Codefii\Http;
// class Request
// {
//   public static $method=array();

//   public static $POST = "POST";

//   public static $GET  = "GET";

//   public static $DELETE = "DELETE";

//   public static $PUT = "PUT";

//  public static function exists():String{

//    $method = self::getMethod();

//     if($method){

//       if($method==self::$POST){

//         self::$method = $_POST;

//       }else if($method==self::$GET){

//         self::$method = $_GET;

//       }else if($method==self::$DELETE || $method==self::$PUT){

//         self::getContents();

//         $GLOBALS["_{$method}"] = self::$method;

//         $_REQUEST = self::$method + $_REQUEST;

//       }
//     }
//     return $method;
//  }
//  public static function is(String $request=null):String{
//    if($request==self::$POST){

//      self::$method = $_POST;

//    } else if($request==self::$GET){

//      self::$method = $_GET;

//    }else if($request==self::$DELETE || self::$PUT){
//       self::getContents();
//         $GLOBALS["_{$request}"] = self::$method;

//         $_REQUEST = self::$method + $_REQUEST;
//    }
//    return $request;
//  }
//   public static function field(String $request):String{

//    if (isset(self::$method[$request])) {
    
//       return self::$method[$request];

//     }
//   }
//   public static function getMethod():String{
//     return $_SERVER['REQUEST_METHOD'];
//   }
//   public static function allField(){
//     $request = self::getMethod();

//     if($request==self::$POST){

//      return $_POST;

//    } else if($request==self::$GET){

//     return $_GET;

//    }else if($request==self::$DELETE || self::$PUT){
//         self::getContents();
//         $GLOBALS["_{$request}"] = self::$method;

//         $_REQUEST = self::$method + $_REQUEST;
//         return $_REQUEST;
//    }
//    return $request;
//   }
//   public static function getContents(){
//     return  parse_str(file_get_contents('php://input'), self::$method);
//   }
// }

namespace Codefii\Http;
use Codefii\Http\Input;
class Request
{
  protected static $fileName, $fileMoved=false;
  public static function exists($type='post')
  {
    switch($type){
      case 'post':
      return (!empty($_POST)) ? true :false;
      break;
      case 'get':
      return (!empty($_GET)) ? true :false;
      break;
      default:
      return false;
      break;

    }

  }
  public static function get($item)
  {
    if(isset($_POST[$item]))
    {
      return htmlentities(htmlspecialchars($_POST[$item]),ENT_QUOTES,'UTF-8');
    }else{
      return htmlentities(htmlspecialchars($_GET[$item]),ENT_QUOTES,'UTF-8');
    }
    return '';//return an empty string
  }
  public static function getParam($param = array()){
    return $param;
  }
  public static function getApi($api){
   if(isset($_GET[$api])){
    return $_GET[$api];
   }
  }
  public static function hasFile($name,$location){
    if(isset($_FILES[$name]['name']))
        self::$fileName  = $_FILES[$name]['name'];
    $fileTmploc = $_FILES[$name]['tmp_name'];
    $fileType = $_FILES[$name]['type'];
    $fileSize = $_FILES[$name]['size'];
    $fileErrorMsg = $_FILES[$name]['error'];
    if(move_uploaded_file($fileTmploc,"$location/{self::$fileName}")){
      self::$fileMoved = true;
    }
  }
  public static function getFileName(){
    return self::$fileName;
  }
  public static function fileIsMoved(){
    return self::$fileMoved;
  }
}
