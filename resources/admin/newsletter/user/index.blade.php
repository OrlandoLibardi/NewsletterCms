@extends('admin.layout.admin') @section( 'breadcrumbs' )
<!-- breadcrumbs -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Newsletter</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/admin">Paínel de controle</a>
            </li>
            <li>Newsletter </li>
            <li><a href="{{ route('newsletters.index') }}">Listas</a> </li>
            <li class="active">Inscritos </li>
        </ol>
    </div>
    <div class="col-md-3 padding-btn-header text-right">
        <a href="{{ route('newsletters.index') }}" class="btn btn-sm btn-warning">Voltar</a>

    </div>
</div>
@endsection @section('content')
<div class="row">
    <div class="col-md-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Adicionar usuário a lista</h5>
                <div class="ibox-tools">
                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i>  </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info">
                            <h4>* Os usuários cadastrados por este formulário serão confirmados automaticamente.</h4>
                        </div>
                    </div>
                    {!! Form::open( [ 'route' => 'newsletter-users.store', 'method' => 'POST', 'id' => 'form-user' ] ) !!}
                    {!! Form::hidden('newsletter_id', $newsletter->id) !!}
                    {!! Form::hidden('status', 1) !!}
                    <div class="col-md-5"><div class="form-group">
                        <label> Nome</label>
                        {!! Form::text('name', null, ['placeholder' => 'Nome do inscrito','class' => 'form-control']) !!}
                    </div></div>
                    <div class="col-md-6"><div class="form-group">
                        <label><span class="text-red">*</span> E-mail</label>
                        {!! Form::text('email', null, ['placeholder' => 'Email do inscrito','class' => 'form-control']) !!}
                    </div></div>
                    
                    <div class="col-md-1" style="padding-top:24px;">
                        <button name="saveUser" class="btn btn-primary btn-md" type="submit">Salvar</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Usuários na lista</h5>
                <div class="ibox-tools">
                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i>  </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">

                    <div class="col-md-12">
                        <table class="table table-bordered table-striped" id="results">

                            <thead>
                                <tr>
                                    <td width="10"><input type="checkbox" name="excludeAll"></td>
                                    <td width="200">Nome</td>
                                    <td>Email</td>
                                    <td>Status</td>
                                    <td width="130">Cadastrado em:</td>
                                </tr>
                            </thead>
                            <tbody>
                                @if ( count($newsletter->registereds) > 0 )
                                @foreach($newsletter->registereds  as $user)
                                <tr>
                                    <td><input type="checkbox" name="exclude" value="{{ $user->id }}"> </td>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        {{ $user->status }}
                                    </td>
                                    <td>
                                      {{ $user->created_at }}
                                    </td>
                                    <tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="8" class="text-info text-center">
                                                <br /><br /><h3> Nenhum resultado encontrado! </h3><br />
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>

                                </table>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Detalhes dessa lista</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link"> <i class="fa fa-chevron-up"></i>  </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <td width="50%" class="text-right">Nome da lista</td>
                                        <td>{{ $newsletter->title }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Descrição da lista</td>
                                        <td>{{ $newsletter->description }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Criada em:</td>
                                        <td>{{ $newsletter->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Ataulizada em:</td>
                                        <td>{{ $newsletter->updated_at }}</td>
                                    </tr>
                                </table>
                                <a href="{{ route('newsletter-download', ['id' => $newsletter->id] ) }}" class="btn btn-block btn-primary" target="_download">Exportar Lista</a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Usage</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link"> <i class="fa fa-chevron-up"></i>  </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <td width="50%" class="text-right">Incorporar Formulário:</td>
                                        <td>
                                        &#123;&#33;&#33; OlCmsNewsletter::form&#40;{{$newsletter->id}}&#41; &#33;&#33;&#125; 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Link para unsubscribe</td>
                                        <td>
                                            {{ Route('newsletter-unsubscribe')}}?email=teste@teste.com.br 
                                        </td>
                                    </tr>
                                    
                                </table>
                                
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        {!! Form::hidden('route_destroy', Route('newsletter-users.destroy', ['id' => 1] ) ) !!}
        {!! Form::hidden('route_return', Route('newsletter-users.index', [ "id" => $newsletter->id ]) ) !!}
        @endsection
        @push('style')
        <link rel="stylesheet" href="{{ asset('assets/theme-admin/css/plugins/OLForm/OLForm.css') }}">
        @endpush
        @push('script')
        <script src="{{ asset('assets/theme-admin/js/plugins/OLForm/OLForm.jquery.js') }}"></script>
        <!-- exclude -->
        <script src="{{ asset('assets/theme-admin/js/plugins/OLForm/OLExclude.jquery.js') }}"></script>
        <script>
        /* Formulário */
        $("#form-user").OLForm({
            btn : true, 
            listErrorPosition: 'after', 
            listErrorPositionBlock: '.page-heading', 
            urlRetun : $("input[name=route_return]").val() 
        });
        /*Exclude*/
        $("#results").OLExclude({
            'action' : $("input[name=route_destroy]").val(), 
            'inputCheckName' : 'exclude', 
            'inputCheckAll' : 'excludeAll'
        });
        </script>
        @endpush
