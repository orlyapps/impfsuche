@component('mail::message')
# Es gibt Impftermine in {{ $city }}

@component('mail::button', ['url' => 'https://www.impfportal-niedersachsen.de/portal/#/appointment/public'])
    Impfportal öffnen
@endcomponent

✌ Florian

@endcomponent
