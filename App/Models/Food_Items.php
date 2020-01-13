<?php
namespace App\Models;
use Codefii\Entity\orm\Fiirm;
use Codefii\Entity\auth\FiiAuth;
class Food_Items extends FiiAuth {
    public $pk = 'item_id';
    public $table = "food_items";
    public $columns = array(
        'coverImage','restaurant','featured','time','state','city','location'
    );
    
}