<?php

namespace App\Models;

use App\Enums\KYCStatus;
use App\Enums\TxnStatus;
use App\Enums\TxnType;
use App\Mail\MailSend;
use Carbon\Carbon;
use Coderflex\LaravelTicket\Concerns\HasTickets;
use Coderflex\LaravelTicket\Contracts\CanUseTickets;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements CanUseTickets, MustVerifyEmail
{
    use HasApiTokens, HasFactory, HasTickets, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'portfolio_id',
        'branch_id',
        'portfolios',
        'avatar',
        'first_name',
        'last_name',
        'civility',
        'id_number',
        'country',
        'phone',
        'username',
        'email',
        'email_verified_at',
        'email_otp',
        'email_otp_expires_at',
        'gender',
        'date_of_birth',
        'city',
        'zip_code',
        'address',
        'balance',
        'points',
        'account_number',
        'status',
        'kyc',
        'kyc_credential',
        'google2fa_secret',
        'two_fa',
        'deposit_status',
        'withdraw_status',
        'transfer_status',
        'otp_status',
        'dps_status',
        'fdr_status',
        'loan_status',
        'portfolio_status',
        'reward_status',
        'referral_status',
        'ref_id',
        'password',
        'passcode',
        'phone_verified',
        'otp',
        'notifications_permission',
        'close_reason',
        'custom_fields_data',
        'pay_bill_status',
    ];

    protected $appends = [
        'full_name',
        'kyc_time',
        'kyc_type',
        'total_profit',
        'total_deposit',
        'avatar_path',
    ];

    protected $dates = ['kyc_time'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'google2fa_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'email_otp_expires_at' => 'datetime',
        'two_fa' => 'boolean',
        'phone_verified' => 'boolean',
        'notifications_permission' => 'array',
        'custom_fields_data' => 'array',
    ];

    public function generateEmailOtp(int $expiresInMinutes = 10): int
    {
        $otp = random_int(100000, 999999);

        $this->forceFill([
            'email_otp' => Hash::make((string) $otp),
            'email_otp_expires_at' => now()->addMinutes($expiresInMinutes),
        ])->save();

        return $otp;
    }

    public function clearEmailOtp(): void
    {
        $this->forceFill([
            'email_otp' => null,
            'email_otp_expires_at' => null,
        ])->save();
    }

    public function sendEmailVerificationNotification()
    {
        if ($this->hasVerifiedEmail()) {
            return;
        }

        $otp = $this->generateEmailOtp();
        $siteTitle = setting('site_title', 'global');

        $template = EmailTemplate::where('status', true)->where('code', 'email_verification')->first();

        if ($template) {
            $shortcodes = [
                '[[full_name]]' => $this->full_name,
                '[[token]]'     => (string) $otp,
                '[[site_title]]'=> $siteTitle,
                '[[site_url]]'  => route('home'),
            ];
            $find    = array_keys($shortcodes);
            $replace = array_values($shortcodes);

            $details = [
                'subject'      => str_replace($find, $replace, $template->subject),
                'banner'       => $template->banner ? asset($template->banner) : asset('logo/logo.png'),
                'title'        => str_replace($find, $replace, $template->title),
                'salutation'   => str_replace($find, $replace, $template->salutation),
                'message_body' => str_replace($find, $replace, $template->message_body),
                'button_level' => $template->button_level,
                'button_link'  => str_replace($find, $replace, $template->button_link),
                'footer_status'=> $template->footer_status,
                'footer_body'  => str_replace($find, $replace, $template->footer_body),
                'bottom_status'=> $template->bottom_status,
                'bottom_title' => str_replace($find, $replace, $template->bottom_title),
                'bottom_body'  => str_replace($find, $replace, $template->bottom_body),
                'site_logo'    => asset('logo/logo.png'),
                'site_title'   => $siteTitle,
                'site_link'    => route('home'),
            ];
        } else {
            $details = [
                'subject'      => "Confirmez votre adresse email — {$siteTitle}",
                'banner'       => asset('logo/logo.png'),
                'title'        => 'Vérification de votre adresse email',
                'salutation'   => 'Bonjour '.$this->full_name.',',
                'message_body' => 'Votre code de vérification est : <strong>'.$otp.'</strong>',
                'button_level' => '',
                'button_link'  => '',
                'footer_status'=> 1,
                'footer_body'  => 'Cordialement,<br />'.$siteTitle,
                'bottom_status'=> 0,
                'bottom_title' => '',
                'bottom_body'  => '',
                'site_logo'    => asset('logo/logo.png'),
                'site_title'   => $siteTitle,
                'site_link'    => route('home'),
            ];
        }

        try {
            Mail::to($this->email)->send(new MailSend($details));
        } catch (\Exception $e) {
            \Log::error('Email verification send failed: ' . $e->getMessage());
        }
    }

    /*
     * Scope Declaration
     * */

    public function scopeSearch($query, $search)
    {
        if ($search != null) {
            return $query->where(function ($query) use ($search) {
                $query->orWhere('first_name', 'LIKE', '%'.$search.'%')
                    ->orWhere('last_name', 'LIKE', '%'.$search.'%')
                    ->orWhere('username', 'LIKE', '%'.$search.'%')
                    ->orWhere('email', 'LIKE', '%'.$search.'%')
                    ->orWhere('phone', 'LIKE', '%'.$search.'%')
                    ->orWhere('account_number', 'LIKE', '%'.str($search)->remove(setting('account_number_prefix', 'global')).'%')
                    ->orWhere('country', 'LIKE', '%'.$search.'%')
                    ->orWhere('gender', 'LIKE', '%'.$search.'%')
                    ->orWhere('city', 'LIKE', '%'.$search.'%')
                    ->orWhere('zip_code', 'LIKE', '%'.$search.'%')
                    ->orWhere('address', 'LIKE', '%'.$search.'%');
            });
        }

        return $query;
    }

    public function scopeStatus($query, $status)
    {
        if ($status != 'all' && $status != null) {
            $status = $status == 'pending' ? KYCStatus::Pending : ($status === 'rejected' ? KYCStatus::Failed : KYCStatus::Verified);

            return $query->where('kyc', $status);
        }
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeClosed($query)
    {
        return $query->where('status', 2);
    }

    public function scopeDisabled($query)
    {
        return $query->where('status', 0);
    }

    public function getUpdatedAtAttribute(): string
    {
        return Carbon::parse($this->attributes['updated_at'])->format('d M Y h:i A');
    }

    public function getAvatarPathAttribute()
    {
        return $this->attributes['avatar'] !== null && file_exists(base_path('assets/'.$this->attributes['avatar'])) ? asset($this->attributes['avatar']) : asset('front/images/user.jpg');
    }

    public function getAccountNumberAttribute()
    {
        return setting('account_number_prefix', 'global').$this->attributes['account_number'];
    }

    public function getCreatedAtAttribute(): string
    {
        return Carbon::parse($this->attributes['created_at'])->format('d M Y h:i A');
    }

    public function getFullNameAttribute(): string
    {
        return ucwords($this->first_name.' '.$this->last_name);
    }

    public function getKycTypeAttribute(): string
    {
        $kycs = UserKyc::where('user_id', $this->attributes['id'])->pluck('kyc_id');

        $types = Kyc::whereIn('id', $kycs)->pluck('name')->implode(',');

        return $types;
    }

    public function getKycTimeAttribute(): string
    {
        return json_decode($this->attributes['kyc_credential'], true)['kyc_time_of_time'] ?? '';
    }

    public function getTotalProfitAttribute(): string
    {
        return $this->totalProfit();
    }

    public function getTotalDepositAttribute(): string
    {
        return $this->totalDeposit();
    }

    public function totalProfit($days = null)
    {

        $sum = $this->transaction()->where('status', TxnStatus::Success)->where(function ($query) {
            $query->whereIn('type', [TxnType::Referral, TxnType::SignupBonus, TxnType::PortfolioBonus, TxnType::RewardRedeem, TxnType::DpsMaturity, TxnType::FdrInstallment]);
        });

        if ($days != null) {
            $sum->where('created_at', '>=', Carbon::now()->subDays((int) $days));
        }
        $sum = $sum->sum('amount');

        return round($sum, 2);
    }

    public function totalFdr()
    {
        $this->fdr()->sum('amount');
    }

    public function rejectedKycs()
    {
        return $this->kycs()->where('status', 'rejected');
    }

    public function kycs()
    {
        return $this->hasMany(UserKyc::class, 'user_id', 'id');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'user_id');
    }

    public function getReferrals()
    {
        return ReferralProgram::all()->map(function ($program) {
            return ReferralLink::getReferral($this, $program);
        });
    }

    public function referrals()
    {
        return $this->hasMany(User::class, 'ref_id');
    }

    public function referralTree()
    {
        return $this->referrals()->with('referralTree');
    }

    public function totalDeposit()
    {
        $sum = $this->transaction()->where('status', TxnStatus::Success)->where(function ($query) {
            $query->where('type', TxnType::Deposit)
                ->orWhere('type', TxnType::ManualDeposit);
        })->sum('amount');

        return round($sum, 2);
    }

    public function totalDepositBonus()
    {
        $sum = $this->transaction()->where('status', TxnStatus::Success)->where(function ($query) {
            $query->where('target_id', '!=', null)
                ->where('target_type', 'deposit')
                ->where('type', TxnType::Referral);
        })->sum('amount');

        return round($sum, 2);
    }

    public function totalWithdraw()
    {
        $sum = $this->transaction()->where('status', TxnStatus::Success)->where(function ($query) {
            $query->where('type', TxnType::Withdraw)
                ->orWhere('type', TxnType::WithdrawAuto);
        })->sum('amount');

        return round($sum, 2);
    }

    public function totalTransfer()
    {
        $sum = $this->transaction()->where('status', TxnStatus::Success)->where(function ($query) {
            $query->where('type', TxnType::FundTransfer);
        })->sum('amount');

        return round($sum, 2);
    }

    public function totalReferralProfit()
    {
        $sum = $this->transaction()->where('status', TxnStatus::Success)->where(function ($query) {
            $query->where('type', TxnType::Referral);
        })->sum('amount');

        return round($sum, 2);
    }

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class, 'portfolio_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function dps()
    {
        return $this->hasMany(Dps::class, 'user_id', 'id');
    }

    public function fdr()
    {
        return $this->hasMany(Fdr::class, 'user_id', 'id');
    }

    public function loan()
    {
        return $this->hasMany(Loan::class, 'user_id', 'id');
    }

    public function bill()
    {
        return $this->hasMany(Bill::class, 'user_id', 'id');
    }

    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }

    public function portfolioAchieved()
    {
        $portfolios = json_decode($this->portfolios, true);

        if (is_array($portfolios)) {
            return count($portfolios);
        }

        return 0;
    }

    protected function google2faSecret(): Attribute
    {
        return new Attribute(
            get: fn ($value) => $value != null ? decrypt($value) : $value,
            set: fn ($value) => encrypt($value),
        );
    }

    public function scopeWithTrash($query)
    {
        return $query->withTrashed();
    }

    public function activities()
    {
        return $this->hasMany(LoginActivities::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function refferelLinks()
    {
        return $this->hasMany(ReferralLink::class);
    }

    public function withdrawAccounts()
    {
        return $this->hasMany(WithdrawAccount::class);
    }

    public function wallets()
    {
        return $this->hasMany(UserWallet::class, 'user_id');
    }

    protected static function booted(): void
    {
        static::created(function ($user) {

            $notifications = notificationPermissions();

            $user->update([
                'notifications_permission' => $notifications,
                'account_number' => generateAccountNumber(),
            ]);
        });
    }

    public function referred()
    {
        return $this->belongsTo(User::class, 'ref_id', 'id');
    }
}
