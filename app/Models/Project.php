<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    protected $fillable = [
        'company_id', 
        'user_id', 
        'name', 
        'description', 
        'status', 
        'start_date', 
        'end_date'
    ];

    protected $hidden = [
        'created_at', 
        'updated_at'
    ];

    protected function casts(): Array
    {
        return [
            'start_date' => 'date', 
            'end_date' => 'date'
        ];
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

}
