<?php
namespace App\Models;
use Codefii\Entity\orm\Fiirm;
class Orders extends Fiirm {
    public $pk = 'order_id';
    public $columns = array(
        'rev_id','order_by','order_status','quantity','mode'
    );
}