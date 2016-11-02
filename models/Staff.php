<?php
namespace PODataExample\models;

use PODataExample\models\EntityTrait;

class staff {

    // This trait contains method for fields mapping (between database table and this class)
    use EntityTrait;

    public $id;
    public $name;
    public $partner;
    public $photo_id;
    public $customers;
}
