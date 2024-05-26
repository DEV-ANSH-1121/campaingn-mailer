<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class MailLog extends Model
{
    use HasFactory, SoftDeletes, Sortable;

    // fillable
    protected $fillable = [
        'user_id',
        'mail_campaign_id',
        'status',
        'created_by',
    ];

    // scope filter
    public function scopeFilter($query, array $filters = [])
    {
        $query->where('created_by', auth()->id());
        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%');
        }
    }

    // belong to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // belongs to mail campaign
    public function mailCampaign()
    {
        return $this->belongsTo(MailCampaign::class);
    }

    // owner created_by
    public function owner()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Interact with the maillog's status.
     */
    protected function status(): Attribute
    {
        return Attribute::make(
            get: function($value) {
                if ($value == 1) {
                    return 'Sent';
                } elseif ($value == 2) {
                    return 'Opened';
                } elseif ($value == 3) {
                    return 'Failed';
                } elseif ($value == 4) {
                    return 'Scheduled';
                }
            }
        );
    }

}
