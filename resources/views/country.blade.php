@extends('layout.template')
@section('title','Country')

@section('content')
@if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i>Success!</h4>
        {{session('pesan')}}.
    </div>
@endif
    <br><a href="/country/add" class="btn btn-primary btn-sm">Add</a><br><br>
    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" id="datatable">
        <thead>
            <tr>
                <th class="th-sm">No</th>
                <th class="th-sm">Name</th>
                <th class="th-sm">Alpha2 Code</th>
                <th class="th-sm">Alpha3 Code</th>
                <th class="th-sm">Call Code</th>
                <th class="th-sm">Demonym</th>
                <th class="th-sm">Flag</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>

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
@endsection