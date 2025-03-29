<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'users';
    protected $primaryKey = 'UserID';

    protected $fillable = [
        'Name',
        'Username',
        'PasswordHash',
        'ContactNo',
        'Email',
        'Birthday',
        'Sex',
        'Position',
        'ImagePath',
        'UserType'
    ];

    protected $hidden = [
        'PasswordHash',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'PasswordHash' => 'hashed',
    ];

    public function createdDocuments() {
        return $this->hasMany(Document::class, 'CreatedBy');
    }

    public function updatedDocuments() {
        return $this->hasMany(Document::class, 'UpdatedBy');
    }

    public function deletedDocuments() {
        return $this->hasMany(Document::class, 'DeletedBy');
    }
}
