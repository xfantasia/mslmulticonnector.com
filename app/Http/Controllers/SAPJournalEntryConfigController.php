<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\XISCode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SAPJournalEntryConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create form
        $data = array();
        $data['company_name'] = Auth::user()->company_name;

        //\Session::flash('success', 'WebHR-Configuration was successfully created!');
        return view('pages/sap_journal_entry_config', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //META DATA
        $data = array();
        $pid_user = Auth::user()->pid_user;

        $pid_jec = 'WHRPR'.XIScode::xHash(10).time();

        DB::table('sap_journal_entry_configs')->insert(
            [
                'pid_jec' => $pid_jec,
                'pid_user' => Auth::user()->pid_user,
                'jec_name' => $request->jec_name,
                'config_type' => $request->config_type,
                'object_node_sender_technical_id' => $request->object_node_sender_technical_id,
                'company_id' => $request->company_id,
                'original_entry_document_reference_id' => $request->original_entry_document_reference_id,
                'original_entry_document_reference_business_system_id' => $request->original_entry_document_reference_business_system_id,
                'accounting_business_transaction_date' => $request->accounting_business_transaction_date,
                'accounting_business_transaction_type_code' => $request->accounting_business_transaction_type_code,
                'accounting_document_type_code' => $request->accounting_document_type_code,
                'original_entry_document_item_reference_item_id' => $request->original_entry_document_item_reference_item_id,
                'general_ledger_account_alias_code' => $request->general_ledger_account_alias_code,
                'business_transaction_currency_amount' => $request->business_transaction_currency_amount,
                'currency_code' => $request->currency_code,
                'ext1' => 'NA',
                'ext2' => 'NA',
                'created_at' => now(),
                'updated_at' => now()
            ]
          );


            $sap_journal_entry_config = DB::table('sap_journal_entry_configs')
                ->where('pid_user', '=', $pid_user)
                ->get();

            //DATA FOR VIEW
            $data['sap_journal_entry_config'] = $sap_journal_entry_config;

            \Session::flash('success', 'SAP Journal Entry-Configuration was successfully created!');
            return view('pages/sap_journal_entry_config_view', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
