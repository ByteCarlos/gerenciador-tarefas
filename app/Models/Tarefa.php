<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Tarefa extends Model
{
    public $fillable = [
        "titulo",
        "descricao",
        "categoria_id",
    ];

    use HasFactory;

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

     public function getCreatedAtAttribute($value)
     {
         return Carbon::parse($value)->format('d/m/Y \à\s H\h:i');
     }
 
     public function getUpdatedAtAttribute($value)
     {
         return Carbon::parse($value)->format('d/m/Y \à\s H\h:i');
     }
}
