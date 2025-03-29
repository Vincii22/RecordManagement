<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model {
    use HasFactory;

    protected $fillable = ['name', 'birthday', 'address', 'graduation_year'];

    public function documents() {
        return $this->hasMany(AlumniDocument::class, 'alumni_id');
    }
}
