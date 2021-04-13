<div class="col-md-8">
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">SAP | <small>Financial Service setup</small></h3>
    </div>
    <div class="card-body">



<!--////////////////////////// FORM STARTS //////////////////////////-->

<!--##### SAP FINANCIAL SERVICES FORM #####-->
<form method="post" action="{{ route('sap_financial_services.store') }}"  enctype="multipart/form-data">
    @csrf

<!--##### SELECT FINANCIAL SYSTEM NAME #####-->


<!--##### TEXT FINANCIAL SERVICE NAME #####-->
@component('form.text')
    @slot('name') fsrv_name @endslot
    @slot('label') Financial Service Name @endslot
    @slot('value')@endslot
    @slot('placeholder') Service Name @endslot
    @slot('icon') fas fa-file-signature @endslot
    @slot('required') required @endslot
@endcomponent


@component('form.select')
    @slot('name') pid_fsys @endslot
    @slot('label') Financial System @endslot
    @slot('value')@endslot
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
    @slot('value')@endslot
    @slot('placeholder') http://test.com/endpoint @endslot
    @slot('icon') fas fa-globe @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXTAREA FINANCIAL SERVICE DESCRIPTION #####-->
@component('form.textarea')
    @slot('name') fsrv_description @endslot
    @slot('label') Financial Service Description @endslot
    @slot('value')@endslot
    @slot('placeholder') Service Description @endslot
    @slot('icon') fas fa-file @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### SUBMIT BUTTON #####-->
@component('form.button')
    @slot('name') Add Financial Service @endslot
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