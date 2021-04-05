@extends('layout.template')
@section('title','User')

@section('content')
@if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i>Success!</h4>
        {{session('pesan')}}.
    </div>
@endif
<br><a href="/users/add" class="btn btn-primary btn-sm">Add</a><br><br>    
<table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" id="datatable">
    <thead>
        <tr>
            <th class="th-sm">No</th>
            <th class="th-sm">First Name</th>
            <th class="th-sm">Last Name</th>
            <th class="th-sm">Email</th>
            <th class="th-sm">Phone Number</th>
            <th class="th-sm">Gender</th>
            <th class="th-sm">Country</th>
            <th class="th-sm">Password</th>
            <th class="th-sm">Created</th>
            <th class="th-sm">Updated</th>
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
            ajax: '/users/json',
            columns:[
                {data: 'id', name: 'id'},
                {data: 'first_name', name: 'first_name'},
                {data: 'last_name', name: 'last_name'},
                {data: 'email', name: 'email'},
                {data: 'phone_number', name: 'phone_number'},
                {data: 'gender', name: 'gender'},
                {data: 'country_id', name: 'country_id'},
                {data: 'password', name: 'password'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'action', name: 'action'}
            ],
            columnDefs:[{
                'targets': 5,
                'data': 'gender',
                'render': function(data, type, row){
                    if(data === 'M'){
                        return "Male";
                    }else{
                        return "Female";
                    }
                }
            },
            {
                'targets': 7,
                'data': 'password',
                'render': function(data, type, row){
                    if(data !== ''){
                        return "********";
                    }
                }
            }]
        });
    });
</script>
@endsection