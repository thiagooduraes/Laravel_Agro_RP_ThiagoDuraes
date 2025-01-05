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
        'avatar_url',
        'bio',
        'location',
        'blog',
        'twitter_username',
        'public_repos',
    ];

    /**
     * The user that this GitHub user belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        /**
         * The relationship to the User model
         *
         * @param string $related
         * @param string $foreignKey
         * @param string $localKey
         * @return BelongsTo
         */
        return $this->belongsTo(User::class, 'admin_email', 'email');
    }
}