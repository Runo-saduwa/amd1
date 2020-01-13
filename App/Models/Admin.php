<?php
namespace App\Models;
use Codefii\Entity\auth\FiiAuth;
class Admin extends FiiAuth {
    public $pk = 'id';
    public $columns = array(
        'email','salt','password'
    );
}