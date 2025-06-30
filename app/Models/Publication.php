<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'title',
        'author',
        'summary',
        'image_url'
    ];

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */
    public function scopeSort($query, $value)
    {
        return $query->orderBy('title', $value);
    }

    public function scopeBook($query)
    {
        return $query->where('type', 'book');
    }

    public function scopeChapter($query)
    {
        return $query->where('type', 'chapter');
    }

    public function scopeAssignment($query)
    {
        return $query->where('type', 'assignment');
    }
}
