@extends('layouts.master')
@section('title','Create New Project')
@push('styles')
<style>

    .fa fa-plus-square-o {
        vertical-align: middle;
    }

    .modal-content {
        position: relative;
        top: 100px;
    }

    label {
        font-weight: 400;
    }

    h3, label {
        padding: 5px 0;
    }

    [class^='select2'] {
        /*border-radius: 0px !important;*/
    }

    .fileinput-filename {
        display: inline-block;
        overflow: hidden;
        vertical-align: middle;
        /* new lines */
        width: 100%;
        position: absolute;
        left: 0;
        padding-left: 30px;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    button.dim {
        margin-bottom: 0 !important;
    }
</style>

@endpush
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <form id="main_form" method="post" class="" action="{{url('projects/store')}}" enctype="multipart/form-data">
            <input type="hidden" name="project_id" value="{{$project_id}}" id="project_id">
            {!! csrf_field() !!}
            <div style="display: none;" class="left-button right-button"></div>
            <div id="r1" class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>Project</h3>
                            <div class="form-group">
                                <label for="project_name">File Number</label>
                                <input type="text" id="project_name" name="project_name" autocomplete="off"
                                       class="form-control text-box" value="">
                            </div>
                            <div class="form-group">
                                <label for="project_status">File Status</label>
                                <select id="project_status" name="project_status" style="width: 100%;">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="r2" class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>Buyer</h3>
                            <div class="form-group">
                                <label for="buyer_id">Buyer Name</label>
                                <select id="buyer_id" name="buyer_id" style="width: 100%;">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="r3" class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>Supplier</h3>
                            <div class="form-group">
                                <label for="supplier_id">Supplier Name</label>
                                <select id="supplier_id" name="supplier_id" style="width: 100%;">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="r4" class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>Sales Confirmation</h3>
                            <div class="form-group">
                                <label for="s_c_origin">Origin</label>
                                <select id="s_c_origin" name="s_c_origin" style="width: 100%;">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="s_c_crop_year">Crop Year</label>
                                <input type="text" id="s_c_crop_year" name="s_c_crop_year" autocomplete="off"
                                       class="form-control text-box" value="">
                            </div>
                            <div class="form-group">
                                <label for="s_c_type">Type</label>
                                <input type="text" id="s_c_type" name="s_c_type" autocomplete="off"
                                       class="form-control text-box" value="">
                            </div>
                            <div class="form-group">
                                <label for="s_c_color_grade">Color Grade</label>
                                <input type="text" id="s_c_color_grade" name="s_c_color_grade" autocomplete="off"
                                       class="form-control text-box" value="">
                            </div>
                            <div class="form-group">
                                <label for="s_c_staple">Staple</label>
                                <div class="row">
                                    <div class="col-xs-8"><input type="text" id="s_c_staple" name="s_c_staple"
                                                                 autocomplete="off"
                                                                 class="form-control " value=""></div>
                                    <div class="col-xs-4"><select id="s_c_staple_unit" name="s_c_staple_unit"
                                                                  style="width: 100%;"></select></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="s_c_mic">MIC</label>
                                <div class="row">
                                    <div class="col-xs-8"><input type="text" id="s_c_mic" name="s_c_mic"
                                                                 autocomplete="off" class="form-control " value="">
                                    </div>
                                    <div class="col-xs-4"><select id="s_c_mic_unit" name="s_c_mic_unit"
                                                                  style="width: 100%;"></select></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="s_c_strength">Strength</label>
                                <div class="row">
                                    <div class="col-xs-8"><input type="text" id="s_c_strength" name="s_c_strength"
                                                                 autocomplete="off" class="form-control " value="">
                                    </div>
                                    <div class="col-xs-4"><select id="s_c_strength_unit" name="s_c_strength_unit"
                                                                  style="width: 100%;"></select></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="s_c_quantity">Quantity</label>
                                <div class="row">
                                    <div class="col-xs-8"><input type="text" id="s_c_quantity" name="s_c_quantity"
                                                                 autocomplete="off" class="form-control " value="">
                                    </div>
                                    <div class="col-xs-4"><select id="s_c_quantity_unit" name="s_c_quantity_unit"
                                                                  style="width: 100%;"></select></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="s_c_price">Price</label>
                                <div class="row">
                                    <div class="col-xs-8"><input type="text" id="s_c_price" name="s_c_price"
                                                                 autocomplete="off" class="form-control " value="">
                                    </div>
                                    <div class="col-xs-4"><select id="s_c_price_unit" name="s_c_price_unit"
                                                                  style="width: 100%;"></select></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="s_c_commission_rate">Comission Rate(%)</label>
                                <input type="text" id="s_c_commission_rate" name="s_c_commission_rate"
                                       autocomplete="off" class="form-control " value="">
                            </div>
                            <div class="form-group">
                                <label for="s_c_commission_point">Comission Rate(Point)</label>
                                <input type="text" id="s_c_commission_point" name="s_c_commission_point"
                                       autocomplete="off" class="form-control " value="">
                            </div>
                            <div class="form-group">
                                <label for="s_c_shipment">Shipment</label>
                                <textarea id="s_c_shipment" name="s_c_shipment" autocomplete="off"
                                          class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="s_c_payment">Payment</label>
                                <select id="s_c_payment" name="s_c_payment" style="width: 100%;">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="s_c_latest_date_of_lc_opening">LC Opening</label>
                                <input type="text" id="s_c_latest_date_of_lc_opening"
                                       name="s_c_latest_date_of_lc_opening" autocomplete="off"
                                       class="form-control text-box" value="">
                            </div>
                            <div class="form-group">
                                <label for="upload_sales_confirmation">Upload Sales Confirmation</label>
                                <div id="upload_sales_confirmation">
                                </div>
                                <div id="upload_sales_confirmation_div">
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="r5" class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>Contract</h3>
                            <div class="form-group">
                                <label for="contract_number">Contract No.</label>
                                <input type="text" id="contract_number" name="contract_number" autocomplete="off"
                                       class="form-control text-box" value="">
                            </div>
                            <div class="form-group" id="data_1">
                                <label class="font-normal">Contract Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input
                                            type="text" class="form-control"
                                            name="contract_date" id="contract_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="upload_contract_copy">Upload Contract Copy</label>
                                <div id="upload_contract_copy">
                                </div>
                                <div id="upload_contract_copy_div">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="r6" class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>Proforma Invoice</h3>
                            <div class="form-group">
                                <label for="p_i_number">PI Number</label>
                                <input type="text" id="p_i_number" name="p_i_number" autocomplete="off"
                                       class="form-control text-box" value="">
                            </div>
                            <div class="form-group">
                                <label for="p_i_quantity">Quantity</label>
                                <div class="row">
                                    <div class="col-xs-8"><input type="text" id="p_i_quantity" name="p_i_quantity"
                                                                 autocomplete="off" class="form-control " value="">
                                    </div>
                                    <div class="col-xs-4"><select id="p_i_quantity_unit" name="p_i_quantity_unit"
                                                                  style="width: 100%;"></select></div>
                                </div>
                            </div>
                            <div class="form-group" id="data_2">
                                <label for="pi_date" class="font-normal">PI Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" name="pi_date"
                                           id="pi_date">
                                </div>
                            </div>
                            <div class="form-group" id="data_3">
                                <label for="p_i_latest_date_of_lc_opening" class="font-normal">Latest Date Of LC
                                    Opening</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control"
                                           name="p_i_latest_date_of_lc_opening" id="p_i_latest_date_of_lc_opening">
                                </div>
                            </div>
                            <div class="form-group" id="data_4">
                                <label for="p_i_latest_date_of_shipment" class="font-normal">Latest Date Of
                                    Shipment</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control"
                                           name="p_i_latest_date_of_shipment" id="p_i_latest_date_of_shipment">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="upload_pi_copy">Upload PI Copy</label>
                                <div id="upload_pi_copy">
                                </div>
                                <div id="upload_pi_copy_div">
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="r7" class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>Import Permint</h3>
                            <div class="form-group">
                                <label for="project_name">IP Number</label>
                                <input type="text" id="i_p_number" name="i_p_number" autocomplete="off"
                                       class="form-control text-box" value="">
                            </div>
                            <div class="form-group" id="data_5">
                                <label for="ip_date" class="font-normal">IP Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control"
                                           name="ip_date" id="ip_date">
                                </div>
                            </div>
                            <div class="form-group" id="data_6">
                                <label for="ip_expiry_date" class="font-normal">IP Expiry Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control"
                                           name="ip_expiry_date" id="ip_expiry_date">
                                </div>
                            </div>
                            <div class="form-group" id="data_7">
                                <label for="sro_date" class="font-normal">SRO Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control"
                                           name="sro_date" id="sro_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="upload_ip_copy">Upload IP Copy</label>
                                <div id="upload_ip_copy">
                                </div>
                                <div id="upload_ip_copy_div">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="upload_sro_copy">Upload SRO Copy</label>
                                <div id="upload_sro_copy">
                                </div>
                                <div id="upload_sro_copy_div">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="r8" class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>LC</h3>
                            <div class="form-group">
                                <label for="lc_number">LC Number</label>
                                <input type="text" id="lc_number" name="lc_number" autocomplete="off"
                                       class="form-control text-box" value="">
                            </div>
                            <div class="form-group" id="data_8">
                                <label class="font-normal" for="lc_date_of_issue">Date Of Issue</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control"
                                           name="lc_date_of_issue" id="lc_date_of_issue">
                                </div>
                            </div>
                            <div class="form-group" id="data_9">
                                <label class="font-normal" for="lc_date_of_expiry">Date Of Expiry</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control"
                                           name="lc_date_of_expiry" id="lc_date_of_expiry">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lc_type">LC Type</label>
                                <select id="lc_type" name="lc_type" style="width: 100%;">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="lc_opening_bank">Opening Bank</label>
                                <textarea id="lc_opening_bank" name="lc_opening_bank" autocomplete="off"
                                          class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="lc_receiver_bank">Receiver Bank</label>
                                <textarea id="lc_receiver_bank" name="lc_receiver_bank" autocomplete="off"
                                          class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="lc_partial_shipments">Partial Shipment</label>
                                <select id="lc_partial_shipments" name="lc_partial_shipments" style="width: 100%;">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="lc_transhipment">Transshipment</label>
                                <select id="lc_transhipment" name="lc_transhipment" style="width: 100%;">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="lc_port_of_loading">Port Of Loading</label>
                                <select id="lc_port_of_loading" name="lc_port_of_loading" style="width: 100%;">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="lc_port_of_discharge">Port Of Discharge</label>
                                <select id="lc_port_of_discharge" name="lc_port_of_discharge" style="width: 100%;">
                                </select>
                            </div>

                            <div class="form-group" id="data_10">
                                <label class="font-normal" for="latest_date_of_shipment">Latest Date Of Shipment</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control"
                                           name="latest_date_of_shipment" id="latest_date_of_shipment">
                                </div>
                            </div>
                            <div class="form-group" id="lc_amendment_day_div">
                                <label class="font-normal" for="lc_amendment_day">LC Amendment Date &nbsp;&nbsp;<a
                                            href="#" id="lc_amendment_day_id"><i
                                                style="font-size: 20px; vertical-align: middle;"
                                                class="fa fa-plus-square-o"></i></a></label>
                                <div class="input-group date" id="lc_amendment_day_element">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control"
                                           name="lc_amendment_day[]" id="lc_amendment_day">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="upload_lc_copy">Upload LC Copy</label>
                                <div id="upload_lc_copy">
                                </div>
                                <div id="upload_lc_copy_div">
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="upload_amendment_copy">Upload Amendment Copy</label>
                                <div id="upload_amendment_copy">
                                </div>
                                <div id="upload_amendment_copy_div">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="shipping_number" id="shipping_number" value="0">
            <div id="group">

            </div>
            {{--sn--}}
            <div id="r14" class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>Quality Claim</h3>
                            <div class="form-group" id="data_22">
                                <label class="font-noraml" for="q_c_quality_claim_date">Quality Claim Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control"
                                           name="q_c_quality_claim_date" id="q_c_quality_claim_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="q_c_quality_claim_amount">Quality Claim Amount</label>
                                <div class="row">
                                    <div class="col-xs-8"><input type="text" id="q_c_quality_claim_amount"
                                                                 name="q_c_quality_claim_amount" autocomplete="off"
                                                                 class="form-control " value=""></div>
                                    <div class="col-xs-4"><select id="q_c_quality_claim_amount_unit"
                                                                  name="q_c_quality_claim_amount_unit"
                                                                  style="width: 100%;"></select></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="q_c_quality_received_amount">Received Amount</label>
                                <div class="row">
                                    <div class="col-xs-8"><input type="text" id="q_c_quality_received_amount"
                                                                 name="q_c_quality_received_amount" autocomplete="off"
                                                                 class="form-control " value=""></div>
                                    <div class="col-xs-4"><select id="q_c_quality_received_amount_unit"
                                                                  name="q_c_quality_received_amount_unit"
                                                                  style="width: 100%;"></select></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="q_c_approved_claim_amount">Approved Claim Amount</label>
                                <input type="text" id="q_c_approved_claim_amount" name="q_c_approved_claim_amount"
                                       autocomplete="off" class="form-control " value="">
                            </div>
                            <div class="form-group" id="data_23">
                                <label class="font-noraml" for="q_c_amount_received_date">Amount Received Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control"
                                           name="q_c_amount_received_date" id="q_c_amount_received_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="q_c_received_account_number">Received Account Name</label>
                                <input type="text" id="q_c_received_account_number" name="q_c_received_account_number"
                                       autocomplete="off" class="form-control text-box" value="">
                            </div>

                            <div class="form-group">
                                <label for="q_c_payment_mode">Payment Mode</label>
                                <input type="text" id="q_c_payment_mode" name="q_c_payment_mode" autocomplete="off"
                                       class="form-control text-box" value="">
                            </div>
                            <div class="form-group">
                                <label for="upload_claim_letter">Upload Claim Letter</label>
                                <div id="upload_claim_letter">
                                </div>
                                <div id="upload_claim_letter_div">
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="upload_payment_copy">Upload Payment Copy</label>
                                <div id="upload_payment_copy">
                                </div>
                                <div id="upload_payment_copy_div">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="r15" class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>Debit Note</h3>
                            <div class="form-group">
                                <label for="debit_note_number">Debit Note Number</label>
                                <input type="text" id="debit_note_number" name="debit_note_number" autocomplete="off"
                                       class="form-control text-box" value="">
                            </div>
                            <div class="form-group" id="data_24">
                                <label class="font-noraml" for="debit_note_date">Debit Note Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control"
                                           name="debit_note_date" id="debit_note_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="debit_note_amount">Debit Note Amount</label>
                                <input type="text" disabled="" id="debit_note_amount" name="debit_note_amount"
                                       autocomplete="off" class="form-control " value="">
                            </div>
                            <div class="form-group">
                                <label for="debit_note_received_amount">Received Amount</label>
                                <div class="row">
                                    <div class="col-xs-8">
                                        <input type="text" id="debit_note_received_amount"
                                               name="debit_note_received_amount" autocomplete="off"
                                               class="form-control " value="">
                                    </div>
                                    <div class="col-xs-4">
                                        <select id="debit_note_received_amount_unit"
                                                name="debit_note_received_amount_unit"
                                                style="width: 100%;"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="data_25">
                                <label class="font-noraml" for="debit_note_amount_received_date">Amount Received
                                    Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control"
                                           name="debit_note_amount_received_date" id="debit_note_amount_received_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="debit_note_received_account_number">Received Account Name</label>
                                <input type="text" id="debit_note_received_account_number"
                                       name="debit_note_received_account_number" autocomplete="off"
                                       class="form-control text-box" value="">
                            </div>
                            <div class="form-group">
                                <label for="debit_note_payment_mode">Payment Mode</label>
                                <input type="text" id="debit_note_payment_mode" name="debit_note_payment_mode"
                                       autocomplete="off" class="form-control text-box" value="">
                            </div>

                            <div class="form-group">
                                <label for="upload_letter">Upload Letter</label>
                                <div id="upload_letter">
                                </div>
                                <div id="upload_letter_div">
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="debit_note_remarks">Remarks</label>
                                <input type="text" id="debit_note_remarks" name="debit_note_remarks" autocomplete="off"
                                       class="form-control text-box" value="">
                            </div>
                            <div class="form-group">
                                <label for="debit_upload_payment_copy">Upload Payment Copy</label>
                                <div id="debit_upload_payment_copy">
                                </div>
                                <div id="debit_upload_payment_copy_div">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="r16" class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>Carrying Charge</h3>
                            <div class="form-group" id="data_26">
                                <label class="font-noraml" for="cc_lc_opening_date">LC Opening Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control"
                                           name="cc_lc_opening_date" id="cc_lc_opening_date">
                                </div>
                            </div>
                            <div class="form-group" id="data_27">
                                <label class="font-noraml" for="cc_actual_lc_opening_date">Actual LC Opening
                                    Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control"
                                           name="cc_actual_lc_opening_date" id="cc_actual_lc_opening_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cc_no_of_days_late">NO. Of Days Late</label>
                                <input type="text" id="cc_no_of_days_late" name="cc_no_of_days_late" autocomplete="off"
                                       class="form-control " value="">
                            </div>
                            <div class="form-group">
                                <label for="cc_amount">Amount</label>
                                <div class="row">
                                    <div class="col-xs-8">
                                        <input type="text" id="cc_amount" name="cc_amount" autocomplete="off"
                                               class="form-control " value="">
                                    </div>
                                    <div class="col-xs-4">
                                        <select id="cc_amount_unit" name="cc_amount_unit"
                                                style="width: 100%;"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cc_payment_mode">Payment Mode</label>
                                <input type="text" id="cc_payment_mode" name="cc_payment_mode" autocomplete="off"
                                       class="form-control text-box" value="">
                            </div>
                            <div class="form-group">
                                <label for="cc_remarks">Remarks</label>
                                <input type="text" id="cc_remarks" name="cc_remarks" autocomplete="off"
                                       class="form-control text-box" value="">
                            </div>
                            <div class="form-group">
                                <label for="upload_carrying_copy">Upload Carrying Copy</label>
                                <div id="upload_carrying_copy">
                                </div>
                                <div id="upload_carrying_copy_div">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="r17" class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>LC Amendment Charge</h3>
                            <div class="form-group">
                                <label for="lc_amendment_charge_amount">LC Amendment Charge Amount</label>
                                <div class="row">
                                    <div class="col-xs-8">
                                        <input type="text" id="lc_amendment_charge_amount"
                                               name="lc_amendment_charge_amount" autocomplete="off"
                                               class="form-control " value="">
                                    </div>
                                    <div class="col-xs-4">
                                        <select id="lc_amendment_charge_amount_unit"
                                                name="lc_amendment_charge_amount_unit"
                                                style="width: 100%;"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lc_amendment_charge_payment_mode">Payment Mode</label>
                                <input type="text" id="lc_amendment_charge_payment_mode"
                                       name="lc_amendment_charge_payment_mode" autocomplete="off"
                                       class="form-control text-box" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="r18" class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>Remarks</h3>
                            <div class="form-group">
                                <label for="remarks_text">Remarks</label>
                                <textarea id="remarks_text" name="remarks_text" autocomplete="off"
                                          class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="all_mail_attachement">All Mail Attachement</label>
                                <div id="all_mail_attachement">
                                </div>
                                <div id="all_mail_attachement_div">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <button type="submit" class="btn btn-block btn-danger">SUBMIT</button>
                </div>
            </div>
        </form>
    </div>



@endsection

@push('scripts')


<script type="text/template" id="qq-template">
    <div class="qq-uploader-selector qq-uploader" qq-drop-area-text="Drop files here">
        <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
            <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                 class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
        </div>
        <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
            <span class="qq-upload-drop-area-text-selector"></span>
        </div>
        <div class="qq-upload-button-selector qq-upload-button">
            <div>Upload a file</div>
        </div>
        <span class="qq-drop-processing-selector qq-drop-processing">
            <span>Processing dropped files...</span>
            <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
        </span>
        <ul class="qq-upload-list-selector qq-upload-list" aria-live="polite" aria-relevant="additions removals">
            <li>
                <div class="qq-progress-bar-container-selector">
                    <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                         class="qq-progress-bar-selector qq-progress-bar"></div>
                </div>
                <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                <img class="qq-thumbnail-selector" qq-max-size="100">
                <span class="qq-upload-file-selector qq-upload-file"></span>
                <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
                <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                <span class="qq-upload-size-selector qq-upload-size"></span>
                <button type="button" class="qq-btn qq-upload-cancel-selector qq-upload-cancel">Cancel</button>
                <button type="button" class="qq-btn qq-upload-retry-selector qq-upload-retry">Retry</button>
                <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">Delete</button>
                <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
            </li>
        </ul>

        <dialog class="qq-alert-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">Close</button>
            </div>
        </dialog>

        <dialog class="qq-confirm-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">No</button>
                <button type="button" class="qq-ok-button-selector">Yes</button>
            </div>
        </dialog>

        <dialog class="qq-prompt-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <input type="text">
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">Cancel</button>
                <button type="button" class="qq-ok-button-selector">Ok</button>
            </div>
        </dialog>
    </div>
</script>
<script>
    $(function () {

        fineuploader("{{$project_id}}", "upload_sales_confirmation");
        fineuploader("{{$project_id}}", "upload_contract_copy");
        fineuploader("{{$project_id}}", "upload_pi_copy");
        fineuploader("{{$project_id}}", "upload_ip_copy");
        fineuploader("{{$project_id}}", "upload_sro_copy");
        fineuploader("{{$project_id}}", "upload_lc_copy");
        fineuploader("{{$project_id}}", "upload_amendment_copy");
        {{--fineuploader("{{$project_id}}", "shipment_advice");--}}
        {{--fineuploader("{{$project_id}}", "upload_nn_documents");--}}
        {{--fineuploader("{{$project_id}}", "invoice_upload_payment_copy");--}}
        {{--fineuploader("{{$project_id}}", "upload_acceptance_copy");--}}
        {{--fineuploader("{{$project_id}}", "upload_controller_documents");--}}
        {{--fineuploader("{{$project_id}}", "s_g_w_c_upload_claim_letter");--}}
        {{--fineuploader("{{$project_id}}", "short_gain_payment_copy");--}}
        fineuploader("{{$project_id}}", "upload_claim_letter");
        fineuploader("{{$project_id}}", "upload_payment_copy");//updates
        fineuploader("{{$project_id}}", "debit_upload_payment_copy");//updates
        fineuploader("{{$project_id}}", "upload_carrying_copy");//updates
        fineuploader("{{$project_id}}", "upload_letter");
        fineuploader("{{$project_id}}", "all_mail_attachement");
    });
</script>
{{--sn--}}
<script src="{{asset('js/shipment.js')}}"></script>
{{--sn--}}
@endpush
@section('module')
    <?php
    $select_classes = [
        'shipment_type',
        'shipment_port_of_loading',
        'shipment_transshipment_port',
        'shipment_port_of_discharge',
        'controller_weight_finalization_area',
        'controller_weight_type',
        'controller_tear_weight_unit',
        'controller_invoice_weight_unit',
        'controller_landing_weight_unit'
    ];?>
    @foreach(\App\Option::all()->pluck('name') as $option)
        @if(in_array($option,$select_classes))
            @continue
        @endif
        @include('modals.module',['select_id'=>$option,'label'=>'Add New'])
    @endforeach
    @foreach ($select_classes as $select_class)
        @include('modals.module_for_class_select',['select_id'=>$select_class,'label'=>'Add New'])
    @endforeach


@endsection
