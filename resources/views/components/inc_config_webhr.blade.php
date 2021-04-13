<div class="col-md-8">
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">CONFIGURATION | Web HR</h3>
    </div>
    <div class="card-body">

      <!-- GET URL -->
      <div class="form-group">
        <label>Config Name</label>

        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-cog"></i></span>
          </div>
          <input type="text" name="config_name" value="" class="form-control" placeholder="Config 1">
        </div>
        <!-- /.input group -->
      </div>
      <!-- /.form group -->
  
      <!-- GET URL -->
      <div class="form-group">
        <label>API Name</label>

        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-laptop"></i></span>
          </div>
          <input type="text" name="api_name" value="" class="form-control" placeholder="SAP-WEB-HR">
        </div>
        <!-- /.input group -->
      </div>
      <!-- /.form group -->

                  <!-- GET URL -->
      <div class="form-group">
        <label>GET URL</label>

        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-globe"></i></span>
          </div>
          <input type="text" name="get_url" value="" class="form-control" placeholder="https://api.webhr.co/api/2/api?">
        </div>
        <!-- /.input group -->
      </div>
      <!-- /.form group -->


      <!-- API ACCESS KEY -->
      <div class="form-group">
        <label>API Access Key (Client ID)</label>

        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-key"></i></span>
          </div>
          <input type="text" name="api_access_key" value="" class="form-control" placeholder="23434245566674">
        </div>
        <!-- /.input group -->
      </div>
      <!-- /.form group -->


      <!-- API ACCESS KEY -->
      <div class="form-group">
        <label>API Access Secret (Private ID)</label>

        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
          </div>
          <input type="text" name="api_access_secret" value="" class="form-control" placeholder="23434245566674">
        </div>
        <!-- /.input group -->
      </div>
      <!-- /.form group -->

      


      <!-- phone mask -->
      <div class="form-group">
        <label>Authorization Code</label>

        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-code"></i></span>
          </div>
          <textarea class="form-control" name="authorization_code" rows="3" placeholder="Authorization Code"></textarea>
        </div>
        <!-- /.input group -->
      </div>
      <!-- /.form group -->


            <!-- API ACCESS KEY -->
            <div class="form-group">
              <label>Scope</label>
      
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <select class="form-control" name="access_type">
                  <option value="full_access">Full Access</option>
                </select>
              </div>
              <!-- /.input group -->
            </div>
            <!-- /.form group -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp; Add Configuration </button>
            </div>



    </div>
    <!-- /.card-body -->
  </div>
</div>