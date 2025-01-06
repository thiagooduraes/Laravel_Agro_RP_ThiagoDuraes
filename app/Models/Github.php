<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Github extends Model
{
    use HasFactory;

    protected $table = 'github';

    protected $fillable = [
        'admin_email',
        'login',
        'name',
        'company',
        'avatar_url',
        'bio',
        'location',
        'blog',
        'public_repos',
    ];

    // Relacionamento do perfil com o usuário logado
    public function user()
    {
        return $this->belongsTo(User::class, 'admin_email', 'email');
    }
}