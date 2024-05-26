<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Sortable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'company_id',
        'is_owner'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_owner' => 'boolean',
    ];

    // scope filter
    public function scopeFilter($query, array $filters = [])
    {
        $query->where('id', '!=', auth()->user()->id)
            ->where('company_id', auth()->user()->company_id);
        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%');
        }
    }

    // belongsTo Company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // hasOne Company
    public function ownedCompany()
    {
        return $this->hasOne(Company::class,  'owner_id');
    }

    // hasMany Templates
    public function templates()
    {
        return $this->hasMany(MailTemplate::class,  'created_by');
    }

    public function campaigns()
    {
        return $this->belongsToMany(MailCampaign::class, 'mail_logs', 'user_id', 'mail_campaign_id');
    }
}
