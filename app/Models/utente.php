<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Utente extends Model
{
    protected $table = "utente";
    public $timestamps = false;

    public function raccolta()
    {
        return $this->hasMany("Raccolta", "username");
    }
}
