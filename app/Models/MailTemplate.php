<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class MailTemplate extends Model
{
    use HasFactory, SoftDeletes, Sortable;

    protected $fillable = [
        'name',
        'subject',
        'content',
        'created_by',
        'is_public',
    ];

    // scope filter
    public function scopeFilter($query, array $filters = [])
    {
        $query->where('created_by', auth()->id())
            ->orWhere('is_public', 1);

        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('subject', 'like', '%' . request('search') . '%')
                ->orWhere('content', 'like', '%' . request('search') . '%');
        }
    }

    // created_by belongs to user
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
