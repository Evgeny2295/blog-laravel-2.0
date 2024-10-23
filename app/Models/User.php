<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\SendVerifyWithQueueNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public static int $userRole = 0;
    public static int $adminRole = 1;

    public static function getRoles(): array
    {
        return [
          self::$userRole => 'user',
          self::$adminRole => 'admin'
        ];
    }


    public function sendEmailVerificationNotification()
    {
        $this->notify(new SendVerifyWithQueueNotification());
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class,'post_user_likes','user_id','post_id');
    }

    public function comments()
    {
        return $this->hasMany(PostUserComment::class,'user_id','id');
    }
    public function commentPosts()
    {
        return $this->belongsToMany(Post::class,'post_user_comments','user_id','post_id');
    }

    public function likedPosts()
    {
        return $this->belongsToMany(Post::class,'post_user_likes','user_id','post_id');
    }


}
