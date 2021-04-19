


<!--##### WEB-HR PAYROLL CONFIG FORM #####-->
<form method="post" action="{{ route('sap_journal_entry_config.store') }}"  enctype="multipart/form-data">
    @csrf


<!--##### TEXT CONFIG NAME #####-->
@component('form.text')
    @slot('name') jec_name @endslot
    @slot('label') Journal Entry Config Name @endslot
    @slot('value')@endslot
    @slot('placeholder') Config1 @endslot
    @slot('icon') fas fa-cog @endslot
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


<!--##### TEXT OBJECT NODE SENDER TECHNICAL ID  #####-->
@component('form.text')
    @slot('name') object_node_sender_technical_id  @endslot
    @slot('label') Object Node Sender Technical ID @endslot
    @slot('value')@endslot
    @slot('placeholder') 234532335347556889 @endslot
    @slot('icon') fas fa-key @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT COMPANY ID  #####-->
@component('form.text')
    @slot('name') company_id  @endslot
    @slot('label') Company ID @endslot
    @slot('value')@endslot
    @slot('placeholder') 335347556889 @endslot
    @slot('icon') fas fa-key @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT ORIGINAL ENTRY DOCUMENT REFERENCE ID  #####-->
@component('form.text')
    @slot('name') original_entry_document_reference_id  @endslot
    @slot('label') Original Entry Document Reference ID @endslot
    @slot('value')@endslot
    @slot('placeholder') 53475568 @endslot
    @slot('icon') fas fa-key @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT ORIGINAL ENTRY DOCUMENT REFERENCE BUSINESS SYSTEM ID  #####-->
@component('form.text')
    @slot('name') original_entry_document_reference_business_system_id  @endslot
    @slot('label') Original Entry Document Reference Business System Id @endslot
    @slot('value')@endslot
    @slot('placeholder') 7556889 @endslot
    @slot('icon') fas fa-key @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT ACCOUNTING BUSINESS TRANSACTION DATE  #####-->
@component('form.date')
    @slot('name') accounting_business_transaction_date  @endslot
    @slot('label') Accounting Business Transaction Date @endslot
    @slot('value')@endslot
    @slot('placeholder') 2019-12-01 @endslot
    @slot('icon') fas fa-key @endslot
    @slot('required') required @endslot
@endcomponent

<!--##### TEXT ACCOUNTING BUSINESS TRANSACTION TYPE CODE  #####-->
@component('form.text')
    @slot('name') accounting_business_transaction_type_code  @endslot
    @slot('label') Accounting Business Transaction Type Code @endslot
    @slot('value')@endslot
    @slot('placeholder') 177 @endslot
    @slot('icon') fas fa-key @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT ACCOUNTING DOCUMENT TYPE CODE  #####-->
@component('form.text')
    @slot('name') accounting_document_type_code  @endslot
    @slot('label') Accounting Document Type Code @endslot
    @slot('value')@endslot
    @slot('placeholder') 00107 @endslot
    @slot('icon') fas fa-key @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT ORIGINAL ENTRY DOCUMENT ITEM REFERENCE ITEM ID  #####-->
@component('form.text')
    @slot('name') original_entry_document_item_reference_item_id  @endslot
    @slot('label') Original Entry Document Item Reference Item ID @endslot
    @slot('value')@endslot
    @slot('placeholder') 107 @endslot
    @slot('icon') fas fa-key @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT GENERAL LEDGER ACCOUNT ALIAS CODE  #####-->
@component('form.text')
    @slot('name') general_ledger_account_alias_code  @endslot
    @slot('label') General Ledger Account Alias Code @endslot
    @slot('value')@endslot
    @slot('placeholder') A-1207 @endslot
    @slot('icon') fas fa-key @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT BUSINESS TRANSACTION CURRENCY AMOUNT  #####-->
@component('form.text')
    @slot('name') business_transaction_currency_amount  @endslot
    @slot('label') Business Transaction Currency Amount @endslot
    @slot('value')@endslot
    @slot('placeholder') 10000 @endslot
    @slot('icon') fas fa-key @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT CURRENCY CODE  #####-->
@component('form.select')
    @slot('name') currency_code  @endslot
    @slot('label') CURRENCY CODE @endslot
    @slot('value')@endslot
    @slot('placeholder') USD @endslot
    @slot('icon') fas fa-key @endslot
    @slot('required') required @endslot
    @slot('options')
            <option value="USD">USD</option>
            <option value="NGN">NGN</option>
            <option value="GBP">GBP</option>
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
