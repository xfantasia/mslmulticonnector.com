<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSapJournalEntryConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sap_journal_entry_configs', function (Blueprint $table) {
            $table->id();
            $table->string('pid_jec')->unique();
            $table->string('pid_user');
            $table->string('jec_name');
            $table->string('config_type');
            $table->string('object_node_sender_technical_id');
            $table->string('company_id');
            $table->string('original_entry_document_reference_id');
            $table->string('original_entry_document_reference_business_system_id');
            $table->string('accounting_business_transaction_date');
            $table->string('accounting_business_transaction_type_code');
            $table->string('accounting_document_type_code');
            $table->string('original_entry_document_item_reference_item_id');
            $table->string('general_ledger_account_alias_code');
            $table->string('business_transaction_currency_amount');
            $table->string('currency_code');
            $table->string('status')->nullable();
            $table->string('ext1')->nullable();
            $table->string('ext2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sap_journal_entry_configs');
    }
}
