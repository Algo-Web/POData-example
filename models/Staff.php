<?php
namespace PODataExample\models;

use PODataExample\models\EntityTrait;

class Staff {

    // This trait contains method for fields mapping (between database table and this class)
    use EntityTrait;

    public $ID;
    public $Name;
    public $Partner;
    public $Photo_id;
    public $Customers;
}
