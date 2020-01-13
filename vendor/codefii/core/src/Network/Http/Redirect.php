<?php
namespace Codefii\Http;
use Codefii\Http\HttpInterfaces\RedirectInterface;
final class Redirect implements RedirectInterface
{
  public static $header =  array(
		'Content-Type: text/html; charset=utf-8'
	);

  public static function addHeader(string $header){
    self::$header[] = $header;
  }
  public static function to(string $url,$error=[],int $status =302){
    if(!empty($error)){
      foreach($error as $x=>$value){
        header('Location: ' . str_replace(array('&amp;', "\n", "\r"), array('&', '', ''), $url . "?error=".$value), true, $status);

      }
   
    }else{
      header('Location: ' . str_replace(array('&amp;', "\n", "\r"), array('&', '', ''), $url), true, $status);
      exit();
    }
  
  }
  public static function back():string{
    return header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
  public static function getHeader(){
    return self::$header;
  }
}
