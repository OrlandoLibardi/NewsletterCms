<div class="col-md-4">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Criar uma lista</h5>
            <div class="ibox-tools">
                <a class="collapse-link"> <i class="fa fa-chevron-up"></i>  </a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="row">
                {!! Form::open( [ 'route' => 'newsletters.store', 'method' => 'POST', 'id' => 'form-list' ] ) !!}
                <div class="col-md-12">
                    <div class="form-group">
                        <label><span class="text-red">*</span> Título da lista</label>
                        {!! Form::text('title', null, ['placeholder' => 'Título da lista','class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label><span class="text-red">*</span> Descrição da lista</label>
                        {!! Form::textarea('description', null, ['placeholder' => 'Descrição da lista', 'class' => 'form-control']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
