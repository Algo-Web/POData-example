<?php
namespace PODataExample\models;

use PODataExample\models\EntityTrait;

class photo {

    // This trait contains method for fields mapping (between database table and this class)
    use EntityTrait;

    public $ID;
    public $content;
    public $rel_Type;
    public $rel_ID;
}
