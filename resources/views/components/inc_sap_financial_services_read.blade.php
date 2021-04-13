<div class="col-md-8">
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">SAP | <small>Financial Services </small></h3>
    </div>
    <div class="card-body">

<!--////////////////////////// TABLE STARTS //////////////////////////-->
        <div class="card">

            <div class="card-header">
              <h3 class="card-title">        
                  <a href="{{ url()->previous() }}" type="button" class="mr-1 mb-1 btn-primary btn-sm btn sm round">
                      <i class="fas fa-undo"></i>&nbsp; Back
                  </a>   | View | <small> Financial Services </small>
              </h3>
          </div>
          
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
          
          
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Financial System</th>
                      <th>Financial Services</th>
                      <th>Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
          
          
                  <tbody>
          
                    <?php $sn = 1;  ?>
                    @foreach($sap_financial_services as $financial_services)
                        <tr>
                            <td><?php echo $sn++ ;  ?></td>
                            <td>{{ $financial_services->fsrv_name ?? '' }}</td>
                            <td>{{ $financial_services->fsys_namex ?? '' }}</td>
                            <td>{{ $financial_services->fsrv_description ?? '' }}</td>
                            <td>
                                <!-- ACTIONS STARTS -->
          
                              
                                <div class="row">
          
                                  <div class="col-6 col-sm-3">
                                    <form method="post" action="{{ url('sap_financial_services/'.$financial_services->pid_fsrv) }}"  enctype="multipart/form-data">
                                      @csrf
                                      @method('get')
                                      <button type="submit" name="view" class="btn btn-default btn-sm">
                                        <i class="ion ion-eye"></i>
                                      </button>
                                    </form> 
                                  </div>
          
                                  <div class="col-6 col-sm-3">
                                    <form method="post" action="{{ url('sap_financial_services/'.$financial_services->pid_fsrv.'/edit') }}"  enctype="multipart/form-data">
                                      @csrf
                                      @method('get')
                                      <button type="submit" name="edit" class="btn btn-default btn-sm">
                                        <i class="ion ion-edit"></i>
                                      </button>
                                    </form> 
                                  </div>
          
                                  <div class="col-6 col-sm-3">
                                    <form method="post" action="{{ url('sap_financial_services/'.$financial_services->pid_fsrv) }}"  enctype="multipart/form-data">
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