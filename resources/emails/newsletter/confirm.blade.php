@extends('emails.newsletter.layout')
@section('content')
<br>
<h1 class="title" style="text-align:center">Olá {{ $notifiable->name }}</h1>
<p  style="text-align:center" class="text">
    Estamos quase lá, para confirmar sua inscrição em nossa Newsletter<br /> clique no botão abaixo:<br><br>    
</p>
<p style="text-align:center">
<a href="{!! $confirm_link !!}" target="_blank" title="Confirmar participação" style="padding:15px; font-family:arial; background:#2f4050; color:#f7c25a; text-decoration:none;">
Confirmar participação
</a></p>
<br>
<p  style="text-align:center" class="text">Até breve,<br>Equipe Orlando Libardi</p><p class="text"><br></p>
@endsection

