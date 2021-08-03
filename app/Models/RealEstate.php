<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RealEstate extends Model
{
    public $table ='realestates';
    use HasFactory;
    protected $fillable = [
        'user_id',
        'realestate_type_id',
        'contract_type_id',
        'city_id',
        'country_id',
        'neighborhood',
        'price',
        'space',
        'number_building',
        'age_building',
        'street_width',
        'street_number',
        'video_url',
        'view',
        'elevator',
        'parking',
        'ac',
        'furniture',
        'note',
        'is_active',
        'number_of_views',
        'status',
        'type',
        'lat',
        'lng',
        'address',
    ];
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    } 
     public function scopeOwner($query)
    {
        return $query->where('user_id', Auth::id());
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function contractType()
    {
        return $this->belongsTo(ContractType::class);
    }
    public function realestateType()
    {
        return $this->belongsTo(RealestateType::class);
    }
    public function medias()
    {
        return $this->hasMany(RealestateMedia::class,'realestate_id');
    }

}

