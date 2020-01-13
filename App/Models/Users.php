<?php
namespace App\Models;
use Codefii\Entity\auth\FiiAuth;
class Users extends FiiAuth {
    public $pk = 'id';
    public $columns = array(
        'user_id','full_name','email','salt','password'
    );
}