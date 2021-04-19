@extends('layouts.template')
@section('title','dashboard')

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
    </div>
@endif
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

<div class="card shadow mb-4">
    <div class="card-header py-3">
<<<<<<< HEAD
        <h6 class="m-0 font-weight-bold text-primary">Users Data <a href="/users/add" class="btn btn-primary float-right">Insert Data</a></h6>

        
=======
        <h6 class="m-0 font-weight-bold text-primary">Users Data</h6>
>>>>>>> c71f797aa1916301a46df910460741df8e13b547
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="datatable" width="99.9%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Country</th>
                        {{-- <th>Password</th>
                        <th>Created</th>
                        <th>Updated</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>        
            </table>
        </div>
<<<<<<< HEAD

    </div>
</div>

=======
    </div>
</div>

{{-- form insert or edit --}}
@if (Request::is('users/*'))
    @include('form.editUser')
@else
    @include('form.insertUser')
@endif

{{-- end form --}}

>>>>>>> c71f797aa1916301a46df910460741df8e13b547
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
                // {data: 'password', name: 'password'},
                // {data: 'created_at', name: 'created_at'},
                // {data: 'updated_at', name: 'updated_at'},
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
            // {
            //     'targets': 7,
            //     'data': 'password',
            //     'render': function(data, type, row){
            //         if(data !== ''){
            //             return "********";
            //         }
            //     }
            // }
            ]
        });
    });
</script>
<script>
    $('#hide-message').show();
    setTimeout(function(){
        $('#hide-message').hide();
    }, 4000);
</script>
@endsection