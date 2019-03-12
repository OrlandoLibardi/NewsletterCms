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
            <li class="active">Listas </li>
        </ol>
    </div>
    <div class="col-md-3 padding-btn-header text-right">

    </div>
</div>
@endsection @section('content')
<div class="row">
    @if(!isset($newsletter))
        @include('admin.newsletter.list', [ 'newsletters' => $newsletters ] )
        @include('admin.newsletter.create')
    @else
        @include('admin.newsletter.edit', [ 'newsletter' => $newsletter ])
    @endif
</div>
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
$("#form-list").OLForm({btn : false, listErrorPosition: 'after', listErrorPositionBlock: '.page-heading', urlRetun : '{{ route("newsletters.index") }}' });
/*Exclude*/
$("#results").OLExclude({'action' : "/admin/newsletters/destroy/", 'inputCheckName' : 'exclude', 'inputCheckAll' : 'excludeAll'});
</script>
@endpush
