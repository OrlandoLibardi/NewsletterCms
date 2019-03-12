<div class="col-md-4">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Editar uma lista</h5>
            <div class="ibox-tools">
                <a class="collapse-link"> <i class="fa fa-chevron-up"></i>  </a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="row">
                {!! Form::open( [ 'route' => ['newsletters.update', 'id' => $newsletter->id], 'method' => 'PUT', 'id' => 'form-list' ] ) !!}
                {!! Form::hidden('id', $newsletter->id) !!}
                <div class="col-md-12">
                    <div class="form-group">
                        <label><span class="text-red">*</span> Título da lista</label>
                        {!! Form::text('title', $newsletter->title, ['placeholder' => 'Título da lista','class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label><span class="text-red">*</span> Descrição da lista</label>
                        {!! Form::textarea('description', $newsletter->description, ['placeholder' => 'Descrição da lista','class' => 'form-control']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
