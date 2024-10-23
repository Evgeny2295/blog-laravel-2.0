<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostUserComment extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function post()
    {

        return $this->belongsTo(Post::class,'post_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function getDateAsCarbonAttribute()
    {
        return Carbon::parse($this->created_at);
    }
}
