<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostNotification extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'email',
        'post_id',
        'sent_at'
    ];

    protected $casts = [
        'sent_at' => 'datetime'
    ];

    public function post(): BelongsTo{
        return $this->belongsTo(Post::class);
     }
}
