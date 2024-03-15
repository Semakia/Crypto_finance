<?php

namespace App\Models;

use Bavix\Wallet\Interfaces\Wallet;
use Bavix\Wallet\Traits\HasWallet;
use Bavix\Wallet\Traits\HasWalletFloat;
use Bavix\Wallet\Traits\HasWallets;
use Eloquent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $contact
 * @property string|null $dob
 * @property int $gender
 * @property int $status
 * @property string|null $language
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Address|null $address
 * @property-read Doctor|null $doctor
 * @property-read string $full_name
 * @property-read string $profile_image
 * @property-read MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @property-read DatabaseNotificationCollection|DatabaseNotification[]
 *     $notifications
 * @property-read int|null $notifications_count
 * @property-read Patient|null $patient
 *
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereContact($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereDob($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereFirstName($value)
 * @method static Builder|User whereGender($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereLanguage($value)
 * @method static Builder|User whereLastName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereStatus($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
 *
 * @property int|null $type
 * @property string|null $blood_group
 * @property-read mixed $role_name
 * @property-read Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection|Qualification[] $qualifications
 * @property-read int|null $qualifications_count
 * @property-read Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 *
 * @method static Builder|User permission($permissions)
 * @method static Builder|User role($roles, $guard = null)
 * @method static Builder|User whereBloodGroup($value)
 * @method static Builder|User whereType($value)
 */
class User extends Authenticatable implements HasMedia, Wallet
{
    use HasFactory, Notifiable, InteractsWithMedia, HasRoles, HasWallet, HasWallets, HasWalletFloat;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'contact',
        'dob',
        'gender',
        'is_active',
        'password',
        'language',
        'type',
        'role',
        'address',
        'country_id',
        'email_verified_at',
        'is_active',
        'region_code',
        'is_default',
        'username',
        'google2fa_secret',
    ];

    const PROFILE = 'profile';

    const ADMIN = 1;

    const USER = 2;

    const TYPE = [
        self::ADMIN => 'Admin',
        self::USER => 'User',
    ];

    const ALL = 2;

    const ACTIVE = 1;

    const INACTIVE = 0;

    const STATUS = [
        self::ALL => 'All',
        self::ACTIVE => 'Active',
        self::INACTIVE => 'Inactive',
    ];

    protected $with = ['media', 'country'];

    protected $appends = ['full_name', 'profile_image', 'role_name'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'google2fa_secret'
    ];

    const MALE = 1;

    const FEMALE = 2;

    const GENDER = [
        self::MALE => 'Male',
        self::FEMALE => 'Female',
    ];

    public static $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|same:password_confirmation|min:6',
        'dob' => 'nullable|date',
        'contact' => 'required',
        'experience' => 'nullable|numeric',
        'specializations' => 'required',
        'gender' => 'required',
        'status' => 'nullable',
        'region_code' => 'nullable',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return string
     */
    public function getProfileImageAttribute()
    {
        /** @var Media $media */
        $media = $this->getMedia(self::PROFILE)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return asset('front_landing/images/team-3.png');
    }

    public function getRoleNameAttribute()
    {
        $role = $this->roles()->first();

        if (! empty($role)) {
            return $role->display_name;
        }
    }

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    /**
     * @return BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    /**
     * @return hasMany
     */
    

    /**
     * @return HasMany
     */
    public function investments(): BelongsToMany
    {
        return $this->belongsToMany(InvestPackage::class, 'table_pivot', 'user_id', 'investment_id');
    }

   
    
    /**
     * @return HasMany
     */

    public function memberships() : HasMany
    {
        return $this->hasMany(Membership::class);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'level_user', 'parent_id', 'user_id')->withTimestamps()->withPivot([
            'user_id',
            'level_id',
            'parent_id'
        ]);
    }

    
    public function childrens()
    {
        return $this->hasMany(User::class, 'user_id', 'parent_id');
    }

    protected function google2faSecret(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  decrypt($value),
            set: fn ($value) =>  encrypt($value),
        );
    }
}
