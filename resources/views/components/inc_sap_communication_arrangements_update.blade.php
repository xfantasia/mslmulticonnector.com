<div class="col-md-8">
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">SAP | <small>Update Communication Arrangement setup</small></h3>
    </div>
    <div class="card-body">



<!--////////////////////////// FORM STARTS //////////////////////////-->

<!--##### SAP JOURNAL ENTRY CONFIG FORM #####-->
<form method="post" action="{{ url('sap_communication_arrangements/'.$sap_communication_arrangements[0]->pid_ca) }}"  enctype="multipart/form-data">
    @csrf
    @method('patch')
    
    
    <!--##### TEXT COMMUNICATION ARRANGEMENT NAME #####-->
    @component('form.text')
        @slot('name') ca_name @endslot
        @slot('label') Communication Arrangement Name @endslot
        @slot('value') {{$sap_communication_arrangements[0]->ca_name ?? '' }} @endslot
        @slot('placeholder') Arrangement between A and B @endslot
        @slot('icon') fas fa-file-signature @endslot
        @slot('required') required @endslot
    @endcomponent
    
    
    <!--##### SELECT COMMUNICATION ARRANGEMENT TYPE #####-->
    @component('form.select')
        @slot('name') config_type @endslot
        @slot('label') Config Type @endslot
        @slot('value'){{$sap_communication_arrangements[0]->config_type ?? '' }}@endslot
        @slot('icon') fas fa-cogs @endslot
        @slot('required') required @endslot
        @slot('options')
            <option value="SAP-JOURNAL-ENTRY-WEBHR-PAYROLL">JOURNAL-ENTRY PAYROLL</option> 
        @endslot
    @endcomponent

    
    <!--##### SELECT FINANCIAL SERVICES #####-->
    @component('form.select')
        @slot('name') pid_fsrv @endslot
        @slot('label') Financial Service @endslot
        @slot('value'){{$financial_services->pid_fsrv ?? ''}}@endslot
        @slot('placeholder')@endslot
        @slot('icon') fas fa-cogs @endslot
        @slot('required') required @endslot
        @slot('options')
            <option value="">- Select Financial Service -</option> 
            @foreach($sap_financial_services as $financial_services)
                <option value="{{$financial_services->pid_fsrv ?? ''}}">{{$financial_services->fsrv_name ?? '' }}</option> 
            @endforeach
        @endslot
    @endcomponent
    
    
    <!--##### TEXT COMMUNICATION ARRANGEMENT TENANT URL #####-->
    @component('form.text')
        @slot('name') ca_tenant_url @endslot
        @slot('label') Communication Arrangement Tenant Url @endslot
        @slot('value') {{$sap_communication_arrangements[0]->ca_tenant_url ?? '' }} @endslot
        @slot('placeholder') http://test.com/tenant @endslot
        @slot('icon') fas fa-internet-explorer @endslot
        @slot('required') required @endslot
    @endcomponent
    
    
    
    <!--##### TEXT COMMUNICATION ARRANGEMENT USERNAME #####-->
    @component('form.text')
        @slot('name') ca_username @endslot
        @slot('label') USERNAME <small>(Communication Arrangement)</small> @endslot
        @slot('value') {{$sap_communication_arrangements[0]->ca_username ?? '' }} @endslot
        @slot('placeholder') Johnny @endslot
        @slot('icon') fas fa-user @endslot
        @slot('required') required @endslot
    @endcomponent

    
    <!--##### PASSWORD COMMUNICATION ARRANGEMENT PASSWORD #####-->
    @component('form.password')
        @slot('name') ca_password @endslot
        @slot('label') PASSWORD <small>(Communication Arrangement)</small> @endslot
        @slot('value') {{$sap_communication_arrangements[0]->ca_password ?? '' }} @endslot
        @slot('placeholder') password123 @endslot
        @slot('icon') fas fa-lock @endslot
        @slot('required') required @endslot
    @endcomponent


    <!--##### TEXTAREA COMMUNICATION ARRANGEMENT DESCRIPTION #####-->
    @component('form.textarea')
        @slot('name') ca_description @endslot
        @slot('label') Communication Arrangement Description @endslot
        @slot('value') {{$sap_communication_arrangements[0]->ca_description ?? '' }} @endslot
        @slot('placeholder') Connector Description @endslot
        @slot('icon') fas fa-bullhorn @endslot
        @slot('required') required @endslot
    @endcomponent
    
    
    <!--##### SUBMIT BUTTON #####-->
    @component('form.button')
        @slot('name') Update Communication Arrangement @endslot
        @slot('value') buttonx @endslot
        @slot('color') primary @endslot
        @slot('icon') fas fa-edit @endslot
    @endcomponent
    
    
    </form>
<!--////////////////////////// FORM ENDS //////////////////////////-->



    </div>
    <!-- /.card-body -->
  </div>
</div>