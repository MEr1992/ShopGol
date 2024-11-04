<?php
namespace Models\Content;

use Illuminate\Database\Eloquent\Model;
use Models\Traits\Base;

class BlogSubject extends Model
{
    use Base;

    protected $guarded = ['created_at', 'updated_at', 'deleted_at', 'id'];
    protected $hidden  = ['created_at', 'updated_at', 'deleted_at'];
    protected $dates   = ['deleted_at'];
    protected $table   = 'blog_subjects';

    function blogs()
    {
        return $this->hasMany(Blog::class, 'blog_id');
    }
}
