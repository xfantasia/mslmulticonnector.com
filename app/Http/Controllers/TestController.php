<?php

namespace App\Http\Controllers;

use Image;
use App\User;
use Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use App\Http\Controllers\XISCode;
use App\Http\Controllers\DATAbox;
use App\Http\Controllers\FINBOX;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;


class TestController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$response = Http::post('https://my346325.sapbydesign.com/sap/bc/srt/scs/sap/managejournalentryin');
        //dd($response);

        $url = 'https://my346325.sapbydesign.com/sap/bc/srt/scs/sap/managejournalentryin';

        $xml =
        '
        <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:glob="http://sap.com/xi/SAPGlobal20/Global">
   <soap:Header/>
   <soap:Body>
        <n0:JournalEntryBundleCreateRequest xmlns:n0="http://sap.com/xi/SAPGlobal20/Global">
            <BasicMessageHeader>
            <ID>ABCDEF000000001</ID>
            </BasicMessageHeader>
            <JournalEntry>
                <ObjectNodeSenderTechnicalID>1</ObjectNodeSenderTechnicalID>
                <CompanyID>2000</CompanyID>
                <OriginalEntryDocumentReferenceID>00047</OriginalEntryDocumentReferenceID>
                <OriginalEntryDocumentReferenceBusinessSystemID>MULTICONNECTOR</OriginalEntryDocumentReferenceBusinessSystemID>
                <AccountingBusinessTransactionDate>2019-12-01</AccountingBusinessTransactionDate>
                <AccountingBusinessTransactionTypeCode>701</AccountingBusinessTransactionTypeCode>
                <AccountingDocumentTypeCode>00107</AccountingDocumentTypeCode>
                <Item>
                    <ObjectNodeSenderTechnicalID>1</ObjectNodeSenderTechnicalID>
                    <OriginalEntryDocumentItemReferenceItemID>1</OriginalEntryDocumentItemReferenceItemID>
                    <GeneralLedgerAccountAliasCode>A-7140</GeneralLedgerAccountAliasCode>
                    <BusinessTransactionCurrencyAmount currencyCode="NGN">65000</BusinessTransactionCurrencyAmount>
                </Item>
                <Item>
                    <ObjectNodeSenderTechnicalID>3</ObjectNodeSenderTechnicalID>
                    <OriginalEntryDocumentItemReferenceItemID>2</OriginalEntryDocumentItemReferenceItemID>
                    <GeneralLedgerAccountAliasCode>A-1510</GeneralLedgerAccountAliasCode>
                    <BusinessTransactionCurrencyAmount currencyCode="NGN">-65000</BusinessTransactionCurrencyAmount>
                </Item>
            </JournalEntry>
        </n0:JournalEntryBundleCreateRequest>
    </soap:Body>
</soap:Envelope>
        ';

        $options = [
            'headers' => [
                'Content-Type' => 'text/xml; charset=UTF8'
            ],
            'body' => $xml
        ];

        // Basic authentication...
        $response = Http::withBasicAuth('_TESTCOM', 'Welcome$1')->post($url);



        //RESPONSE
        if($response->status() == 200){
            dd('SUCCESS!'.$response->status());
        }else{
            dd('FAILED!'.$response->status());
        }



    }

    public function test1()
    {
        //test code goes here
    }


    public function test2()
    {
        $url = 'https://my346325.sapbydesign.com/sap/bc/srt/scs/sap/managejournalentryin';

        $xml =
        '
        <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:glob="http://sap.com/xi/SAPGlobal20/Global">
   <soap:Header/>
   <soap:Body>
        <n0:JournalEntryBundleCreateRequest xmlns:n0="http://sap.com/xi/SAPGlobal20/Global">
            <BasicMessageHeader>
            <ID>ABCDEF000000001</ID>
            </BasicMessageHeader>
            <JournalEntry>
                <ObjectNodeSenderTechnicalID>1</ObjectNodeSenderTechnicalID>
                <CompanyID>2000</CompanyID>
                <OriginalEntryDocumentReferenceID>00047</OriginalEntryDocumentReferenceID>
                <OriginalEntryDocumentReferenceBusinessSystemID>MULTICONNECTOR</OriginalEntryDocumentReferenceBusinessSystemID>
                <AccountingBusinessTransactionDate>2019-12-01</AccountingBusinessTransactionDate>
                <AccountingBusinessTransactionTypeCode>701</AccountingBusinessTransactionTypeCode>
                <AccountingDocumentTypeCode>00107</AccountingDocumentTypeCode>
                <Item>
                    <ObjectNodeSenderTechnicalID>1</ObjectNodeSenderTechnicalID>
                    <OriginalEntryDocumentItemReferenceItemID>1</OriginalEntryDocumentItemReferenceItemID>
                    <GeneralLedgerAccountAliasCode>A-7140</GeneralLedgerAccountAliasCode>
                    <BusinessTransactionCurrencyAmount currencyCode="NGN">65000</BusinessTransactionCurrencyAmount>
                </Item>
                <Item>
                    <ObjectNodeSenderTechnicalID>3</ObjectNodeSenderTechnicalID>
                    <OriginalEntryDocumentItemReferenceItemID>2</OriginalEntryDocumentItemReferenceItemID>
                    <GeneralLedgerAccountAliasCode>A-1510</GeneralLedgerAccountAliasCode>
                    <BusinessTransactionCurrencyAmount currencyCode="NGN">-65000</BusinessTransactionCurrencyAmount>
                </Item>
            </JournalEntry>
        </n0:JournalEntryBundleCreateRequest>
    </soap:Body>
</soap:Envelope>
        ';

        $curl = curl_init();
        $credentials = base64_encode('_TESTCOM:Welcome$1');
        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8000",
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_POSTFIELDS => $xml,
          CURLOPT_HTTPHEADER => array(
            'Authorization' => 'Basic ' . $credentials,
            "Content-Type: text/xml",
            "SOAPAction: urn:sap-com:document:sap:soap:functions:mc-style:ZSD_WS_B2B:ZsdB2b0001Request",
            "cache-control: no-cache"
          ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    function removeNamespaceFromXML( $xml )
    {
        // Because I know all of the the namespaces that will possibly appear in
        // in the XML string I can just hard code them and check for
        // them to remove them
        $toRemove = ['soap', 'n0', 'soap-env'];
        // This is part of a regex I will use to remove the namespace declaration from string
        $nameSpaceDefRegEx = '(\S+)=["\']?((?:.(?!["\']?\s+(?:\S+)=|[>"\']))+.)["\']?';

        // Cycle through each namespace and remove it from the XML string
        foreach( $toRemove as $remove ) {
            // First remove the namespace from the opening of the tag
            $xml = str_replace('<' . $remove . ':', '<', $xml);
            // Now remove the namespace from the closing of the tag
            $xml = str_replace('</' . $remove . ':', '</', $xml);
            // This XML uses the name space with CommentText, so remove that too
            $xml = str_replace($remove . ':commentText', 'commentText', $xml);
            // Complete the pattern for RegEx to remove this namespace declaration
            $pattern = "/xmlns:{$remove}{$nameSpaceDefRegEx}/";
            // Remove the actual namespace declaration using the Pattern
            $xml = preg_replace($pattern, '', $xml, 1);
        }

        // Return sanitized and cleaned up XML with no namespaces
        return $xml;
    }

    function namespacedXMLToArray($xml)
    {
        // One function to both clean the XML string and return an array
        return json_decode(json_encode(simplexml_load_string($this->removeNamespaceFromXML($xml))), true);
    }

    public function test3()
    {

        // POST API URL
        $url = "https://my346325.sapbydesign.com/sap/bc/srt/scs/sap/managejournalentryin";


        // HEADER DATA
        $headers = array(
           "Content-Type: text/xml",
           "Authorization: Basic X1RFU1RDT006V2VsY29tZSQx",
           "Cookie: sap-usercontext=sap-client=161",
        );



        //DEFAULT DATA VALUES (As a valid test sample data)

        //Basic Message Header
        $ID = 'ABCDEF000000001';
        //JournalEntry data
        $ObjectNodeSenderTechnicalID1 = '1'; //main journal entry
        $CompanyID = '2000';
        $OriginalEntryDocumentReferenceID = '00047';
        $OriginalEntryDocumentReferenceBusinessSystemID = 'MULTICONNECTOR';
        $AccountingBusinessTransactionDate = '2019-12-01';
        $AccountingBusinessTransactionTypeCode = '701';
        $AccountingDocumentTypeCode = '00107';
        //Items data
        $ObjectNodeSenderTechnicalID2 = '1'; //item Credit Section
        $ObjectNodeSenderTechnicalID3 = '3'; //item Debit Section
        $OriginalEntryDocumentItemReferenceItemID1 = '1'; //item Credit Section
        $OriginalEntryDocumentItemReferenceItemID2 = '1'; //item Debit Section
        $GeneralLedgerAccountAliasCode = 'A-7140';
        $BusinessTransactionCurrencyAmount = 555;
        $currencyCode = 'NGN';



        //XML BODY DATA
        $data_xml = <<<DATA
        <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:glob="http://sap.com/xi/SAPGlobal20/Global">
           <soap:Header/>

           <soap:Body>
                <n0:JournalEntryBundleCreateRequest xmlns:n0="http://sap.com/xi/SAPGlobal20/Global">

                    <BasicMessageHeader>
                    <ID>$ID</ID>
                    </BasicMessageHeader>

                    <JournalEntry>
                        <ObjectNodeSenderTechnicalID>$ObjectNodeSenderTechnicalID1</ObjectNodeSenderTechnicalID>
                        <CompanyID>$CompanyID</CompanyID>
                        <OriginalEntryDocumentReferenceID>$OriginalEntryDocumentReferenceID</OriginalEntryDocumentReferenceID>
                        <OriginalEntryDocumentReferenceBusinessSystemID>$OriginalEntryDocumentReferenceBusinessSystemID</OriginalEntryDocumentReferenceBusinessSystemID>
                        <AccountingBusinessTransactionDate>$AccountingBusinessTransactionDate</AccountingBusinessTransactionDate>
                        <AccountingBusinessTransactionTypeCode>$AccountingBusinessTransactionTypeCode</AccountingBusinessTransactionTypeCode>
                        <AccountingDocumentTypeCode>$AccountingDocumentTypeCode</AccountingDocumentTypeCode>

                        <Item>
                            <ObjectNodeSenderTechnicalID>$ObjectNodeSenderTechnicalID2</ObjectNodeSenderTechnicalID>
                            <OriginalEntryDocumentItemReferenceItemID>$OriginalEntryDocumentItemReferenceItemID1</OriginalEntryDocumentItemReferenceItemID>
                            <GeneralLedgerAccountAliasCode>$GeneralLedgerAccountAliasCode</GeneralLedgerAccountAliasCode>
                            <BusinessTransactionCurrencyAmount currencyCode="$currencyCode">$BusinessTransactionCurrencyAmount</BusinessTransactionCurrencyAmount>
                        </Item>

                        <Item>
                            <ObjectNodeSenderTechnicalID>$ObjectNodeSenderTechnicalID2</ObjectNodeSenderTechnicalID>
                            <OriginalEntryDocumentItemReferenceItemID>$OriginalEntryDocumentItemReferenceItemID2</OriginalEntryDocumentItemReferenceItemID>
                            <GeneralLedgerAccountAliasCode>$GeneralLedgerAccountAliasCode</GeneralLedgerAccountAliasCode>
                            <BusinessTransactionCurrencyAmount currencyCode="$currencyCode">-$BusinessTransactionCurrencyAmount</BusinessTransactionCurrencyAmount>
                        </Item>
                    </JournalEntry>

                </n0:JournalEntryBundleCreateRequest>
            </soap:Body>

        </soap:Envelope>
        DATA;


    //HTTP POST REQUEST
    try {
        //INITIALIZA AND START THE CURL FUNCTION
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_xml);

        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        $xml=simplexml_load_string($data_xml);
        $message = $xml->CompanyID;

        $json_converted = $this->namespacedXMLToArray($response);
        // dd($json_converted);
        if(array_key_exists('JournalEntryBundleCreateConfirmation', $json_converted['Body']))
        {
            if(array_key_exists('JournalEntryCreateConfirmationBundleJournalEntry', $json_converted['Body']['JournalEntryBundleCreateConfirmation']))
            {
                dd($json_converted['Body']['JournalEntryBundleCreateConfirmation']['JournalEntryCreateConfirmationBundleJournalEntry']['UUID']);
            }else {
                dd($json_converted['Body']['JournalEntryBundleCreateConfirmation']);
            }
        }else if(array_key_exists('Fault', $json_converted['Body'])) {
            dd($json_converted['Body']['Fault']);
        }
        // dd($json_converted['Body']['JournalEntryBundleCreateConfirmation']['JournalEntryCreateConfirmationBundleJournalEntry']['UUID']);
        // dd($status.' : '.$message.' : '.$response);

        curl_close($curl);
        }
    catch (Exception $e) {
                //echo 'and the error is: ',  $e->getMessage(), "\n";
                //\Session::flash('failed', 'A Connection Error has occured! Check that your API URL and Parameters are correct.');
                //return view('pages/webhr_payroll_config_view', $data);
                dd('REQUEST FAILED!'.$e->getMessage());
                exit;
            }


            /**
            //RESPONSE
            if($status == 200){
                //\Session::flash('success', 'Connection SUCCESSFUL! Status: 200 : OK WebHR-Configuration Test was Successful.');
                dd('SUCCESS!');
            }else{
                //\Session::flash('failed', 'Connection FAILED! Connection to WEB-HR :: WebHR-Configuration Test Failed.');
                dd('FAILED!');
            }
            */




    }




    public function test4()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://my346325.sapbydesign.com/sap/bc/srt/scs/sap/managejournalentryin',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:glob="http://sap.com/xi/SAPGlobal20/Global">
           <soap:Header/>
           <soap:Body>
                <n0:JournalEntryBundleCreateRequest xmlns:n0="http://sap.com/xi/SAPGlobal20/Global">
                    <BasicMessageHeader>
                    <ID>ABCDEF000000001</ID>
                    </BasicMessageHeader>
                    <JournalEntry>
                        <ObjectNodeSenderTechnicalID>1</ObjectNodeSenderTechnicalID>
                        <CompanyID>2000</CompanyID>
                        <OriginalEntryDocumentReferenceID>00047</OriginalEntryDocumentReferenceID>
                        <OriginalEntryDocumentReferenceBusinessSystemID>MULTICONNECTOR</OriginalEntryDocumentReferenceBusinessSystemID>
                        <AccountingBusinessTransactionDate>2019-12-01</AccountingBusinessTransactionDate>
                        <AccountingBusinessTransactionTypeCode>701</AccountingBusinessTransactionTypeCode>
                        <AccountingDocumentTypeCode>00107</AccountingDocumentTypeCode>
                        <Item>
                            <ObjectNodeSenderTechnicalID>1</ObjectNodeSenderTechnicalID>
                            <OriginalEntryDocumentItemReferenceItemID>1</OriginalEntryDocumentItemReferenceItemID>
                            <GeneralLedgerAccountAliasCode>A-7140</GeneralLedgerAccountAliasCode>
                            <BusinessTransactionCurrencyAmount currencyCode="NGN">65000</BusinessTransactionCurrencyAmount>
                        </Item>
                        <Item>
                            <ObjectNodeSenderTechnicalID>3</ObjectNodeSenderTechnicalID>
                            <OriginalEntryDocumentItemReferenceItemID>2</OriginalEntryDocumentItemReferenceItemID>
                            <GeneralLedgerAccountAliasCode>A-1510</GeneralLedgerAccountAliasCode>
                            <BusinessTransactionCurrencyAmount currencyCode="NGN">-65000</BusinessTransactionCurrencyAmount>
                        </Item>
                    </JournalEntry>
                </n0:JournalEntryBundleCreateRequest>
            </soap:Body>
        </soap:Envelope>',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: text/xml',
            'Authorization: Basic X1RFU1RDT006V2VsY29tZSQx',
            'Cookie: sap-usercontext=sap-client=161'
          ),
        ));

        $response = curl_exec($curl);

       //$status = $response->getStatusCode('staus');
        $response = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        dd($http_code.' : '.$response);


        curl_close($curl);


    }


    public function test5()
    {
        $soapXMLResult=<<<XML
            <soap-env:Envelope xmlns:soap-env="http://schemas.xmlsoap.org/soap/envelope/">
                <soap-env:Header/>
                <soap-env:Body>
                    <soap-env:Fault>
                        <faultcode>soap-env:Server</faultcode>
                        <faultstring xml:lang="en">Web service processing error; more details in the web service error log on provider side (UTC timestamp 20210411212642; Transaction ID 00163EAA3E741EDBA6E1937420644466)</faultstring>
                        <detail/>
                    </soap-env:Fault>
                </soap-env:Body>
            </soap-env:Envelope>
        XML;

        $soap     = simplexml_load_string($soapXMLResult);
        $response = $soap->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->Fault;
        $customerId = (string) $response->faultcode;
        echo $customerId;
        //$xml->from;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create form
        $pid_user = Auth::user()->pid_user;
        $data = array();

        $sap_communication_arrangements = DB::table('sap_communication_arrangements')
            ->where('pid_user', '=', $pid_user)
            ->get();

        $sap_financial_services = DB::table('sap_financial_services')
            ->where('pid_user', '=', $pid_user)
            ->get();

        //DATA FOR VIEW
        $data['sap_financial_services'] = $sap_financial_services;

        $data['company_name'] = Auth::user()->company_name;
        $data['sap_communication_arrangements'] = $sap_communication_arrangements;


        //\Session::flash('success', 'WebHR-Configuration was successfully created!');
        return view('pages/sap_communication_arrangements_create', $data);
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

        $pid_ca = 'SAPCOMMARR'.XIScode::xHash(10).time();

        DB::table('sap_communication_arrangements')->insert(
            [
                'pid_ca' => $pid_ca,
                'pid_fsrv' => $request->pid_fsys,
                'pid_user' => Auth::user()->pid_user,
                'config_type' => $request->config_type,
                'ca_name' => $request->ca_name,
                'ca_type' => 'NA',
                'ca_tenant_url' => $request->ca_tenant_url,
                'ca_description' => $request->ca_description,
                'ca_username' => $request->ca_username,
                'ca_password' =>  $request->ca_password,
                'ca_status1' =>  $request->ca_status1,
                'ca_status2' =>  $request->ca_status2,
                'ca_ext1' => 'NA',
                'ca_ext2' => 'NA',
                'created_at' => now(),
                'updated_at' => now()
            ]
          );


            $sap_communication_arrangements = DB::table('sap_communication_arrangements')
                ->where('pid_user', '=', $pid_user)
                ->get();

            //DATA FOR VIEW
            $data['sap_communication_arrangements'] = $sap_communication_arrangements;
            $data['company_name'] = Auth::user()->company_name;

            \Session::flash('success', 'SAP Communication Arrangement was successfully created!');
            return view('pages/sap_communication_arrangements_read', $data);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sap_communication_arrangements)
    {
        //META DATA
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //LOAD RECORDS INTO ARRAY
        $sap_communication_arrangements = DB::table('sap_communication_arrangements')
            ->where('pid_user', '=', $pid_user)
            ->where('pid_ca', '=', $sap_communication_arrangements)
            ->get();

        //DATA FOR VIEW
        $data['company_name'] = Auth::user()->company_name;
        $data['sap_communication_arrangements'] = $sap_communication_arrangements;

        //\Session::flash('success', 'Configuration was succesfully deleted');
        return view('pages/sap_communication_arrangements_details', $data);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($sap_communication_arrangements)
    {
        //META DATA
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //LOAD RECORDS INTO ARRAY
        $sap_communication_arrangements = DB::table('sap_communication_arrangements')
            ->join('sap_financial_services', 'sap_financial_services.pid_fsrv', '=', 'sap_communication_arrangements.pid_fsrv')
            ->select('*','sap_financial_services.fsrv_name as fsrv_namex')
            ->where('sap_communication_arrangements.pid_user', '=', $pid_user)
            ->where('sap_communication_arrangements.pid_ca', '=', $sap_communication_arrangements)
            ->get();

        $sap_financial_services = DB::table('sap_financial_services')
            ->where('pid_user', '=', $pid_user)
            ->get();


        //DATA FOR VIEW
        $data['company_name'] = Auth::user()->company_name;
        $data['sap_communication_arrangements'] = $sap_communication_arrangements;
        $data['sap_financial_services'] = $sap_financial_services;

        //\Session::flash('success', 'Configuration was succesfully deleted');
        return view('pages/sap_communication_arrangements_update', $data);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sap_communication_arrangements)
    {

        //META DATA
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //UPDATE
        DB::table('sap_communication_arrangements')
            ->where('pid_user', '=', $pid_user)
            ->where('pid_ca', '=', $sap_communication_arrangements)
            ->update([
                'pid_fsrv' => $request->pid_fsrv,
                'ca_name' => $request->ca_name,
                'ca_tenant_url' => $request->ca_tenant_url,
                'ca_description' => $request->ca_description,
                'ca_username' => $request->ca_username,
                'ca_password' =>  $request->ca_password,
                'updated_at' => now()
                ]);


        //TABLE VIEW DATA
        $sap_communication_arrangements = DB::table('sap_communication_arrangements')
            ->join('sap_financial_services', 'sap_financial_services.pid_fsrv', '=', 'sap_communication_arrangements.pid_fsrv')
            ->select('*','sap_financial_services.fsrv_name as fsrv_namex')
            ->where('sap_communication_arrangements.pid_user', '=', $pid_user)
            ->get();

        //DATA FOR VIEW
        $data['company_name'] = Auth::user()->company_name;
        $data['sap_communication_arrangements'] = $sap_communication_arrangements;

        \Session::flash('success', 'Communication Arrangement was succesfully Updated');
        return view('pages/sap_communication_arrangements_read', $data);
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sap_communication_arrangements)
    {
        //META DATA
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //DELETE
        DB::table('sap_communication_arrangements')
            ->where('pid_user', '=', $pid_user)
            ->where('pid_ca', '=', $sap_communication_arrangements)
            ->delete();


        $sap_communication_arrangements = DB::table('sap_communication_arrangements')
            ->join('sap_financial_services', 'sap_financial_services.pid_fsrv', '=', 'sap_communication_arrangements.pid_fsrv')
            ->select('*','sap_financial_services.fsrv_name as fsrv_namex')
            ->where('sap_communication_arrangements.pid_user', '=', $pid_user)
            ->get();

        //DATA FOR VIEW
        $data['company_name'] = Auth::user()->company_name;
        $data['sap_communication_arrangements'] = $sap_communication_arrangements;

        \Session::flash('success', 'Communication Arrangement was succesfully deleted');
        return view('pages/sap_communication_arrangements_read', $data);
    }


        //TEST WEBHR PAYROLL CONFIG
        public function payroll_config_test(Request $request)
        {
            //META DATA
            $data = array();
            $pid_user = Auth::user()->pid_user;

            //config
            $pid_config = $request->pid_config;

            //config details
            $get_url = DB::table('webhr_payroll_config')
                ->where('pid_user', $pid_user)
                ->where('pid_config', $pid_config)
                ->value('get_url');

            $authorization_code = DB::table('webhr_payroll_config')
                ->where('pid_user', $pid_user)
                ->where('pid_config', $pid_config)
                ->value('authorization_code');


            //HTTP GET REQUEST
            $token = $authorization_code;
            $url = $get_url;
            $pre_param = '?module=Payroll&submodule=Payslips&request=List&';
            $params = 'params={"PayslipStartMonth": "01", "PayslipStartYear": "2021", "PayslipEndMonth": "12","PayslipEndYear": "2021", "Company": "AGPC", "Division": "", "Station": "Lagos"}';

            //create form
            $data = array();
            $data['company_name'] = Auth::user()->company_name;

            $webhr_payroll_config = DB::table('webhr_payroll_config')
                ->where('pid_user', '=', $pid_user)
                ->get();

            $data['company_name'] = Auth::user()->company_name;
            $data['webhr_payroll_config'] = $webhr_payroll_config;

                    //HTTP GET RESPONSE
                    try {
                        $response = Http::withToken($token)->get($url.$pre_param.$params);
                    }
                catch (Exception $e) {
                        //echo 'and the error is: ',  $e->getMessage(), "\n";
                        \Session::flash('failed', 'A Connection Error has occured! Check that your API URL and Parameters are correct.');
                        return view('pages/webhr_payroll_config_view', $data);
                        exit;
                    }

                    //RESPONSE
                    if($response->status() == 200){
                        \Session::flash('success', 'Connection SUCCESSFUL! Status: 200 : OK WebHR-Configuration Test was Successful.');
                        $data['status'] = 200;
                    }else{
                        \Session::flash('failed', 'Connection FAILED! Connection to WEB-HR :: WebHR-Configuration Test Failed.');
                        $data['status'] = 400;
                    }

            //\Session::flash('success', 'WebHR-Configuration was successfully created!');
            return view('pages/webhr_payroll_config_view', $data);
        }


}
