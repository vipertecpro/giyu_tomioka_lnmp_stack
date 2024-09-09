<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'blog_id',
        'content',
        'parent_id',
        'created_by',
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
    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
    public function children(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
