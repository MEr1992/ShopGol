<?php
namespace Models\Product;

use Illuminate\Database\Eloquent\Model;
use Models\Traits\Base;

class Line extends Model
{
    use Base;

    protected $guarded = ['created_at', 'updated_at', 'deleted_at', 'id'];
    protected $hidden  = ['created_at', 'updated_at', 'deleted_at'];
    protected $dates   = ['deleted_at'];
    protected $table   = 'product_lines';

    protected static function booted(): void
    {
        static::deleting(function(Line $line) { // before delete() method call this 
            //
        });
    }
    function products()
    {
        return $this->hasMany(Product::class, 'line_id');
    }
}
