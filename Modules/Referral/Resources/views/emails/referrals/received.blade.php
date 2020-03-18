<h>This is the referral Mail</h>

#{{ $sender->name }} has invited you to NCLTravel

You will get amazing flight discounts.

<a href="{{ route('register',['referral' => $referral->token]) }}">Button</a>
