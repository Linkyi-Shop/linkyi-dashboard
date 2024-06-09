<?php

namespace App\Models;

use App\Helpers\CurrencyHelper;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['id', 'name', 'link', 'price', 'thumbnail', 'is_premium', 'is_active'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_premium' => 'boolean',
        'is_active' => 'boolean',
    ];
    public $incrementing = false;

    public function getThumbnail()
    {
        return sprintf('https://storage.googleapis.com/%s/%s', env('GOOGLE_CLOUD_STORAGE_BUCKET'), $this->thumbnail);
    }

    public function getPrice()
    {
        if ($this->is_premium) {
            return CurrencyHelper::currencyIDR($this->price);
        } else {
            return 'Gratis';
        }
    }
    public function themeStores()
    {
        return $this->hasMany(StoreTheme::class, 'theme_id', 'id');
    }
}
