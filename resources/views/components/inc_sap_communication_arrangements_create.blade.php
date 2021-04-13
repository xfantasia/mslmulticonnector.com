<div class="col-md-8">
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">SAP | <small>Communication Arrangement setup</small></h3>
    </div>
    <div class="card-body">



<!--////////////////////////// FORM STARTS //////////////////////////-->

<!--##### SAP JOURNAL ENTRY CONFIG FORM #####-->
    <form method="post" action="{{ route('sap_communication_arrangements.store') }}"  enctype="multipart/form-data">
        @csrf
    
    
    <!--##### TEXT COMMUNICATION ARRANGEMENT NAME #####-->
    @component('form.text')
        @slot('name') ca_name @endslot
        @slot('label') Communication Arrangement Name @endslot
        @slot('value')@endslot
        @slot('placeholder') Arrangement between A and B @endslot
        @slot('icon') fas fa-file-signature @endslot
        @slot('required') required @endslot
    @endcomponent
    

    <!--##### SELECT COMMUNICATION ARRANGEMENT TYPE #####-->
    @component('form.select')
        @slot('name') config_type @endslot
        @slot('label') Config Type @endslot
        @slot('value')@endslot
        @slot('placeholder') Type of Communication Arrangement @endslot
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
        @slot('value')@endslot
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
        @slot('value')@endslot
        @slot('placeholder') http://test.com/tenant @endslot
        @slot('icon') fas fa-globe @endslot
        @slot('required') required @endslot
    @endcomponent
    
    
    
    <!--##### TEXT COMMUNICATION ARRANGEMENT USERNAME #####-->
    @component('form.text')
        @slot('name') ca_username @endslot
        @slot('label')  USERNAME <small>(Communication Arrangement)</small>  @endslot
        @slot('value')@endslot
        @slot('placeholder') Johnny @endslot
        @slot('icon') fas fa-user @endslot
        @slot('required') required @endslot
    @endcomponent

    
    <!--##### PASSWORD COMMUNICATION ARRANGEMENT PASSWORD #####-->
    @component('form.password')
        @slot('name') ca_password @endslot
        @slot('label')  PASSWORD <small>(Communication Arrangement)</small>  @endslot
        @slot('value')@endslot
        @slot('placeholder')@endslot
        @slot('icon') fas fa-lock @endslot
        @slot('required') required @endslot
    @endcomponent


    <!--##### TEXTAREA COMMUNICATION ARRANGEMENT DESCRIPTION #####-->
    @component('form.textarea')
        @slot('name') ca_description @endslot
        @slot('label') Communication Arrangement Description @endslot
        @slot('value')@endslot
        @slot('placeholder') Connector Description @endslot
        @slot('icon') fas fa-bullhorn @endslot
        @slot('required') required @endslot
    @endcomponent
    
    
    <!--##### SUBMIT BUTTON #####-->
    @component('form.button')
        @slot('name') Add Communication Arrangement @endslot
        @slot('value') buttonx @endslot
        @slot('color') primary @endslot
        @slot('icon') fas fa-plus @endslot
    @endcomponent
    
    
    </form>
<!--////////////////////////// FORM ENDS //////////////////////////-->



    </div>
    <!-- /.card-body -->
  </div>
</div>