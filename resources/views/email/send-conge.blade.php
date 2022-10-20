@component('mail::message')
    {{ $details['subject'] }} de {{ $details['fromEmail'] }}.
    Date d'envoie de demande: {{ $details['date'] }}

    A Monsieur le superviseur {{ $details['recipient'] }},

    Matérnité: {{ $details['maternite'] }}
    Nombre de jour de congé: {{ $details['nb_jour'] }}

    Date de debut de conge: {{ $details['date_debut'] }}
    Date de fin de conge: {{ $details['date_retour'] }}

    Motif:
    {{ $details['motif'] }}




    Veuillez agréer Mosieur, toutes mes salutations les plus distinguées.
    @component('mail::button', ['url' => 'http://127.0.0.1:8000/conges'])
        Voir
    @endcomponent

    {{ config('app.name') }}
@endcomponent
