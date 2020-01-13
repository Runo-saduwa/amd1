<?php
namespace Codefii\Entity\Auth;
use Codefii\Entity\Orm\Fiirm;
use Codefii\Hash\Hash;
use Codefii\Session\Session;
class FiiAuth extends Fiirm{
    public $_sessionName,
            $_loggedIn=false;
    public function login($email=null,$password=null){
        if(is_array($email)){
            if(count($email)==1){
                foreach($email as $key=>$value){
                $user = $this->findBy([$key=>$value]);
                 if($user){
                     if($user->password ==Hash::make($password,$user->salt)){

                          $this->_loggedIn =true;
                          $session = new Session();
                          $session->set($this->_sessionName,$user->email);
                          // var_dump("ididi");
                     }
                 }
             }
            }
         }
    }
    public function setSessionName($session){
        $this->_sessionName = $session;
    }
    public function getSessionName(){
        return $this->_sessionName;
    }
    public function isLoggedIn(){
             $session = new Session();
        if($session->exists($this->_sessionName)){
            return true;
        }else{
            return false;
        }
    }

  
}
