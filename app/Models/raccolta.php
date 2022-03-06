<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Raccolta extends Model
{
    protected $table = "raccolta";
    public $timestamps = false;

    public function utente()
    {
        return $this->belongsTo("Utente", "nick");
    }

    public function contenuto() {
        return $this->hasMany("Contenuto", "nome");
    }
}
