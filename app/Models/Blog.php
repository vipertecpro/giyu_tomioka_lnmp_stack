<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'featured_image',
        'title',
        'slug',
        'excerpt',
        'content',
        'google_meta_title',
        'google_meta_url',
        'google_meta_description',
        'facebook_meta_title',
        'facebook_meta_description',
        'twitter_meta_title',
        'twitter_meta_description',
        'status',
        'visibility',
        'created_by',
        'updated_by',
        'published_at',
        'published_by',
    ];
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at'        => 'datetime: Y-m-d H:i:s',
            'updated_at'        => 'datetime: Y-m-d H:i:s',
        ];
    }
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function editor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'published_by');
    }
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,'blog_categories');
    }
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class,'blog_tags');
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
