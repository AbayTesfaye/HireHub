<x-mail::message>
    # Introduction

    Congratulation now you're premium user
    <p>Your purchase details</p>
    <p>plan: {{ $plan }}</p>
    <p>Your plan ends on: {{ $billingEnds }}</p>
    <x-mail::button :url="''">
        Post a Job
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
