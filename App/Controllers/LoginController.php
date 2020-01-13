<?php
namespace App\Controllers;
use App\Controllers\Controller;
use Codefii\View\View;
use App\Models\Users;
use Codefii\Http\Redirect;
use Codefii\Http\Request;
use Codefii\Session\Session;
use Codefii\Hash\Hash;
use App\Controllers\Component\Mailer;
class LoginController extends Controller{
    public $response = array();
    public function index(){
       
            if(Request::exists()){
            $email = Request::get('email');
            $password = Request::get('password');
            $user = new Users();
            $user->login(['email'=>$email],$password);
            $finduser = $user->findBy(['email'=>$email]);
                if($user->isLoggedIn()){
                $session =  new Session();
                $session->set('user',$email);
                Redirect::to('/dashboard/home');
               
                }else{
                    echo "<script>alert('Invalid login details');</script>";
           
                }
            
      
           }
     
           return $this->view('pages/login',['title'=>'Amd food deliveries | Login']);


    }
    public function loginUser(){
        header("Access-Control-Allow-Origin: *");
           header('Content-Type','application/json');
           
    }
   
}