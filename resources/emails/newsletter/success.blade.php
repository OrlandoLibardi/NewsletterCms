@extends('emails.newsletter.layout')
@section('content')
<h1 class="title"><br></h1><h1 class="title">Olá {{ $notifiable->name }}</h1><p><br></p>
<p class="text">
    Parabéns, sua inscrição em nossa newsletter foi concluída com sucesso. <br>
    Em breve você receberá conteúdos exclusivos para inscritos.</p><p class="text"><br>
</p>
<p class="text">Até breve,<br>Equipe Orlando Libardi</p><p class="text"><br></p>
@endsection

