<div class="col-md-12">
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">SAP | <small> Communication Components</small></h3>
    </div>
    <div class="card-body">

<!--////////////////////////// TABLE STARTS //////////////////////////-->
        <div class="card">

            <div class="card-header">
              <h3 class="card-title">        
                  <a href="{{ url()->previous() }}" type="button" class="mr-1 mb-1 btn-primary btn-sm btn sm round">
                      <i class="fas fa-undo"></i>&nbsp; Back
                  </a>   | View | <small> Communication Components</small>
              </h3>
          </div>
          
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped table-responsive">
          
          
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Communication Component </th>
                      <th>Config Type</th>
                      <th>Communication Arrangement</th>
                      <th>Financial Service URL</th>
                      <th>Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
          
          
                  <tbody>
          
                    <?php $sn = 1;  ?>
                    @foreach($sap_communication_components as $communication_component)
                        <tr>
                            <td><?php echo $sn++ ;  ?></td>
                            <td>{{ $communication_component->coco_name ?? '' }}</td>
                            <td>{{ $communication_component->config_type ?? '' }}</td>
                            <td>{{ $communication_component->ca_namex ?? '' }}</td>
                            <td>
                                <b>WSDL-URL: </b>{{ $communication_component->financial_services_wsdl_url ?? '' }}<br>
                                <b>SFTP-URL: </b>{{ $communication_component->financial_services_sftp_url ?? '' }}
                            </td>
                            <td>{{ $communication_component->coco_description ?? '' }}</td>
                            <td>
                                <!-- ACTIONS STARTS -->
          
                              
                                <div class="row">
          
                                  <div class="col-6 col-sm-3">
                                    <form method="post" action="{{ url('sap_communication_components/'.$communication_component->pid_coco) }}"  enctype="multipart/form-data">
                                      @csrf
                                      @method('get')
                                      <button type="submit" name="view" class="btn btn-default btn-sm">
                                        <i class="ion ion-eye"></i>
                                      </button>
                                    </form> 
                                  </div>
          
                                  <div class="col-6 col-sm-3">
                                    <form method="post" action="{{ url('sap_communication_components/'.$communication_component->pid_coco.'/edit') }}"  enctype="multipart/form-data">
                                      @csrf
                                      @method('get')
                                      <button type="submit" name="edit" class="btn btn-default btn-sm">
                                        <i class="ion ion-edit"></i>
                                      </button>
                                    </form> 
                                  </div>
          
                                  <div class="col-6 col-sm-3">
                                    <form method="post" action="{{ url('sap_communication_components/'.$communication_component->pid_coco) }}"  enctype="multipart/form-data">
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
            <!--////////////////////////// TABLE ENDS //////////////////////////-->


    </div>
    <!-- /.card-body -->
  </div>
</div>