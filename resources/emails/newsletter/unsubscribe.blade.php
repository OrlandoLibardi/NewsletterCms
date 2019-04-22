@extends('emails.newsletter.layout')
@section('content')
<h1 class="title"><br></h1><h1 class="title">Olá {{ $notifiable->name }}</h1><p><br></p>
<p class="text">
    Sua inscrição para o email  {{ $notifiable->email }}, em nossa newsletter foi cancelada com sucesso. <br>
    Mas lembre-se você pode voltar quando quiser, basta acessar nosso site e inscrever-se novamente!
</p><p class="text"><br></p>
<p class="text">Até breve,<br>Equipe Orlando Libardi</p><p class="text"><br></p>
@endsection

