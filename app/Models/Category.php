<?php

namespace App\Models;

use App\CPU\Helpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $casts = [
        'parent_id' => 'integer',
        'position' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'home_status' => 'integer',
        'priority' => 'integer'
    ];

    public function translations()
    {
        return $this->morphMany('App\Models\Translation', 'translationable');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id')->orderBy('priority', 'desc');
    }

    public function childes()
    {
        return $this->hasMany(Category::class, 'parent_id')->orderBy('priority', 'asc');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function sub_category_product()
    {
        return $this->hasMany(Product::class, 'sub_category_id', 'id');
    }

    public function sub_sub_category_product()
    {
        return $this->hasMany(Product::class, 'sub_sub_category_id', 'id');
    }

    public function getNameAttribute($name)
    {
        if (strpos(url()->current(), '/admin') || strpos(url()->current(), '/seller')) {
            return $name;
        }

        return $this->translations[0]->value ?? $name;
    }

    public function getDefaultNameAttribute()
    {
        return $this->translations[0]->value ?? $this->name;
    }

    public function scopePriority($query)
    {
        return $query->orderBy('priority', 'asc');
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('translate', function (Builder $builder) {
            $builder->with(['translations' => function ($query) {
                if (strpos(url()->current(), '/api')) {
                    return $query->where('locale', App::getLocale());
                } else {
                    return $query->where('locale', Helpers::default_lang());
                }
            }]);
        });
    }
}
