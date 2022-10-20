@component('mail::message')
    Retour de la demande de conge.

    La demande a été refusé.
    Assigné par {{ $details['recipient'] }}.

    vu par le {{ Auth::user()->name }}.
    Date de validation: {{ $details['date'] }}.
    {{ config('app.name') }}
@endcomponent
