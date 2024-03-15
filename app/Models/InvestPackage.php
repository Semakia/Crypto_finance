<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\Campaign
 *
 * @property int $id
 * @property string $title
 * @property int $campaign_category_id
 * @property string $slug
 * @property string|null $short_description
 * @property string $description
 * @property float|null $goal
 * @property float|null $recommended_amount
 * @property string|null $amount_prefilled
 * @property int|null $campaign_end_method
 * @property string|null $video_link
 * @property int|null $country_id
 * @property string|null $location
 * @property string|null $start_date
 * @property string|null $deadline
 * @property int|null $status
 * @property int|null $is_featured
 * @property int|null $is_emergency
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at

 * @property-read string $image
 * @property-read int|null $media_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|InvestPakage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InvestPakage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InvestPakage query()
 * @method static \Illuminate\Database\Eloquent\Builder|InvestPakage whereAmountPrefilled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvestPakage whereCampaignCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvestPakage whereCampaignEndMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvestPakage whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvestPakage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvestPakage whereDeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvestPakage whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvestPakage whereGoal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvestPakage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvestPakage whereIsEmergency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvestPakage whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvestPakage whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvestPakage whereRecommendedAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvestPakage whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvestPakage whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvestPakage whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvestPakage whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvestPakage whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvestPakage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvestPakage whereVideoLink($value)
 * @mixin \Eloquent
 */
class InvestPackage extends Model 
{
    use HasFactory;

    const AFTER_END_DATE = 1;

    const AFTER_GOAL_ACHIEVE = 2;

    const CAMPAIGN_IMAGE = 'campaign_image';

    const CAMPAIGN_DROP_IMAGE = 'campaign_drop_image';

    const STATUS_ACTIVE = 1;

    const STATUS_BLOCKED = 2;

    const STATUS_PENDING = 3;

    const STATUS_FINISHED = 4;

    const STATUS_All = 5;

    const STATUS_ARRAY = [
        self::STATUS_All => 'All',
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_BLOCKED => 'Blocked',
        self::STATUS_PENDING => 'Pending',
        self::STATUS_FINISHED => 'Finished',
    ];

    const ADD_STATUS = [
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_BLOCKED => 'Blocked',
        self::STATUS_PENDING => 'Pending',
        self::STATUS_FINISHED => 'Finished',
    ];

    /**
     * @var string
     */
    protected $table = 'investpackage';

    protected $appends = ['image', 'status_name'];

    protected $with = ['campaignCategory', 'media'];

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'amount_required',
        'short_description',
        'amount_required'
    ];

    public static $rules = [
        'title' => 'required|unique:campaigns,title|max:50',
        'slug' => 'required|unique:campaigns,slug|max:15',
        'short_description' => 'required',
        'image' => 'required|mimes:jpeg,png,jpg',

    ];

    protected $casts = [
        'title' => 'string',
        'amount_required' => 'integer',
        'short_description' => 'string',
        
    ];

    

    

    /**
     * @return string
     */
    public function getStatusNameAttribute(): string
    {
        $status = $this->status;

        return self::STATUS_ARRAY[$status];
    }

    /**
     * @return BelongsTo
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'table_pivot', 'investment_id', 'user_id');
    }


    

    
    
}
