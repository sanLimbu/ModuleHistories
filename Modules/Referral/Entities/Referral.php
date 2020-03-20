<?php

namespace Modules\Referral\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Referral\Entities\Referral;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use App\User;

class Referral extends Model
{
    protected $guarded = [];

    protected $dates = [
      'completed_at'

    ];

    public static function boot()
    {
      parent::boot();

      static::creating(function (Referral $referral) {
          $referral->token = Str::random(50);
      });
    }

    public function scopeWhereNotCompleted(Builder $builder)
    {
      return $builder->where('completed', false);
    }

    public function scopeWhereNotFromUser(Builder $builder, ?User $user)
    {
        if(!$user)
        {
          return $builder;
        }
        else {
          return $builder->where('user_id','!=', $user->id);
        }
    }

    public function complete()
    {
      $this->update([
        'completed' => true,
        'completed_at' => now()
      ]);
    }

}
