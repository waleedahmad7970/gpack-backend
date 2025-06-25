<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'prefix',
        'member_type',
        'name',
        'designation',
        'expertise',
        'photo_url',
        'profile_url',
        'is_active'
    ];

    
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function fields()
    {
        return $this->belongsToMany(Field::class, 'team_fields');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function scopeCore($query)
    {
        return $query->where('member_type', 'core');
    }

    public function scopeFellow($query)
    {
        return $query->where('member_type', 'fellow');
    }
}
