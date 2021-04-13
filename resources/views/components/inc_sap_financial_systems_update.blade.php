<div class="col-md-8">
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">SAP | <small>Financial System Update</small></h3>
    </div>
    <div class="card-body">



<!--////////////////////////// FORM STARTS //////////////////////////-->

<!--##### SAP-FINANCIAL SYSTEM FORM #####-->
<form method="post" action="{{ url('sap_financial_systems/'.$sap_financial_systems[0]->pid_fsys) }}"  enctype="multipart/form-data">
  @csrf
  @method('patch')

<!--##### TEXT FINANCIAL SYSTEM NAME #####-->
@component('form.text')
  @slot('name') fsys_name @endslot
  @slot('label') Financial System Name @endslot
  @slot('value') {{$sap_financial_systems[0]->fsys_name ?? '' }} @endslot
  @slot('placeholder') System Name @endslot
  @slot('icon') fas fa-file-signature @endslot
  @slot('required') required @endslot
@endcomponent


<!--##### TEXTAREA FINANCIAL SYSTEM DESCRIPTION #####-->
@component('form.textarea')
  @slot('name') fsys_description @endslot
  @slot('label') Financial System Description @endslot
  @slot('value') {{$sap_financial_systems[0]->fsys_description ?? '' }} @endslot
  @slot('placeholder') System Description @endslot
  @slot('icon') fas fa-file @endslot
  @slot('required') required @endslot
@endcomponent


<!--##### SUBMIT BUTTON #####-->
@component('form.button')
  @slot('name') Update Financial System @endslot
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