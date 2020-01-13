<?php
namespace App\Controllers;
use App\Controllers\Controller;
use Codefii\View\View;
use Codefii\Hash\Hash;
use App\Models\Users;
use Codefii\Http\Request;
class AccountController extends Controller{
    public  $response = array();
    public function index(){
            if(Request::exists()){
           
            $user = new Users();
            $salt = Hash::salt(30);
            $user_id = uniqid();
            $full_name  = htmlspecialchars(Request::get('name'));
            $email = htmlspecialchars(Request::get('email'));
            $password = htmlspecialchars(Request::get('password'));
            $realpassword = Hash::make($password,$salt);
           //find user 
           $findUser  = $user->findBy(['email'=>$email]);
           if($findUser){
                       $this->response = ['
                    status'=>0,
                    'msg'=>'User with email already exist'];
           }else{
               $user->create(array(
                $user_id,
                $full_name,
                $email,
                $salt,
                $realpassword
               ));
               if($user->isCreated()){
                   echo "<script>alert('registered');
                   window.location = '/login';
                   </script>";
                  
               }
           }
        
            
           

        }
     
           return $this->view('pages/register',['title'=>'Signup On Amdfood Deliveries']);

       
    }
   
    public function register(){   
       
           
    }
    
}