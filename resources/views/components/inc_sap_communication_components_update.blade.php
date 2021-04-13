<div class="col-md-8">
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">SAP | <small>Create Communication Components </small></h3>
    </div>
    <div class="card-body">



<!--////////////////////////// FORM STARTS //////////////////////////-->

<!--##### SAP COMMUNICATION COMPONENT FORM #####-->
<form method="post" action="{{ url('sap_communication_components/'.$sap_communication_components[0]->pid_coco) }}"  enctype="multipart/form-data">
    @csrf
    @method('patch')


<!--##### TEXT CONFIG COMPONENT NAME #####-->
@component('form.text')
    @slot('name') coco_name @endslot
    @slot('label') Commuincation Component Name @endslot
    @slot('value') {{$sap_communication_components[0]->coco_name ?? '' }} @endslot
    @slot('placeholder')  @endslot
    @slot('icon') fas fa-tag @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### SELECT COMMUNICATION ARRANGEMENT TYPE #####-->
@component('form.select')
    @slot('name') config_type @endslot
    @slot('label') Config Type <br><small>Previous Selection: <b>{{$sap_communication_components[0]->config_type ?? '' }}</b></small>@endslot
    @slot('value') {{$sap_communication_components[0]->config_type ?? '' }} @endslot
    @slot('placeholder') Type of Communication Arrangement @endslot
    @slot('icon') fas fa-cogs @endslot
    @slot('required') required @endslot
        @slot('options')
            <option value="SAP-JOURNAL-ENTRY-WEBHR-PAYROLL">JOURNAL-ENTRY PAYROLL</option> 
        @endslot
@endcomponent


<!--##### SELECT COMMUNICATION ARRANGEMENT #####-->
@component('form.select')
    @slot('name') pid_ca @endslot
    @slot('label') Communication Arrangement <br><small>Previous Selection: <b>{{$sap_communication_components[0]->ca_namex ?? '' }}</b></small> @endslot
    @slot('value') {{$sap_communication_components[0]->pid_ca ?? '' }} @endslot
    @slot('placeholder')@endslot
    @slot('icon') fas fa-handshake @endslot
    @slot('required') required @endslot
    @slot('options')
        <option value="">- Select Communication Arrangement-</option> 
        @foreach($sap_communication_arrangements as $communication_arrangement)
            <option value="{{$communication_arrangement->pid_ca ?? ''}}">{{$communication_arrangement->ca_name ?? '' }}</option> 
        @endforeach
    @endslot
@endcomponent
    
    
<!--##### TEXT FINANCIAL SERVICES WSDL URL #####-->
@component('form.text')
    @slot('name') financial_services_wsdl_url @endslot
    @slot('label') Financial Services WSDL Url @endslot
    @slot('value') {{$sap_communication_components[0]->financial_services_wsdl_url ?? '' }} @endslot
    @slot('placeholder') http://test.com/wsdl @endslot
    @slot('icon') fas fa-globe @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT FINANCIAL SERVICES SFTP URL #####-->
@component('form.text')
    @slot('name') financial_services_sftp_url @endslot
    @slot('label') Financial Services Sftp Url @endslot
    @slot('value') {{$sap_communication_components[0]->financial_services_sftp_url ?? '' }} @endslot
    @slot('placeholder') http://test.com/stfp @endslot
    @slot('icon') fas fa-globe @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT COMMUNICATION COMPONENT DESCRIPTION #####-->
@component('form.textarea')
    @slot('name') coco_description @endslot
    @slot('label') Communication Component Description @endslot
    @slot('value') {{$sap_communication_components[0]->coco_description ?? '' }} @endslot
    @slot('placeholder') Communication between A and B @endslot
    @slot('icon') fas fa-file @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### SUBMIT BUTTON #####-->
@component('form.button')
    @slot('name') Update Communication Component @endslot
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