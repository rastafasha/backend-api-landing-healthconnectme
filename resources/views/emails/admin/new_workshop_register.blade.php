@component('mail::message')
# Hola
<br>
Se has registrado un nuevo usuario para el registro app Health Connect
<br><br>

<br>
* Nombre ***{{ $rlanding->nombre}}*** ***{{ $rlanding->apellido}}***
<br>
* Email ***{{ $rlanding->email}}***

<br><br>
@component('mail::button', [
    'url' => env('https://www.healt-connect.me/admin/')
])
    Ir a la web
@endcomponent

Notificaciones automatizadas desde la app
***{{ config('app.name') }}***
@endcomponent
