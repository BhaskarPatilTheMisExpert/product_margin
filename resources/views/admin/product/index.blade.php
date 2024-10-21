@extends('layouts.admin')
@section('content')
<!-- Start filter -->
<div class="filter searchForm card" style="display:none;">
    <div class="card-body">
        <span class="fltr-cls-action">
            <span class="cls-ico-hldr" id="cancleSearch"><i class="fas fa-times"></i></span>
        </span>
       
    </div>
</div>
<!-- End filter -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1 class="card-title m-0">Product Margin</h1>
        <div class="action-right d-flex">
            <span class="atn-item mr-1">
                <a class="btn btn-primary" href="{{ route('admin.create-product') }}">
                    <i class="fas fa-plus mr-1"></i> Add
                </a>
            </span>
            <!-- <span class="atn-item">
                <a class="filter-btn searchButton btn btn-secondary" href="javascript:void(0)">
                    <i class="fas fa-filter"></i>
                </a>
            </span> -->
        </div>
    </div>
    <div class="card-body">
    @if($products->count())
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Client Name </th>
                        <th>Margin amount</th>
                        <th>Client code </th>
                        <!-- <th width="200px">Reviewer Required</th>
                        <th width="200px">Status</th> -->
                        <th width="50px" class="text-center"> Action </th>
                    </tr>
                </thead>
                <tbody>
                <?php $count = ($products->currentPage() * 10 - 10) + 1; ?>
                    @foreach($products as $product)
                    <tr>
                        <td>
                        {{ $count++; }}
                        </td>
                        <td>
                            {{$product->client_name}}
                        </td>
                        <td>
                        {{$product->margin_amount}}
                        </td>
                        
                        <td>
                        {{$product->client_code}}
                        </td>
                        <!-- <td>
                        </td>
                        <td> -->
                        </td>
                        <td class="text-center">
                        <a class="fas fa-edit align-middle text-success" style="font-size:small;" href="{{ route('admin.editProduct', $product->id) }}"></a>
                         <a class="fas fa-trash-alt align-middle text-dark" style="font-size:small;color: grey;" href="{{ route('admin.destroyProduct',$product->id) }}" title="Delete" onclick="return confirm('Are you sure you want to delete this record?');"></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div style="background-color:#d1e6e3;margin:auto;padding:10px" class="card text-center col-12">
            <b>No Records Found</b>
        </div>
        @endif
        <div class="d-flex justify-content-end">
            {!! $products->appends(Request::except('page'))->links('pagination::bootstrap-4') !!}

        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
 
</script>
@endsection