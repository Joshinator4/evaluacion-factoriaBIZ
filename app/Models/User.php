<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        // 'admin_desde'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'admin_desde' => 'datetime'
        ];
    }

    //Esto es la relacion 1:1 de usuario con el cliente. Un usuario tiene o no un cliente
    public function cliente(){
        return $this->hasOne(cliente::class);
    }

    public function isAdmin(){
        if($this->admin_desde != null && $this->admin_desde->lessThanOrEqualTo(now())){
            return true;
        }
    }

    public function isCliente(){
        if($this->cliente != null){
            return true;
        }
    }
}
