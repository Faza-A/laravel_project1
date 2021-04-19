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