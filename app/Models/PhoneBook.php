<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property integer $phone
 * @property string $name
 * @property boolean $is_favorites
 * @property integer $user_id
 * @property User $user
 */
class PhoneBook extends Model
{
    protected $fillable = [
        'phone',
        'name',
        'is_favorites',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Получить номер телефона пользователя в читаемом виде
     * @return string
     */
    function getPhoneNumberAttribute()
    {
        $cleaned = preg_replace('/[^[:digit:]]/', '', $this->phone);
        preg_match('/(\d{1})(\d{3})(\d{3})(\d{4})/', $cleaned, $matches);
        if (!isset($matches[1])) {
            return $this->phone;
        }

        return "{$matches[1]} ({$matches[2]}) {$matches[3]}-{$matches[4]}";
    }

    /**
     * Получение номеров для текущего пользователя
     * @param $query
     * @return mixed
     */
    public function scopeGetUserPhones($query)
    {
        return $query->where('user_id', 1)->orderBy('is_favorites', 'desc');
    }
}
