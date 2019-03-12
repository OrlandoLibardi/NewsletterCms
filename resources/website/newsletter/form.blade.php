@if(isset($errors))
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif
@endif

@if(isset($success))
    <div class="alert alert-success">
        {{ $success }}
    </div>
@endif

{!! Form::open(['route' => ['newsletter-subscribe'], 'method' => 'POST', 'id' => 'form-newsletter' ] ) !!}

@csrf
{!! Form::hidden('newsletter_id', $list) !!}
{!! Form::text('name', null, ['placeholder' => 'Seu nome...', 'class' => 'form-control']) !!}
{!! Form::text('email', null, ['placeholder' => 'Seu e-mail...', 'class' => 'form-control']) !!}
{!! Form::submit('Enviar') !!}

{!! Form::close() !!}