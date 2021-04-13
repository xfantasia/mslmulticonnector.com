


<!--##### WEB-HR PAYROLL CONFIG FORM #####-->
<form method="post" action="{{ route('webhr_payroll_config.store') }}"  enctype="multipart/form-data">
    @csrf


<!--##### TEXT CONFIG NAME #####-->
@component('form.text')
    @slot('name') config_name @endslot
    @slot('label') Config Name @endslot
    @slot('value')@endslot
    @slot('placeholder') Config1 @endslot
    @slot('icon') fas fa-cog @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT API NAME #####-->
@component('form.text')
    @slot('name') api_name @endslot
    @slot('label') API Name @endslot
    @slot('value')@endslot
    @slot('placeholder') SAP-WEB-HR @endslot
    @slot('icon') fas fa-laptop @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### SELECT CONFIG TYPE #####-->
@component('form.select')
    @slot('name') config_type @endslot
    @slot('label') Config Type @endslot
    @slot('value')@endslot
    @slot('placeholder')@endslot
    @slot('icon') fas fa-cogs @endslot
    @slot('required') required @endslot
        @slot('options')
            <option value="typeA">Type A</option> 
            <option value="typeB">Type B</option> 
        @endslot
@endcomponent


<!--##### TEXT GET URL #####-->
@component('form.text')
    @slot('name') get_url @endslot
    @slot('label') GET URL @endslot
    @slot('value')@endslot
    @slot('placeholder') https://api.webhr.co/api/2/api? @endslot
    @slot('icon') fas fa-globe @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT API ACCESS KEY #####-->
@component('form.text')
    @slot('name') api_access_key @endslot
    @slot('label') API Access Key (Client ID) @endslot
    @slot('value')@endslot
    @slot('placeholder') 234532335347556889 @endslot
    @slot('icon') fas fa-key @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT API ACCESS SECRET KEY #####-->
@component('form.text')
    @slot('name') api_secret_key @endslot
    @slot('label') API Access Secret (Private ID) @endslot
    @slot('value')@endslot
    @slot('placeholder') 345356567672433495 @endslot
    @slot('icon') fas fa-lock @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXTAREA AUTHORIZATION CODE #####-->
@component('form.textarea')
    @slot('name') authorization_code @endslot
    @slot('label') Authorization Code @endslot
    @slot('value')@endslot
    @slot('placeholder') Paste Authorization Code here... @endslot
    @slot('icon') fas fa-code @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### SELECT SCOPE #####-->
@component('form.select')
    @slot('name') scope @endslot
    @slot('label') Scope @endslot
    @slot('value')@endslot
    @slot('placeholder')@endslot
    @slot('icon') fas fa-cube @endslot
    @slot('required') required @endslot
        @slot('options')
            <option value="full_access">Full Access</option> 
        @endslot
@endcomponent


<!--##### SUBMIT BUTTON #####-->
@component('form.button')
    @slot('name') Add Configuration @endslot
    @slot('value') buttonx @endslot
    @slot('color') primary @endslot
    @slot('icon') fas fa-plus @endslot
@endcomponent


</form>
