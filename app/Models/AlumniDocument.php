<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniDocument extends Model {
    use HasFactory;

    protected $fillable = ['alumni_id', 'document_name', 'file_path'];

    public function alumni() {
        return $this->belongsTo(Alumni::class, 'alumni_id');
    }
}
