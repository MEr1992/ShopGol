<?php

namespace Admin\Controllers\Person;

use Admin\Controllers\Person\UserController;
use Models\Person\Role;

class PersonnelController extends UserController
{
    protected $model = "Models\Person\Personnel";
    
    public function init()
    {
        Parent::init();
        
        $this->indexQuery = function ($query)
        {            
            $query->whereIn('role_id', Role::ISPERSONNEL)->whereNot("id", 1);
        };
    }
}

