@component('mail::message')
    Retour de la demande de conge de {{ $details['collaborateur'] }}.

    La demande a été validée pour un congé de {{ $details['nb_jour'] }} jours.

    vu par le {{ Auth::user()->name }}.
    Date de validation: {{ $details['date'] }}.
    {{ config('app.name') }}
@endcomponent
