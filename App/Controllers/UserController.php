<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Account;
use App\Models\Invest;
use App\Models\Transactions;
use App\Models\Users;
use App\Models\Orders;
use App\Models\Contact;

use Codefii\{
    Session\Session,
    Http\Redirect,
    Http\Request,
    Hash\Hash
};

class UserController extends Controller
{
    public $response = array();
    public $errors = array();
    public function home()
    {
        ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
       $session = new Session();
        if($session->exists('user')){
           
           $orders = new Orders();
            $email = $session->get('user');
            $myorders  = $orders->query("SELECT * FROM orders LEFT JOIN food ON orders.rev_id  = food.food_id WHERE orders.order_by='$email'");
             $contact = new Contact();
            $findContact =  $contact->findBy(['user_id'=>$email]);
           
           
        return $this->view('user/index', ['title' => 'Login','orders'=>$myorders,'contact'=>$findContact], 'dashboard');
   
        }else{
        Redirect::to('/signin');
        }
    }

     public function orders()
    {
         $session = new Session();
        if($session->exists('user')){
           $orders = new Orders();
            $email = $session->get('user');
            $myorders  = $orders->query("SELECT * FROM orders LEFT JOIN food ON orders.rev_id  = food.food_id WHERE orders.order_by='$email'");
           
        return $this->view('user/orders', ['title' => 'Login','orders'=>$myorders], 'dashboard');
   
        }else{
        Redirect::to('/signin');
        }
    
    }
  
  public function profile()
    {
         $session = new Session();
        if($session->exists('user')){
           $user = new Users();
            $email = $session->get('user');
            $findUser = $user->findBy(['email'=>$email]);
          
            
        return $this->view('user/profile', ['title' => 'My Profile','profile'=>$findUser], 'dashboard');
   
        }else{
        Redirect::to('/signin');
        }
       
    }
    public function address(){
           $session = new Session();
        if($session->exists('user')){
           $user = new Users();
            $email = $session->get('user');
            $findUser = $user->findBy(['email'=>$email]);
            $contact = new Contact();
            if(Request::exists()){
                $contact->create(array(
                    $email,
                    Request::get('address'),
                    Request::get('phone')
                    ));
                    if($contact){
                        echo "<script>alert('Address updated');
                        
                        window.location='/dashboard/home'</script>";
                    }
            }
            
        return $this->view('user/address', ['title' => 'Delivery Address'], 'dashboard');
   
        }else{
        Redirect::to('/signin');
        }
    }
    
    public function newOrder(){
         $session = new Session();
        if($session->exists('user')){
             $email = $session->get('user');
             $order  = new Orders();
            foreach($_POST as $key){
                 $order->create(array(
                    $key['order_id'],
                    $session->get('user'),
                    1,
                    $key['quantity'],'online'
                ));
                if($order){
                    echo json_encode(array("status"=>200));
                }

            }

        }
    }
    
      public function orderOnDelivery(){
           $session = new Session();
        if($session->exists('user')){
             $email = $session->get('user');
             $order  = new Orders();
            foreach($_POST as $key){
                 $order->create(array(
                    $key['order_id'],
                    $session->get('user'),
                    1,
                    $key['quantity'],'payment on delivery'
                ));
                if($order){
                    echo json_encode(array("status"=>200));
                }

            }

        }
    }

public function showDetails(){
    $session = new Session();
        if($session->exists('user')){
            $user = new Users();
            $email = $session->get('user');
            $findUser = $user->findBy(['email'=>$email]);
            echo json_encode($findUser);
        }
}
  

   public function logout(){
       $session  = new Session();
       $session->destroy();
       Redirect::to('/');

    }
}
