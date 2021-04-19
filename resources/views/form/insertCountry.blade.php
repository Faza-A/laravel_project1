<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Input Data</h6>
    </div>
    <div class="card-body">
        <form action="/country/insert" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="inputName">Country Name</label>
              <input type="text" name="name" class="form-control" id="inputName" placeholder="">
              <div class="text-danger">
                @error('name')
                    {{$message}}
                @enderror
            </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="inputAlpha2">Alpha Code 2</label>
                  <input type="text" name="alpha2_code" class="form-control" id="inputAlpha2">
                  <div class="text-danger">
                    @error('alpha2_code')
                        {{$message}}
                    @enderror
                </div>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputAlpha3">Alpha Code 3</label>
                  <input name="alpha3_code" type="text" class="form-control" id="inputAlpha3">
                  <div class="text-danger">
                    @error('alpha3_code')
                        {{$message}}
                    @enderror
                </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCallCode">Call Code</label>
                    <input name="calling_code" type="text" class="form-control" id="inputCallCode">
                    <div class="text-danger">
                        @error('calling_code')
                            {{$message}}
                        @enderror
                    </div>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputDemonym">Demonym</label>
                    <input name="demonym" type="text" class="form-control" id="inputDemonym">
                    <div class="text-danger">
                        @error('demonym')
                            {{$message}}
                        @enderror
                    </div>
                  </div>
              </div>
            <div class="form-group">
              <label for="inputFlag">Flag</label>
              <input name="flag" type="text" class="form-control" id="inputFlag" placeholder="Flag Link">
              <div class="text-danger">
                @error('flag')
                    {{$message}}
                @enderror
            </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="/country" class="btn btn-danger">Cancel</a>
          </form>
    </div>
</div>