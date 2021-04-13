<div class="col-md-12">
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">SAP | <small>Communication Components Details</small></h3>
    </div>
    <div class="card-body">


<!--////////////////////////// DETAILS VIEW STARTS //////////////////////////-->     
      <div class="card">
        <div class="card-header">
    
            <h3 class="card-title">        
                <a href="{{ url()->previous() }}" type="button" class="mr-1 mb-1 btn-primary btn-sm btn sm round">
                    <i class="fas fa-undo"></i>&nbsp; Back
                </a>   | View | <small> Details</small>
            </h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body p-0">
    
          <table class="table table-striped table-responsive">
            <thead>
              <tr>
                <th>COMMUNICATION COMPONENT DATA</th>
                <th>PARAMETER </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="color:gray;"><b>Communication Component Name</b></td>
                <td>{{ $sap_communication_components[0]->coco_name ?? '' }}</td>
              </tr>
              <tr>
                <td style="color:gray;"><b>Configuration Type </b></td>
                <td>{{ $sap_communication_components[0]->config_type ?? '' }}</td>
              </tr>
              <tr>
                <td style="color:gray;"><b>Communication Arrangement </b></td>
                <td>{{ $sap_communication_components[0]->ca_namex ?? '' }}</td>
              </tr>
              <tr>
                <td style="color:gray;"><b>Financial Services WSDL URL </b></td>
                <td>{{ $sap_communication_components[0]->financial_services_wsdl_url ?? '' }}</td>
              </tr>
              <tr>
                <td style="color:gray;"><b>Financial Services SFTP URL </b></td>
                <td>{{ $sap_communication_components[0]->financial_services_sftp_url ?? '' }}</td>
              </tr>
              <tr>
                <td style="color:gray;"><b>Description </b></td>
                <td>{{ $sap_communication_components[0]->coco_description ?? '' }}</td>
              </tr>
              <tr>
                <td style="color:gray;"><b>Created</b></td>
                <td>{{ $sap_communication_components[0]->created_at ?? '' }}</td>
              </tr>
    
              <tr>
                <td style="color:gray;"><b>Last Updated</b></td>
                <td>{{ $sap_communication_components[0]->updated_at ?? '' }}</td>
              </tr>
            </tbody>
          </table>
    
          <form method="post" action="{{ url('sap_communication_components/'.$sap_communication_components[0]->pid_coco.'/edit') }}"  enctype="multipart/form-data">
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