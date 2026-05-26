<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'priority',
        'project_id',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function scopeFilterByProject(Builder $query, $projectId = null)
    {
        if ($projectId) {
            $query->where('project_id', $projectId);
        }
        return $query;
    }

    public static function getNextPriority(): int
    {
        return self::query()->max('priority') ?? 0;
    }
}
