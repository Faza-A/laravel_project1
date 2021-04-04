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
        <tbody>
            <?php $no=1; ?>
            @foreach ($countries as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->alpha2_code}}</td>
                    <td>{{$item->alpha3_code}}</td>
                    <td>{{$item->calling_code}}</td>
                    <td>{{$item->demonym}}</td>
                    <td><img src="{{$item->flag}}" alt="" width="80px"></td>
                    <td>
                        <a href="/country/edit/{{$item->id}}" class="btn btn-sm btn-warning">Edit</a>
                        <a onClick="return confirm('Are you sure you want to delete {{$item->name}}?')" href='country/delete/{{$item->id}}' type='button' class='btn btn-sm btn-danger'>Delete</a>
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