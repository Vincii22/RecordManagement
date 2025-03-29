<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model {
    use HasFactory, SoftDeletes;

    protected $table = 'documents';
    protected $primaryKey = 'DocumentID';

    protected $fillable = [
        'DocumentName',
        'DocumentType',
        'DocumentFilePath',
        'DocumentOwner',
        'SchoolYear',
        'CreatedBy',
        'UpdatedBy',
        'DeletedBy'
    ];

    protected $dates = ['CreatedAt', 'UpdatedAt', 'DeletedAt'];

    public function creator() {
        return $this->belongsTo(User::class, 'CreatedBy');
    }

    public function updater() {
        return $this->belongsTo(User::class, 'UpdatedBy');
    }

    public function deleter() {
        return $this->belongsTo(User::class, 'DeletedBy');
    }
}

