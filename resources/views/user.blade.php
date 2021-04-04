@extends('layout.template')
@section('title','Home')

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
    <tbody>
        <?php $no=1; ?>
        @foreach ($users as $item)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$item->first_name}}</td>
                <td>{{$item->last_name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->phone_number}}</td>
                <td>@if ($item->gender === 'M')
                    Male
                @else
                    Female
                @endif</td>
                <td>{{$item->country_id}}</td>
                <td>*****</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
                <td>
                    <a href="/users/edit/{{$item->id}}" class="btn btn-sm btn-warning">Edit</a>
                    <a onClick="return confirm('Are you sure you want to delete {{$item->name}}?')" href='users/delete/{{$item->id}}' type='button' class='btn btn-sm btn-danger'>Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

@section('footer')
<script>
    $(document).ready(function(){
        $('#datatable').DataTable();
    });
</script>
@endsection