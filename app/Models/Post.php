<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Comment;

class Post extends Model
{

    use HasFactory;
    use SoftDeletes; 
    protected $dates=['deleted_at'];

    protected $guarded=[];

    public function comments(){
        return $this->hasMany('App\Models\Comment')->whereNull('parent_id'); //retrieve the comments that still have no reply
    }

    public function likes(){
        return $this->hasMany('App\Models\Like')->count();
    }

}
