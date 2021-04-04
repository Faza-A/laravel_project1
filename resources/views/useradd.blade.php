@extends('layout.template')
@section('title','Create User')




@section('content')
    
<br>

    <form action="/users/insert" method="post" enctype="multipart/form-data" class="row g-3">
        @csrf
        <div class="row g-3">
            <div class="form-group row mb-3">
                <div class="col-md-3">
                  <input type="text" name="first_name" class="form-control" placeholder="First name" aria-label="First name">
                  <div class="text-danger">
                    @error('first_name')
                        {{$message}}
                    @enderror
                  </div>
                </div>
                <div class="col-md-3">
                  <input type="text" name="last_name" class="form-control" placeholder="Last name" aria-label="Last name">
                  <div class="text-danger">
                    @error('last_name')
                        {{$message}}
                    @enderror
                  </div>
                </div>
            </div>
            <div class="form-group row mb-3">
                <div class="col-md-6">
                    <select class="form-select" name="gender" id="inlineFormSelectPref">
                        <option selected>Gender</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                    <div class="text-danger">
                        @error('gender')
                            {{$message}}
                        @enderror
                      </div>
                </div>
            </div>
            <div class="form-group row mb-3">
                <div class="col-md-6">
                  <input type="tel" name="phone_number" class="form-control" placeholder="Phone Number" aria-label="Phone Number" pattern="[0-9]{12}">
                  <div class="text-danger">
                    @error('phone_number')
                        {{$message}}
                    @enderror
                  </div>
                </div>
            </div>
            <div class="form-group row mb-3">
                <div class="col-md-6">
                  <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email">
                  <div class="text-danger">
                    @error('email')
                        {{$message}}
                    @enderror
                  </div>
                </div>
            </div>
            <div class="form-group row mb-3">
                <div class="col-md-6">
                  <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password">
                  <div class="text-danger">
                    @error('password')
                        {{$message}}
                    @enderror
                  </div>
                </div>
            </div>
            <div class="form-group row mb-3">
                <div class="col-md-6">
                  <input type="text" name="country_id" class="form-control" placeholder="Country ID" aria-label="Country ID">
                  <div class="text-danger">
                    @error('country_id')
                        {{$message}}
                    @enderror
                  </div>
                </div>
            </div>
            <div class="form-group row mb-3">
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/users" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </div>
    </form>

@endsection