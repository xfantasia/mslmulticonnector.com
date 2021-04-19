


<!--##### WEB-HR PAYROLL CONFIG FORM #####-->
<form method="post" action="{{ url('webhr_payroll_config/'.$webhr_payroll_config[0]->pid_config) }}"  enctype="multipart/form-data">
    @csrf
    @method('patch')


<!--##### TEXT CONFIG NAME #####-->
@component('form.text')
    @slot('name') config_name @endslot
    @slot('label') Config Name @endslot
    @slot('value') {{ $webhr_payroll_config[0]->config_name ?? '' }} @endslot
    @slot('placeholder') Config1 @endslot
    @slot('icon') fas fa-cog @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT API NAME #####-->
@component('form.text')
    @slot('name') api_name @endslot
    @slot('label') API Name @endslot
    @slot('value') {{ $webhr_payroll_config[0]->api_name ?? '' }} @endslot
    @slot('placeholder') SAP-WEB-HR @endslot
    @slot('icon') fas fa-laptop @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### SELECT CONFIG TYPE #####-->
@component('form.select')
    @slot('name') config_type @endslot
    @slot('label') Config Type <small>(Previous: <b>{{ $webhr_payroll_config[0]->config_type ?? '' }}</b>  )</small>@endslot
    @slot('value') {{ $webhr_payroll_config[0]->config_type }} @endslot
    @slot('placeholder')@endslot
    @slot('icon') fas fa-cogs @endslot
    @slot('required') required @endslot
        @slot('options')
            <option value="SAP-JOURNAL-ENTRY-WEBHR-PAYROLL">JOURNAL-ENTRY PAYROLL</option>
        @endslot
@endcomponent


<!--##### TEXT GET URL #####-->
@component('form.text')
    @slot('name') get_url @endslot
    @slot('label') GET URL @endslot
    @slot('value'){{ $webhr_payroll_config[0]->get_url ?? '' }}@endslot
    @slot('placeholder') https://api.webhr.co/api/2/api? @endslot
    @slot('icon') fas fa-globe @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT API ACCESS KEY #####-->
@component('form.text')
    @slot('name') api_access_key @endslot
    @slot('label') API Access Key (Client ID) @endslot
    @slot('value'){{ $webhr_payroll_config[0]->api_access_key ?? '' }}@endslot
    @slot('placeholder') 234532335347556889 @endslot
    @slot('icon') fas fa-key @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT API ACCESS SECRET KEY #####-->
@component('form.text')
    @slot('name') api_secret_key @endslot
    @slot('label') API Access Secret (Private ID) @endslot
    @slot('value'){{ $webhr_payroll_config[0]->api_secret_key ?? '' }}@endslot
    @slot('placeholder') 345356567672433495 @endslot
    @slot('icon') fas fa-lock @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXTAREA AUTHORIZATION CODE #####-->
@component('form.textarea')
    @slot('name') authorization_code @endslot
    @slot('label') Authorization Code @endslot
    @slot('value'){{ $webhr_payroll_config[0]->authorization_code ?? '' }}@endslot
    @slot('placeholder') Paste Authorization Code here... @endslot
    @slot('icon') fas fa-code @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### SELECT SCOPE #####-->
@component('form.select')
    @slot('name') scope @endslot
    @slot('label') Scope  <small>(Previous: <b>{{ $webhr_payroll_config[0]->scope ?? '' }}</b>  )</small>@endslot
    @slot('value'){{ $webhr_payroll_config[0]->scope ?? '' }}@endslot
    @slot('placeholder')@endslot
    @slot('icon') fas fa-cube @endslot
    @slot('required') required @endslot
        @slot('options')
            <option value="full_access">Full Access</option>
        @endslot
@endcomponent


<!--##### SUBMIT BUTTON #####-->
@component('form.button')
    @slot('name') Update Configuration @endslot
    @slot('value') buttonx @endslot
    @slot('color') primary @endslot
    @slot('icon') fas fa-edit @endslot
@endcomponent


</form>
