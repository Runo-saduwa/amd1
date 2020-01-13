<?php

$router = new Codefii\Http\Router();
$router->setNamespace('App\Controllers');
$router->get('/', 'Pages.index');
$router->get('/about', 'Pages.about');
$router->get('/contact', 'Pages.contact');
$router->get('/signin', 'Login.index');
$router->post('/signin', 'Login.index');
$router->get('/signup', 'Account.index');
$router->post('/signup', 'Account.index');
$router->post('/fetch_food', 'Pages.fetch_food');
$router->get('/single_view/{id}', 'Pages.single_view');
$router->post('/showdetails', 'User.showDetails');
$router->post('/orders','User.newOrder');
$router->post('/orders/payondelivery','User.orderOnDelivery');


//user routes 
$router->post('/fetch_food', 'Pages.fetch_food');
$router->get('/dashboard/home'  ,'User.home');
$router->get('/dashboard/orders', 'User.orders');
$router->get('/dashboard/profile', 'User.profile');
$router->get('/dashboard/address', 'User.address');
$router->post('/dashboard/address', 'User.address');
$router->get('/dashboard/logout', 'User.logout');

//end user routes 
$router->get('/amd_admin','Admin.index');
$router->post('/amd_admin', 'Admin.index');
$router->get('/amd_admin/home','Admin.home');
$router->get('/amd_admin/add_meals','Admin.add_meals');
$router->post('/amd_admin/add_meals', 'Admin.add_meals');
$router->get('/amd_admin/add_food_category', 'Admin.add_food_category');
$router->post('/amd_admin/add_food_category', 'Admin.add_food_category');
$router->get('/amd_admin/customers','Admin.customers');
$router->post('/amd_admin/customers', 'Admin.customers');
$router->get('/amd_admin/orders','Admin.orders');
$router->post('/amd_admin/orders', 'Admin.orders');
$router->get('/amd_admin/transactions','Admin.transactions');
$router->post('/amd_admin/transactions', 'Admin.transactions');
$router->get('/amd_admin/restaurants', 'Admin.restaurants');
$router->get('/amd_admin/restaurants/{id}', 'Admin.delet_rest');
$router->post('/amd_admin/home/foods_list','Admin.showFoods');
$router->get('/amd_admin/delete_user/{id}','Admin.delete_user');
$router->post('/amd_admin/suspend/{id}','Admin.suspend_user');
$router->get('/amd_admin/ekemini', 'Admin.ekemini');