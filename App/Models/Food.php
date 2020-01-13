<?php
namespace App\Models;
use Codefii\Entity\orm\Fiirm;
class Food extends Fiirm {
    public $pk = 'food_id';
    public $columns = array(
        'rest_id','filter','title','price','image'
    );
}