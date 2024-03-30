<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Commande extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table="commandes";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'client_id',
        'user_id',
        'marchandise_id',
        'destinataire_id',
        'name_cmd',
    ];

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function marchandise()
    {
        return $this->hasMany(Marchandise::class);
    }

    public function destinataire()
    {
        return $this->hasOne(Destinataire::class);
    }
}
