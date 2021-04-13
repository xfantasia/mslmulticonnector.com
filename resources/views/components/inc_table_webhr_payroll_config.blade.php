<div class="card">

  <div class="card-header">
    <h3 class="card-title">        
        <a href="{{ url()->previous() }}" type="button" class="mr-1 mb-1 btn-primary btn-sm btn sm round">
            <i class="fas fa-undo"></i>&nbsp; Back
        </a>   | View | <small> Configurations</small>
    </h3>
</div>

    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table table-striped table-responsive">


        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Config Name</th>
            <th>API Name</th>
            <th style="">API Access Key</th>
            <th>Connect</th>
            <th>Actions</th>
          </tr>
        </thead>


        <tbody>

          <?php $sn = 1;  ?>
          @foreach($webhr_payroll_config as $payroll_config)
              <tr>
                  <td><?php echo $sn++ ;  ?></td>
                  <td>{{ $payroll_config->config_name ?? '' }}</td>
                  <td>{{ $payroll_config->api_name ?? '' }}</td>
                  <td>{{ $payroll_config->api_access_key ?? '' }}</td>
                    <td>
                      <form method="post" action="{{ route('webhr_payroll_config_test') }}"  enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="pid_config" value="{{ $payroll_config->pid_config }}">

                        <button type="submit" name="test_connection" class="btn xs btn-primary">
                          <i class="ion ion-play"></i> Test Connection 
                        </button>
                      </form>
                    </td>
                  <td>
                      <!-- ACTIONS STARTS -->

                    
                      <div class="row">

                        <div class="col-6 col-sm-3">
                          <form method="post" action="{{ url('webhr_payroll_config/'.$payroll_config->pid_config) }}"  enctype="multipart/form-data">
                            @csrf
                            @method('get')
                            <button type="submit" name="view" class="btn btn-default btn-sm">
                              <i class="ion ion-eye"></i>
                            </button>
                          </form> 
                        </div>

                        <div class="col-6 col-sm-3">
                          <form method="post" action="{{ url('webhr_payroll_config/'.$payroll_config->pid_config.'/edit') }}"  enctype="multipart/form-data">
                            @csrf
                            @method('get')
                            <button type="submit" name="edit" class="btn btn-default btn-sm">
                              <i class="ion ion-edit"></i>
                            </button>
                          </form> 
                        </div>

                        <div class="col-6 col-sm-3">
                          <form method="post" action="{{ url('webhr_payroll_config/'.$payroll_config->pid_config) }}"  enctype="multipart/form-data">
                            @csrf
                            @method('delete')
                            <button type="submit" name="delete" class="btn btn-default btn-sm primary">
                              <i class="ion ion-close"></i>
                            </button>
                            <input type="checkbox" name="delete" required>
                          </form> 
                        </div>

                      </div>

                  </td>
              </tr>
          @endforeach

        </tbody>


      </table>
    </div>
    <!-- /.card-body -->
  </div>