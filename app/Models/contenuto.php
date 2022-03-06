<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Contenuto extends Model
{
    protected $table = "contenuto";
    public $timestamps = false;

    public function raccolta()
    {
        return $this->belongsTo("Raccolta", "nome_raccolta");
    }

}
