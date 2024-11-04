<?php
namespace Models\Person;

use Models\Person\User;

class Personnel extends User
{    
    public function newQuery($excludeDeleted = true)
    {
        $c =  parent::newQuery($excludeDeleted);
        return $c->where(function($q){ $q->whereIn($this->table.'.role_id', [1,2]); });
    }
    
}
