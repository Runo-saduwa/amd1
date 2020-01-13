<?php
namespace App\Controllers;
use App\Controllers\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\Food_Items;
use App\Models\Food;
use Codefii\Session\Session;
class PagesController extends Controller{
    public  $isLogged = false;
    public function index(){
       
           
        $session = new Session();
        if($session->exists('user')){
            $this->isLogged = true;
        }else{
             $this->isLogged = false;
        }
        ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
        $food = new Food();
        $listItems = $food->query("SELECT * FROM food_items LEFT JOIN food ON food_items.item_id = food.rest_id  WHERE 1");

        return $this->view('pages/landing-page',['title'=>'Amd food deliveries','foods'=>$listItems,'logs'=>$this->isLogged]);
    }

    public function about(){
        
           
        $session = new Session();
        if($session->exists('user')){
            $this->isLogged = true;
        }else{
             $this->isLogged = false;
        }
        return $this->view('pages/about',['title'=>'About Us | Amdfood Deliveries','page'=>'x','logs'=>$this->isLogged]);

    }
      public function contact(){
          
        $session = new Session();
        if($session->exists('user')){
            $this->isLogged = true;
        }else{
             $this->isLogged = false;
        }
        return $this->view('pages/contact',['title'=>'Contact Us | Amdfood Deliveries','page'=>'x','logs'=>$this->isLogged]);

    }
    
    public function single_view($id){
           
        $session = new Session();
        if($session->exists('user')){
            $this->isLogged = true;
        }else{
             $this->isLogged = false;
        }
           ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
        $food_items = new Food_Items();
        $findFood =  $food_items->findBy(['item_id'=>$id]);
        $foods = new Food();
        
        $find_food =  $foods->query("SELECT * FROM food WHERE rest_id =$id");
          return $this->view('pages/single-post',['title'=>'Single View | Amdfood Deliveries','page'=>'x','shop'=>$findFood,'foods'=>$find_food,'logs'=>$this->isLogged]);
    }
    public function fetch_food()
    {
        header("Content-type:application/json");
        $id = $_POST['id'];
        $food = new Food();
        $listItems = $food->query("SELECT * FROM food LEFT JOIN food_items ON food.rest_id = food_items.item_id WHERE food_id = '$id'");
        echo json_encode($listItems);
    }

}