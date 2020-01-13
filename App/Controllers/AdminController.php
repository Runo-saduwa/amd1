<?php
namespace App\Controllers;
use App\Controllers\Controller;
use Codefii\View\View;
use Codefii\Hash\Hash;
use App\Models\Admin;
use App\Models\Food;
use App\Models\Food_Items;
use App\Models\Users;
use App\Models\Orders;
use Codefii\Session\Session;
use Codefii\Http\Request;
use Codefii\Http\Redirect;
class AdminController extends Controller{
    public  $response = array();
    public function index(){
        $admin = new Admin();
        // $hash = Hash::salt(30);
        // $password  =  Hash::make("prince",$hash);
        // $admin->create(array(
        //     "ekeminyd@gmail.com",
        //     $hash,
        //     $password
        // ));
        if(Request::exists()){
            $admin->login(['email' =>Request::get('email')],Request::get('password'));
            if($admin->isLoggedIn()){
                $session = new Session();
                $session->set('admin',Request::get('email'));
                Redirect::to('/amd_admin/home');
            }
        }
  
           return $this->view('admin/login',['title'=>'Admin Login'],'admin_login_base');

       
    }
   public function home() {
       $session = new Session();
       if($session->exists('admin')){
            return $this->view('admin/index', ['title' => 'Admin Home'], 'admin_base');
       }else{
           Redirect::to('/amd_admin');
       }
     

   }
   public function add_meals(){
        $session = new Session();
        if ($session->exists('admin')) {
            $restaurants  = new Food_Items();
            $restLists = $restaurants->findAll();
            if(Request::exists()){
                $food  = new Food();
                if (isset($_FILES['food_image']['name'])) {
                    $fileName = $_FILES['food_image']['name'];
                    $fileTmploc = $_FILES['food_image']['tmp_name'];
                    $fileType = $_FILES['food_image']['type'];
                    $fileSize = $_FILES['food_image']['size'];
                    $fileErrorMsg = $_FILES['food_image']['error'];
                    if (move_uploaded_file($fileTmploc, getcwd() . "/web/uploads/$fileName")) {
                        $food->create(array(
                            Request::get('restaurant'),
                            Request::get('food_name'),
                           
                            Request::get('description'),
                             Request::get('price'),
                            $fileName 
                        ));
                        if ($food) {
                            echo "<script>alert('Food added successfully');
                            
                            window.location = '/amd_admin/home';
                            </script>";
                        }
                     
                    }
                }
               
            }
           
        return $this->view('admin/add_meals', ['title' => 'Add meals','lists'=>$restLists], 'admin_base');
        } else {
            Redirect::to('/amd_admin');
        }
   }
    public function orders()
    {
        $session = new Session();
        if ($session->exists('admin')) {
            $orders = new Orders();
            $myorders  = $orders->query("SELECT * FROM orders LEFT JOIN food ON orders.rev_id = food.food_id LEFT JOIN contact on orders.order_by = contact.user_id WHERE 1");
        return $this->view('admin/orders', ['title' => 'All Orders','orders'=>$myorders], 'admin_base');
        } else {
            Redirect::to('/amd_admin');
        }
    }
    public function customers()
    {
         $session = new Session();
        if ($session->exists('admin')) {
            $user = new Users();
            $allUsers = $user->findAll();
            if(isset($_GET['suspend'])){
                $user = new Users();
        $findUser = $user->findById($_GET['suspend']);
        if ($findUser) {
            $user->update(['id' => $_GET['suspend'], 'status' => 'suspended']);
            if ($user) {
                echo "<script>alert('user suspended');
                
                window.location= '/amd_admin/customers';</script>";
            }
        }
            }
        return $this->view('admin/customers', ['title' => 'My customers','customers'=>$allUsers], 'admin_base');
        } else {
            Redirect::to('/amd_admin');
        }
    }
    public function transactions()
    {
        $session = new Session();
        if ($session->exists('admin')) {
        return $this->view('admin/transactions', ['title' => 'Transactions'], 'admin_base');
         } else {
            Redirect::to('/amd_admin');
        }
    }
    public function add_food_category(){
        $session = new Session();
        if ($session->exists('admin')) {
            if (isset($_FILES['food_image']['name'])) {
                $fileName = $_FILES['food_image']['name'];
                $fileTmploc = $_FILES['food_image']['tmp_name'];
                $fileType = $_FILES['food_image']['type'];
                $fileSize = $_FILES['food_image']['size'];
                $fileErrorMsg = $_FILES['food_image']['error'];
                if (move_uploaded_file($fileTmploc, getcwd() . "/web/uploads/$fileName")) {
                 $foodItem = new Food_Items();
                 $foodItem->create(array(
                    $fileName,
                    Request::get("restaurant"),
                    1,
                    Request::get("time"),
                    Request::get("state"),
                    Request::get("city"),
                        Request::get("location"),
                 ));
                 if($foodItem->isCreated()){
                     
                   
                            echo "<script>alert('Food added successfully');
                            
                            window.location = '/amd_admin/add_food_category';
                            </script>";
                        
                     $this->response = array(
                        "success"=>"Restaurant addedd successfully!"
                     );
                 }
                }
            }
        return $this->view('admin/category', ['title' => 'Add Food Category'], 'admin_base');
        } else {
            Redirect::to('/amd_admin');
        }

    }

    public function restaurants()
    {
        $session = new Session();
        if ($session->exists('admin')) {
            $restaurants  = new Food_Items();
            $restLists = $restaurants->findAll();
           
            return $this->view('admin/restaurants', ['title' => 'Transactions','restaurants'=>$restLists], 'admin_base');
        } else {
            Redirect::to('/amd_admin');
        }
    }
    public function delet_rest($id){
        $restaurants  = new Food_Items();
        $restaurants->delete(['item_id'=>$id]);
        if($restaurants){
            Redirect::back();
        }

    }
    public function suspend_user($id)
    
    {
        // var_dump($id);
        $user = new Users();
        $findUser = $user->findById($id);
        if ($findUser) {
            $user->update(['id' => $id, 'status' => 'suspended']);
            if ($user) {
                Redirect::back();
            }
        }
    }

    public function delete_user($id)
    {
        $user = new Users();
        $findUser = $user->findById($id);
        if ($findUser) {
        $user->delete(['id' => $id]);
            if ($user) {
                Redirect::back();
            }
        }
    }
    public function showFoods(){
        $food = new Food();
        $queryFood = $food->query("SELECT * FROM food LEFT JOIN food_items ON food.food_id = food_item.item_id WHERE 1");
        echo json_encode($queryFood);
    }

    
}