<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description',
        'website_id'
    ];

    public function website(): BelongsTo{
       return $this->belongsTo(Website::class);
    }

    public function notifications(): HasMany{
        return $this->hasMany(PostNotification::class);
     }
}
