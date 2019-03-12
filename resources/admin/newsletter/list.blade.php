<div class="col-md-8">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Listas Cadastradas</h5>
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
                                <td>Noma da lista / Descrição</td>
                                <td>Embed de formulário:</td>
                                <td width="200">Criada em</td>
                                <td width="100">Total Inscritos</td>
                                <td width="90">Ad. Inscritos</td>
                                <td width="50">Exportar</td>
                                <td width="50">Editar</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($newsletters as $list)
                                <tr>
                                    <td><input type="checkbox" name="exclude" value="{{ $list->id }}"> </td>
                                    <td>{{ $list->title }}<br />{{ $list->description }}</td>
                                    <td>
                                    &#123;&#33;&#33; OlCmsNewsletter::form&#40;{{$list->id}}&#41; &#33;&#33;&#125;
                                    </td>
                                    <td>{{ $list->created_at }}</td>
                                    <td class="text-center">
                                        @include('admin.includes.count', [ 'count' =>  count( $list->registereds ) ])
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('newsletter-users.index', ['id' => $list->id]) }}" class="btn btn-primary btn-sm" title="Adicionar novos escritos nessa lista?"><i class="fa fa-plus"></i></a>
                                    </td>
                                    <td class="text-center">
                                        @if (count( $list->registereds ) > 0)
                                        <a href="{{ route('newsletter-download', ['id' => $list->id] ) }}" target="_blank" class="btn btn-info btn-sm" title="Exportar lista em formato CSV?"><i class="fa fa-file-excel-o"></i></a>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('newsletters.edit', ['id' => $list->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                    </td>
                                    
                                </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-info text-center">
                                    <br /><br /><h3> Nenhum resultado encontrado! </h3><br />
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
