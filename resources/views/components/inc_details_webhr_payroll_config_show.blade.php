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

      <table class="table table-striped table-responsive table-with-responsive">
        <thead>
          <tr>
            <th>CONFIG-NAME </th>
            <th>PARAMETER </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="color:gray;"><b>Config Name</b></td>
            <td>{{ $webhr_payroll_config[0]->config_name ?? '' }}</td>
          </tr>
          <tr>
            <td style="color:gray;"><b>API Name</b></td>
            <td>{{ $webhr_payroll_config[0]->api_name ?? '' }}</td>
          </tr>
          <tr>
            <td style="color:gray;"><b>GET URL</b></td>
            <td>{{ $webhr_payroll_config[0]->get_url ?? '' }}</td>
          </tr>
          <tr>
            <td style="color:gray;"><b>API Access Key (Client Public ID)</b></td>
            <td>{{ $webhr_payroll_config[0]->api_access_key ?? '' }}</td>
          </tr>
          <tr>
            <td style="color:gray;"><b>API Access Secret (Private ID)</b></td>
            <td>{{ $webhr_payroll_config[0]->api_secret_key ?? '' }}</td>
          </tr>
          <tr>
            <td style="color:gray;"><b>Authorization Code</b></td>
            <td>
                <div style="width: 15%;">
                        {{ $webhr_payroll_config[0]->authorization_code ?? '' }}
                </div>

            </td>
          </tr>
          <tr>
            <td style="color:gray;"><b>Scope</b></td>
            <td>{{ $webhr_payroll_config[0]->scope ?? '' }}</td>
          </tr>

          <tr>
            <td style="color:gray;"><b>Created</b></td>
            <td>{{ $webhr_payroll_config[0]->created_at ?? '' }}</td>
          </tr>

          <tr>
            <td style="color:gray;"><b>Last Updated</b></td>
            <td>{{ $webhr_payroll_config[0]->updated_at ?? '' }}</td>
          </tr>
        </tbody>
      </table>

      <form method="post" action="{{ url('webhr_payroll_config/'.$webhr_payroll_config[0]->pid_config.'/edit') }}"  enctype="multipart/form-data">
        @csrf
        @method('get')
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i>&nbsp; Edit Configuration </button>
            </div>
      </form>

    </div>
    <!-- /.card-body -->
  </div>


