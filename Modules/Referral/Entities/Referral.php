<?php

namespace Modules\Referral\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Referral\Entities\Referral;
use Illuminate\Support\Str;
class Referral extends Model
{
    protected $fillable = ['id','email'];

    protected $dates = [
      'completed_at'

    ];

    public static function boot()
    {
      parent::boot();

      static::creating(function (Referral $referral) {
        //dd($referral);
          $referral->token = Str::random(50);
      });
    }

}
