<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>

    <div class="card-body">
        <form action="/users/update/{{$users->id}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputFirstname">First Name</label>
                    <input type="text" name="first_name" class="form-control" id="inputFirstname" value="{{$users->first_name}}">
                    <div class="text-danger">
                        @error('first_name')
                            {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputLastname">Last Name</label>
                    <input name="last_name" type="text" class="form-control" id="inputLastname" value="{{$users->last_name}}">
                        <div class="text-danger">
                            @error('last_name')
                                {{$message}}
                            @enderror
                        </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputGender">Gender</label>
                <select name="gender" id="inputGender" class="form-control">
                    <option selected value="{{$users->gender}}">@if ($users->gender === 'M')
                        Male
                    @else
                        Female
                    @endif</option>
                    @if ($users->gender === 'M')
                        <option value="F">Female</option>
                    @else
                        <option value="M">Male</option>
                    @endif
                </select>
                <div class="text-danger">
                    @error('gender')
                        {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="inputPhone">Phone Number</label>
                <input name="phone_number" type="text" class="form-control" id="inputPhone" placeholder="Ex: 081xxxxxx" value="{{$users->phone_number}}" >
                <div class="text-danger">
                    @error('phone_number')
                        {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="inputCountry">Country</label>
                <input name="country_id" type="text" class="form-control" id="inputPhone" placeholder="0-250" value="{{$users->country_id}}">
                <div class="text-danger">
                    @error('country_id')
                        {{$message}}
                    @enderror
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input name="email" type="email" class="form-control" id="inputEmail" placeholder="" value="{{$users->email}}">
                <div class="text-danger">
                    @error('email')
                        {{$message}}
                    @enderror
                </div>
            </div>

            {{-- <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword">Password</label>
                    <input type="password" name="password" class="form-control" id="inputPassword">
                    <div class="text-danger">
                        @error('password')
                            {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputRePass">Re-Password</label>
                    <input name="c_password" type="password" class="form-control" id="inputRePass">
                        <div class="text-danger">
                            @error('c_password')
                                {{$message}}
                            @enderror
                        </div>
                </div>
            </div> --}}

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="/users" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</div>