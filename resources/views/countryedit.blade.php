@extends('layout.template')
@section('title','Country')

@section('content')
    
    <form action="/country/update/{{$countries->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <br><br>
        <div class="content">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input name="name" value="{{$countries->name}}" class="form-control" id="nameInput" placeholder="Country Name">
                        <label for="nameInput">Country Name</label>
                        <div class="text-danger">
                            @error('name')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="alpha2_code" value="{{$countries->alpha2_code}}" class="form-control" id="alphacode2Input" placeholder="Alpha2 Code">
                        <label for="alphacode2Input">Alpha2 Code</label>
                        <div class="text-danger">
                            @error('alpha2_code')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="alpha3_code" value="{{$countries->alpha3_code}}" class="form-control" id="alphacode3Input" placeholder="Alpha3 Code">
                        <label for="alphacode3Input">Alpha3 Code</label>
                        <div class="text-danger">
                            @error('alpha3_code')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="calling_code" value="{{$countries->calling_code}}" class="form-control" id="callingcodeInput" placeholder="Calling Code">
                        <label for="callingcodeInput">Calling Code</label>
                        <div class="text-danger">
                            @error('calling_code')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="demonym" value="{{$countries->demonym}}" class="form-control" id="demonymInput" placeholder="Demonym">
                        <label for="demonymInput">Demonym</label>
                        <div class="text-danger">
                            @error('demonym')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="flag" value="{{$countries->flag}}" class="form-control" id="flagInput" placeholder="Flag Link">
                        <label for="flagInput">Flag Link</label>
                        <div class="text-danger">
                            @error('flag')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/country" class="btn btn-primary">Cancel</a>
                </div>
            </div>
        </div>
    </form>

@endsection