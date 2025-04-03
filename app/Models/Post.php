<?php

namespace App\Models;
use App\Observers\PostObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([PostObserver::class])]
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
