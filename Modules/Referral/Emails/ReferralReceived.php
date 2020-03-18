<?php

namespace Modules\Referral\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use Modules\Referral\Entities\Referral;

class ReferralReceived extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $sender;
     public $referral;

    public function __construct(User $sender, Referral $referral)
    {
        $this->sender  = $sender;
        $this->referral = $referral;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject($this->sender->name . ' has invited you')
        ->view('referral::emails.referrals.received');
    }
}
