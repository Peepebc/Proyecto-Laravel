<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comentario extends Model
{
    use HasFactory,SoftDeletes;


    /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
        'comentario',
        'usuario',
        'libro'
  ];

  public function usuario(){
      return $this->belongsTo(User::class);
  }

  public function libro(){
      return $this->belongsTo(Libro::class);
  }
}
