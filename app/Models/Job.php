<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'location',
        'salary',
        'description',
        'experience',
        'category'
    ];

    public static array $experience = ['entry', 'intermediate', 'senior'];
    public static array $category = [
        'IT',
        'Finance',
        'Sales',
        'Marketing'
    ];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }
    public function jobApplications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }
}
