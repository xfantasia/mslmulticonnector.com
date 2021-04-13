<div class="col-md-8">
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">SAP | <small>Financial Services Details</small></h3>
    </div>
    <div class="card-body">


<!--////////////////////////// DETAILS VIEW STARTS //////////////////////////-->     
      <div class="card">
        <div class="card-header">
    
            <h3 class="card-title">        
                <a href="{{ url()->previous() }}" type="button" class="mr-1 mb-1 btn-primary btn-sm btn sm round">
                    <i class="fas fa-undo"></i>&nbsp; Back
                </a>   | View | <small> Financial Service</small>
            </h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body p-0">
    
          <table class="table table-striped table-responsive">
            <thead>
              <tr>
                <th>FINANCIAL SERVICE DATA</th>
                <th>PARAMETER </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="color:gray;"><b>Financial Service </b></td>
                <td>{{ $sap_financial_services[0]->fsrv_name ?? '' }}</td>
              </tr>
              <tr>
                <td style="color:gray;"><b>Financial System </b></td>
                <td>{{ $sap_financial_services[0]->fsys_name ?? '' }}</td>
              </tr>
              <tr>
                <td style="color:gray;"><b>API Endpoint </b></td>
                <td>{{ $sap_financial_services[0]->fsrv_api_endpoint ?? '' }}</td>
              </tr>
              <tr>
                <td style="color:gray;"><b>Description </b></td>
                <td>{{ $sap_financial_services[0]->fsrv_description ?? '' }}</td>
              </tr>
    
    
              <tr>
                <td style="color:gray;"><b>Created</b></td>
                <td>{{ $sap_financial_services[0]->created_at ?? '' }}</td>
              </tr>
    
              <tr>
                <td style="color:gray;"><b>Last Updated</b></td>
                <td>{{ $sap_financial_services[0]->updated_at ?? '' }}</td>
              </tr>
            </tbody>
          </table>
    
          <form method="post" action="{{ url('sap_financial_services/'.$sap_financial_services[0]->pid_fsrv.'/edit') }}"  enctype="multipart/form-data">
            @csrf
            @method('get')
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i>&nbsp; Edit System </button>
                </div>
          </form>
    
        </div>
        <!-- /.card-body -->
      </div>
 <!--////////////////////////// DETAILS VIEW ENDS //////////////////////////-->     
    
    


    </div>
    <!-- /.card-body -->
  </div>
</div>