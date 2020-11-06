<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes; 
    protected $dates=['deleted_at'];

    protected $fillable=['user_id','post_id','parent_id','body'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function post(){
        $this->belongsTo('App\Models\Post');
    }

    public function like(){
        $this->belongsTo('App\Models\Like'); 
    }

    public function replies(){
        return $this->hasMany('App\Models\Comment','parent_id');
    }

}
