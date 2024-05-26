<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class MailCampaign extends Model
{
    use HasFactory, SoftDeletes, Sortable;

    protected $fillable = [
        'name',
        'subject',
        'start_time',
        'mail_template_id',
        'created_by',
        'status',
    ];

    /**
     * Interact with the maillog's status.
     */
    protected function status(): Attribute
    {
        return Attribute::make(
            get: function($value) {
                if ($value == 1) {
                    return 'Scheduled';
                } elseif ($value == 2) {
                    return 'Started';
                } elseif ($value == 3) {
                    return 'Finished';
                }
            }
        );
    }

    // scope filter
    public function scopeFilter($query, array $filters)
    {
        $orderCol = $filters['order_by'] ?? 'id';
        $orderDirection = $filters['order_direction'] ?? 'desc';
        $query->where('created_by', auth()->id())->orderBy($orderCol, $orderDirection);
        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('subject', 'like', '%' . request('search') . '%');
        }
    }

    // belongs to mail template
    public function mailTemplate()
    {
        return $this->belongsTo(MailTemplate::class);
    }

    // created_by belongs to user
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function campaignUsers()
    {
        return $this->belongsToMany(User::class, 'mail_logs', 'mail_campaign_id', 'user_id');
    }
}
