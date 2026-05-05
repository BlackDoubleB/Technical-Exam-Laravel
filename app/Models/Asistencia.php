<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    protected $table = 'attendances';

    protected $fillable = [
        'person_id',
        'date',
        'status',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function person()
    {
        return $this->belongsTo(Persona::class, 'person_id');
    }
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'person_id');
    }
}
