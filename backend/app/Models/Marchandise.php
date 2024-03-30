<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Marchandise extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table="marchandises";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'commande_id',
        'info',
        'nbr_colis',
        'type_colis',
        'catégorie'
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
}
