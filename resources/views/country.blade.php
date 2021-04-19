@extends('layouts.template')
@section('title','Country')

@section('content')

@if (\Session::has('update'))
    <div class="alert alert-success" id="hide-message" role="alert">
        Data updated!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (\Session::has('tambah'))
    <div class="alert alert-success" id="hide-message" role="alert">
        Data saved!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(\Session::has('delete'))
    <div class="alert alert-danger" id="hide-message" role="alert">
        Data deleted!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
<<<<<<< HEAD
=======
    </div>
@endif


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Countries</h6>
>>>>>>> c71f797aa1916301a46df910460741df8e13b547
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="datatable" width="99.9%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Alpha2 Code</th>
                        <th>Alpha3 Code</th>
                        <th>Call Code</th>
                        <th>Demonym</th>
                        <th>Flag</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
{{-- form insert or edit --}}
@if (Request::is('country/*'))
    @include('form.editCountry')
@else
    @include('form.insertCountry')
@endif

<<<<<<< HEAD

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Countries <a href="/country/add" class="btn btn-primary float-right">Insert Data</a></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="datatable" width="99.9%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Alpha2 Code</th>
                        <th>Alpha3 Code</th>
                        <th>Call Code</th>
                        <th>Demonym</th>
                        <th>Flag</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
=======
{{-- end form --}}
>>>>>>> c71f797aa1916301a46df910460741df8e13b547
@endsection
@section('footer')
    <script>
        $(document).ready(function(){
            $('#datatable').DataTable( {
                processing:true,
                serverSide:true,
                ajax: '/country/json',
                columns:[
                    {data: 'id', name:'id'},
                    {data: 'name', name:'name'},
                    {data: 'alpha2_code', name: 'alpha2_code'},
                    {data: 'alpha3_code', name: 'alpha3_code'},
                    {data: 'calling_code', name: 'calling_code'},
                    {data: 'demonym', name: 'demonym'},
                    {data: 'flag', name: 'flag'},
                    {data: 'action', name: 'action', orderable: false}
                ],
                columnDefs:[{
                        'targets': 6,
                        'data': 'flag',
                        'render': function(data, type, row, meta){
                            return '<img src="' + data + '" alt="' + data + '"width="80px"/>';
                    }
                }]
            } );
        });
    </script>
    <script>
        $('#hide-message').show();
        setTimeout(function(){
            $('#hide-message').hide();
        }, 4000);
    </script>
@endsection