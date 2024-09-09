<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
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
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}
