<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be hasOne polymorphic relationship.
     *
     * its Morph an image class
     */
    public function image(){

        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * The attributes that should be hasmany polymorphic relationship.
     *
     * its Morph an Comment class
     */
    public function comment(){

        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Accessor
     * The attributes that should be get name to uppercase.
     */

    public function getFullNameAttribute()
    {
        return strtolower($this->name);
    }

    /**
     * Mutuators
     * The attributes that should be get name to uppercase.
     */

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

     /**
     * Write code on Method
     *
     * @return response()
     */
    public static function boot() {

        parent::boot();

        /**
         * Write code on Method
         *
         * @return response()
         */
        static::creating(function($item) {
            Log::info('Creating event call: '.$item);

        });

        /**
         * Write code on Method
         *
         * @return response()
         */
        static::created(function($item) {
            /*
                Write Logic Here
            */

            Log::info('Created event call: '.$item);
            $post = new Post;
            $post->title = Str::random(5);
            $post->body = Str::random(50);
            $post->save();
            // dd($post);
        });

        /**
         * Write code on Method
         *
         * @return response()
         */
        static::updating(function($item) {
            Log::info('Updating event call: '.$item);

        });

        /**
         * Write code on Method
         *
         * @return response()
         */
        static::updated(function($item) {
            /*
                Write Logic Here
            */

            Log::info('Updated event call: '.$item);
            $post = new Post;
            $post->title = Str::random(5);
            $post->body = Str::random(50);
            $post->save();

        });

        /**
         * Write code on Method
         *
         * @return response()
         */
        static::deleted(function($item) {
            
            User::create([
                'name'=>Str::random(5),
                'email' => Str::random(5).'@mailinator.com',
                'password' => bcrypt('12345678')
            ]);

            Log::info('Deleted event call: '.$item);
        });
    }

}
