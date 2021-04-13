<div class="col-md-8">
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">SAP | <small>Financial Service Update</small></h3>
    </div>
    <div class="card-body">



<!--////////////////////////// FORM STARTS //////////////////////////-->

<!--##### SAP FINANCIAL SERVICES FORM #####-->
<form method="post" action="{{ url('sap_financial_services/'.$sap_financial_services[0]->pid_fsrv) }}"  enctype="multipart/form-data">
    @csrf
    @method('patch')
  

<!--##### SELECT FINANCIAL SYSTEM NAME #####-->


<!--##### TEXT FINANCIAL SERVICE NAME #####-->
@component('form.text')
    @slot('name') fsrv_name @endslot
    @slot('label') Financial Service Name @endslot
    @slot('value') {{$sap_financial_services[0]->fsrv_name ?? '' }} @endslot
    @slot('placeholder') Service Name @endslot
    @slot('icon') fas fa-file-signature @endslot
    @slot('required') required @endslot
@endcomponent


@component('form.select')
    @slot('name') pid_fsys @endslot
    @slot('label') Financial System | <small>Previous Value:  <b>{{$sap_financial_services[0]->fsys_name ?? '' }}</b> </small> @endslot
    @slot('value') @endslot
    @slot('placeholder')@endslot
    @slot('icon') fas fa-cogs @endslot
    @slot('required') required @endslot
    @slot('options')
        <option value="">- Select Financial System -</option> 
        @foreach($sap_financial_systems as $financial_systems)
            <option value="{{$financial_systems->pid_fsys ?? ''}}">{{$financial_systems->fsys_name ?? '' }}</option> 
        @endforeach
    @endslot
@endcomponent


<!--##### TEXT FINANCIAL SERVICE API ENDPOINT #####-->
@component('form.text')
    @slot('name') fsrv_api_endpoint @endslot
    @slot('label') Financial Service Api Endpoint @endslot
    @slot('value') {{$sap_financial_services[0]->fsrv_api_endpoint ?? '' }} @endslot
    @slot('placeholder') http://test.com/endpoint @endslot
    @slot('icon') fas fa-globe @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXTAREA FINANCIAL SERVICE DESCRIPTION #####-->
@component('form.textarea')
    @slot('name') fsrv_description @endslot
    @slot('label') Financial Service Description @endslot
    @slot('value') {{$sap_financial_services[0]->fsrv_description ?? '' }} @endslot
    @slot('placeholder') Service Description @endslot
    @slot('icon') fas fa-file @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### SUBMIT BUTTON #####-->
@component('form.button')
    @slot('name') Update Financial Service @endslot
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