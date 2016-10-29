<?php
namespace PODataExample\models;

use PODataExample\models\EntityTrait;

class Photo {

    // This trait contains method for fields mapping (between database table and this class)
    use EntityTrait;

    public $ID;
    public $Content;
    public $Rel_Type;
    public $Rel_ID;
}
