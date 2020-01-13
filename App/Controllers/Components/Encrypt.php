<?php
namespace App\Controllers\Components;
abstract class Encrypt {
    public static function Generate($length = 10) {
      $characters = '0xefb2c4F2474BCAb9091DEd5eb9eB63D9e18Aa7860123456789abcdefghijklmnopqrstuvwxyz5d48b98e859a8d0004fba402';
      $charactersLength = strlen($characters);
      $randomString = 'KUD-';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
  }

}
