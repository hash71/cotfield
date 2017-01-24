@extends('layouts.master')
@section('title','Index Page')
@push('styles')
<style>

    @media all and (min-width: 768px) {
        #left_button {
            padding-left: 0
        }

        #right_button {
            padding-right: 0
        }
    }

    @media all and (max-width: 767px) {
        #left_button {
            padding: 10px 0;
        }

        #right_button {
            padding: 10px 0;
        }
    }

    button.dim {
        margin-bottom: 0 !important;
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
</style>

@endpush
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <form id="main_form" method="post" class="" action="{{url('projects').'/'.$project_id}}"
              enctype="multipart/form-data">
            <input type="hidden" name="project_id" value="{{$project_id}}" id="project_id">
            <input type="hidden" name="_method" value="" id="method">
            {!! csrf_field() !!}
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
                                <label for="s_c_crop_year">Comission Rate(%)</label>
                                <input type="text" id="s_c_commission_rate" name="s_c_commission_rate"
                                       autocomplete="off" class="form-control " value="">
                            </div>
                            <div class="form-group">
                                <label for="s_c_crop_year">Shipment</label>
                                <textarea id="s_c_shipment" name="s_c_shipment" autocomplete="off"
                                          class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="s_c_payment">Payment</label>
                                <select id="s_c_payment" name="s_c_payment" style="width: 100%;">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="s_c_crop_year">LC Opening</label>
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
                                <label for="project_name">PI Number</label>
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
                                <label class="font-normal" for="">PI Date</label>
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
                                <label class="font-normal">IP Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control"
                                           name="ip_date" id="ip_date">
                                </div>
                            </div>
                            <div class="form-group" id="data_6">
                                <label class="font-normal">IP Expiry Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control"
                                           name="ip_expiry_date" id="ip_expiry_date">
                                </div>
                            </div>
                            <div class="form-group" id="data_7">
                                <label class="font-normal">SRO Date</label>
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
                                <?php $lc_amendment_dates = json_decode($data['lc_amendment_day']);?>
                                @if(sizeof($lc_amendment_dates))
                                    @foreach($lc_amendment_dates as $lc_amendment_date)
                                        <div class="input-group date" id="lc_amendment_day_element"
                                             style="padding-bottom: 10px;">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" class="form-control"
                                                   name="lc_amendment_day[]" id="lc_amendment_day"
                                                   value="{{$lc_amendment_date}}">
                                        </div>
                                    @endforeach
                                @else
                                    <div class="input-group date" id="lc_amendment_day_element"
                                         style="padding-bottom: 10px;">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" class="form-control"
                                               name="lc_amendment_day[]" id="lc_amendment_day">
                                    </div>
                                @endif


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
            {{--sn--}}

            <input type="hidden" name="shipping_number" id="shipping_number" value="{{$data['shipping_number']}}">
            <div id="group">

                @if($data['shipping_number'])
                    <?php
                    $sea = $road = -1;
                    $i = 0;
                    $shipment_type = json_decode(stripslashes($data['shipment_type']));
                    //                    dd($shipment_type);
                    $shipment_date = json_decode(stripslashes($data['shipment_date']));
                    $shipment_shipping_line = json_decode(stripslashes($data['shipment_shipping_line']));
                    $shipment_vessel_name = json_decode(stripslashes($data['shipment_vessel_name']));
                    $shipment_bill_of_lading = json_decode(stripslashes($data['shipment_bill_of_lading']));
                    $shipment_no_of_containers = json_decode(stripslashes($data['shipment_no_of_containers']));
                    $shipment_no_of_bales = json_decode(stripslashes($data['shipment_no_of_bales']));
                    $transshipment_date = json_decode(stripslashes($data['transshipment_date']));
                    $eta_date = json_decode(stripslashes($data['eta_date']));
                    $shipment_truck_challan_no = json_decode(stripslashes($data['shipment_truck_challan_no']));
                    $shipment_no_of_trucks = json_decode(stripslashes($data['shipment_no_of_trucks']));
                    $nn_commercial_invoice_no = json_decode(stripslashes($data['nn_commercial_invoice_no']));
                    $nn_commercial_invoice_date = json_decode(stripslashes($data['nn_commercial_invoice_date']));
                    $courier_date = json_decode(stripslashes($data['courier_date']));
                    $nn_dhl_courier_details = json_decode(stripslashes($data['nn_dhl_courier_details']));

                    ?>


                    @for($i=0;$i<$data['shipping_number'];$i++)

                        @if($shipment_type[$i] == 'by_sea')
                            <?php $sea++;?>
                            <div class="row" id="{{$i+1}}">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-content">
                                            <h3>Shipment {{$i+1}}</h3>
                                            <div class="form-group">
                                                <label class="font-normal" for="shipment_date">Shipment Date</label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i
                                                                class="fa fa-calendar"></i></span>
                                                    <input type="text" class="form-control" name="shipment_date[]"
                                                           value="{{$shipment_date[$i]}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="shipment_type">Shipment Type</label>
                                                <select name="shipment_type[]" style="width: 100%;height: 30px;"
                                                        class="shipment_type">
                                                    <option value="by_sea" selected>BY SEA</option>
                                                    <option value="by_road">BY ROAD</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="shipment_shipping_line">Shipping Line</label>
                                                <input type="text" name="shipment_shipping_line[]" autocomplete="off"
                                                       class="form-control text-box"
                                                       value="{{$shipment_shipping_line[$sea]}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="shipment_vessel_name">Vessel Name</label>
                                                <input type="text" name="shipment_vessel_name[]" autocomplete="off"
                                                       class="form-control text-box"
                                                       value="{{$shipment_vessel_name[$sea]}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="shipment_bill_of_lading">Bill Of Loading Number</label>
                                                <input type="text" name="shipment_bill_of_lading[]" autocomplete="off"
                                                       class="form-control text-box"
                                                       value="{{$shipment_bill_of_lading[$sea]}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="shipment_no_of_containers">No. Of Containers</label>
                                                <input type="text" name="shipment_no_of_containers[]" autocomplete="off"
                                                       class="form-control "
                                                       value="{{$shipment_no_of_containers[$sea]}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="shipment_no_of_bales">No. Of Bales</label>
                                                <input type="text" name="shipment_no_of_bales[]" autocomplete="off"
                                                       class="form-control " value="{{$shipment_no_of_bales[$i]}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="shipment_port_of_loading">Port Of Loading</label>
                                                <select id="{{"shipment_port_of_loading".($i+1)}}"
                                                        name="shipment_port_of_loading[]" style="width: 100%;"
                                                        class="shipment_port_of_loading">
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="font-normal" for="transshipment_date">Date Of
                                                    Issue</label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i
                                                                class="fa fa-calendar"></i></span>
                                                    <input type="text" class="form-control" name="transshipment_date[]"
                                                           value="{{$transshipment_date[$sea]}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="shipment_transshipment_port">Transshipment Port</label>
                                                <select id={{"shipment_transshipment_port".($i+1)}} name="shipment_transshipment_port[]"
                                                        style="width: 100%;"
                                                        class="shipment_transshipment_port">
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="shipment_port_of_discharge">Port Of Discharge</label>
                                                <select id="{{"shipment_port_of_discharge".($i+1)}}"
                                                        name="shipment_port_of_discharge" style="width: 100%;"
                                                        class="shipment_port_of_discharge">
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="font-normal" for="eta_date">ETA Date</label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i
                                                                class="fa fa-calendar"></i></span>
                                                    <input type="text" class="form-control" name="eta_date[]"
                                                           value="{{$eta_date[$sea]}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="shipment_advice{{'_'.($i+1)}}">Shipment Advice</label>
                                                <div id="shipment_advice{{'_'.($i+1)}}">
                                                </div>
                                                <div id="shipment_advice_{{($i+1).'_div'}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @elseif($shipment_type[$i] == 'by_road')
                            <?php $road++;?>
                            <div class="row" id="{{$i+1}}">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-content">
                                            <h3>Shipment {{$i+1}}</h3>
                                            <div class="form-group">
                                                <label class="font-normal" for="shipment_date">Shipment Date</label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i
                                                                class="fa fa-calendar"></i></span>
                                                    <input type="text" class="form-control" name="shipment_date[]"
                                                           value="{{$shipment_date[$i]}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="shipment_type">Shipment Type</label>
                                                <select name="shipment_type[]"
                                                        style="width: 100%;height: 30px;"
                                                        class="shipment_type">
                                                    <option value="by_road" selected>BY ROAD</option>
                                                    <option value="by_sea">BY SEA</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="shipment_truck_challan_no">Truck Chalan No.</label>
                                                <input type="text" name="shipment_truck_challan_no[]" autocomplete="off"
                                                       class="form-control text-box"
                                                       value="{{$shipment_truck_challan_no[$road]}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="shipment_no_of_trucks">No. Of Trucks</label>
                                                <input type="text" name="shipment_no_of_trucks[]" autocomplete="off"
                                                       class="form-control text-box"
                                                       value="{{$shipment_no_of_trucks[$road]}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="shipment_no_of_bales">No. Of Bales</label>
                                                <input type="text" name="shipment_no_of_bales[]" autocomplete="off"
                                                       class="form-control text-box"
                                                       value="{{$shipment_no_of_bales[$i]}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="shipment_port_of_loading">Port Of Loading</label>
                                                <select id="{{"shipment_port_of_loading".($i+1)}}"
                                                        name="shipment_port_of_loading[]" style="width: 100%;"
                                                        class="shipment_port_of_loading">
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="shipment_port_of_discharge">Port Of Discharge</label>
                                                <select id="{{"shipment_port_of_discharge".($i+1)}}"
                                                        name="shipment_port_of_discharge[]" style="width: 100%;"
                                                        class="shipment_port_of_discharge">
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="shipment_advice{{'_'.($i+1)}}">Shipment Advice</label>
                                                <div id="shipment_advice{{'_'.($i+1)}}">
                                                </div>
                                                <div id="shipment_advice_{{($i+1).'_div'}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="row" id="{{$i+1}}">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content">
                                        <h3>NN Documents {{$i+1}}</h3>
                                        <div class="form-group">
                                            <label for="nn_commercial_invoice_no">Commercial Invoice Number</label>
                                            <input type="text" name="nn_commercial_invoice_no[]" autocomplete="off"
                                                   class="form-control text-box"
                                                   value="{{$nn_commercial_invoice_no[$i]}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="font-normal" for="nn_commercial_invoice_date">Commercial
                                                Invoice Date
                                            </label>
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input type="text" class="form-control"
                                                       name="nn_commercial_invoice_date[]"
                                                       value="{{$nn_commercial_invoice_date[$i]}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-normal" for="courier_date">Courier Date</label>
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input type="text" class="form-control" name="courier_date[]"
                                                       value="{{$courier_date[$i]}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nn_dhl_courier_name">Courier Name</label>
                                            <input type="text" name="nn_dhl_courier_name[]" autocomplete="off"
                                                   class="form-control text-box" value=" ">
                                        </div>
                                        <div class="form-group">
                                            <label for="nn_dhl_courier_details">File Number</label>
                                            <input type="text" name="nn_dhl_courier_details[]" autocomplete="off"
                                                   class="form-control text-box"
                                                   value="{{$nn_dhl_courier_details[$i]}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="upload_nn_documents{{'_'.($i+1)}}">Upload NN Documents</label>
                                            <div id="upload_nn_documents{{'_'.($i+1)}}">
                                            </div>
                                            <div id="upload_nn_documents_{{($i+1).'_div'}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    @endfor
                    <div class="row" id="shipment_button">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div style="margin-bottom: 10px">
                                <button onclick="add_more_shipment_button()" type="button"
                                        class="btn btn-success btn-outline btn-block" href="#"
                                        style="width: 50%;margin: auto;">Add More Shipment
                                </button>
                            </div>
                            <div style="margin: 10px 0;">
                                <button onclick="delete_shipment_button()" type="button"
                                        class="btn btn-danger btn-outline btn-block" href="#"
                                        style="width: 50%;margin: auto;">Delete Last Shipment
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            {{--sn--}}
            <div id="r11" class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>Payment</h3>
                            <div class="form-group" id="data_17">
                                <label class="font-normal" for="payment_invoice_payment_date">Invoice Payment
                                    Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control"
                                           name="payment_invoice_payment_date" id="payment_invoice_payment_date">
                                </div>
                            </div>
                            <div class="form-group" id="data_18">
                                <label class="font-normal" for="payment_acceptance_date">Payment Acceptance Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control"
                                           name="payment_acceptance_date" id="payment_acceptance_date">
                                </div>
                            </div>
                            <div class="form-group" id="data_19">
                                <label class="font-normal" for="payment_maturity_due_date">Maturity Due Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control"
                                           name="payment_maturity_due_date" id="payment_maturity_due_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="invoice_upload_payment_copy">Upload Payment Copy</label>
                                <div id="invoice_upload_payment_copy">
                                </div>
                                <div id="invoice_upload_payment_copy_div">
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="upload_acceptance_copy">Upload Acceptance Copy</label>
                                <div id="upload_acceptance_copy">
                                </div>
                                <div id="upload_acceptance_copy_div">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="r12" class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>Controller</h3>
                            <div class="form-group">
                                <label for="controller_name">Controller Name</label>
                                <input type="text" id="controller_name" name="controller_name" autocomplete="off"
                                       class="form-control text-box" value="">
                            </div>
                            <div class="form-group">
                                <label for="controller_weight_finalization_area">Weight Finalization Area</label>
                                <select id="controller_weight_finalization_area"
                                        name="controller_weight_finalization_area" style="width: 100%;">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="controller_weight_type">Weight Type</label>
                                <select id="controller_weight_type" name="controller_weight_type" style="width: 100%;">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="controller_tear_weight">Tear Weight</label>
                                <div class="row">
                                    <div class="col-xs-8"><input type="text" id="controller_tear_weight"
                                                                 name="controller_tear_weight" autocomplete="off"
                                                                 class="form-control " value=""></div>
                                    <div class="col-xs-4"><select id="controller_tear_weight_unit"
                                                                  name="controller_tear_weight_unit"
                                                                  style="width: 100%;"></select></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="controller_invoice_weight">Invoice Weight</label>
                                <div class="row">
                                    <div class="col-xs-8"><input type="text" id="controller_invoice_weight"
                                                                 name="controller_invoice_weight" autocomplete="off"
                                                                 class="form-control" value=""></div>
                                    <div class="col-xs-4"><select id="controller_invoice_weight_unit"
                                                                  name="controller_invoice_weight_unit"
                                                                  style="width: 100%;"></select></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="controller_landing_weight">Landing Weight</label>
                                <div class="row">
                                    <div class="col-xs-8"><input type="text" id="controller_landing_weight"
                                                                 name="controller_landing_weight" autocomplete="off"
                                                                 class="form-control " value=""></div>
                                    <div class="col-xs-4"><select id="controller_landing_weight_unit"
                                                                  name="controller_landing_weight_unit"
                                                                  style="width: 100%;"></select></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="controller_short_gain_weight">Short/Gain Weight</label>
                                <input type="text" disabled="" id="controller_short_gain_weight"
                                       name="controller_short_gain_weight" autocomplete="off" class="form-control "
                                       value="">
                            </div>
                            <div class="form-group">
                                <label for="upload_controller_documents">Upload Controller Documents</label>
                                <div id="upload_controller_documents">
                                </div>
                                <div id="upload_controller_documents_div">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="r13" class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>Short/Gain Weight Claim</h3>
                            <div class="form-group" id="data_20">
                                <label class="font-noraml" for="s_g_w_c_short_gain_weight_claim_date">Short/Gain Weight
                                    Claim Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" name="s_g_w_c_short_gain_weight_claim_date"
                                           class="form-control" id="s_g_w_c_short_gain_weight_claim_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="s_g_w_c_short_gain_weight_claim_qty">Short/Gain Weight
                                    Claim QTY.</label>
                                <input type="text" disabled="" id="s_g_w_c_short_gain_weight_claim_qty"
                                       name="s_g_w_c_short_gain_weight_claim_qty" autocomplete="off"
                                       class="form-control " value="">
                            </div>
                            <div class="form-group">
                                <label for="s_g_w_c_short_gain_weight_claim_amount">Short/Gain Weight
                                    Claim Amount</label>
                                <input type="text" disabled="" id="s_g_w_c_short_gain_weight_claim_amount"
                                       name="s_g_w_c_short_gain_weight_claim_amount" autocomplete="off"
                                       class="form-control " value="">
                            </div>
                            <div class="form-group" id="data_21">
                                <label class="font-noraml" for="s_g_w_c_amount_received_date">Amount Received
                                    Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control"
                                           name="s_g_w_c_amount_received_date" id="s_g_w_c_amount_received_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="s_g_w_c_received_account_number">Received Account Name</label>
                                <input type="text" id="s_g_w_c_received_account_number"
                                       name="s_g_w_c_received_account_number" autocomplete="off"
                                       class="form-control text-box" value="">
                            </div>
                            <div class="form-group">
                                <label for="s_g_w_c_payment_mode">Payment Mode</label>
                                <input type="text" id="s_g_w_c_payment_mode" name="s_g_w_c_payment_mode"
                                       autocomplete="off" class="form-control text-box" value="">
                            </div>
                            <div class="form-group">
                                <label for="s_g_w_c_remarks">Remarks</label>
                                <input type="text" id="s_g_w_c_remarks" name="s_g_w_c_remarks" autocomplete="off"
                                       class="form-control text-box" value="">
                            </div>
                            <div class="form-group">
                                <label for="s_g_w_c_upload_claim_letter">Upload Claim Letter</label>
                                <div id="s_g_w_c_upload_claim_letter">
                                </div>
                                <div id="s_g_w_c_upload_claim_letter_div">
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="short_gain_payment_copy">Upload Payment Copy</label>
                                <div id="short_gain_payment_copy">
                                </div>
                                <div id="short_gain_payment_copy_div">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                {{--<div class="col-lg-8 col-lg-offset-2">--}}
                {{--<button type="submit" class="btn btn-block btn-danger">SUBMIT</button>--}}
                {{--</div>--}}

                <div class="col-lg-8 col-lg-offset-2">
                    <div class="col-sm-6" id="left_button">
                        <button type="button" class="btn btn-success btn-outline btn-block" href="#">SAVE
                        </button>
                    </div>
                    <div class="col-sm-6" id="right_button">
                        <button type="button" class="btn btn-danger btn-outline btn-block" href="#">DELETE
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>



@endsection

@push('scripts')
<script>
    $('#left_button').on('click', function () {
//        console.log("left");
        $('#method').val("put");
        $('#main_form').submit();
    });
    $('#right_button').on('click', function () {
        $('#method').val("delete");
        $('#main_form').submit();
    });
</script>

<script>

    var allData = <?php echo json_encode($data);?>; //all data about a project
    //    console.log(allData);
    var onlyInputElementData = JSON.parse(JSON.stringify(allData)); // only for input boxes not select boxes
    var options = <?php echo json_encode($option_list);?>; //all option name only
    var option_list = []; //option value array
    var i;

    for (i = 0; i < options.length; i++) {
        option_list[options[i]] = allData[options[i]];
        delete onlyInputElementData[options[i]];
    }
    //    $("[name]").each(function(){console.log($(this).attr('name'))})

    for (key in onlyInputElementData) {
        if (key == 'lc_amendment_day') continue;
        $('#' + key).val(onlyInputElementData[key]);
    }


    var diff1 = $('#controller_invoice_weight').val() - $('#controller_landing_weight').val();
    $('#s_g_w_c_short_gain_weight_claim_qty').attr('value', diff1);
    $('#s_g_w_c_short_gain_weight_claim_amount').attr('value', $('#s_c_price').val() * diff1);


    var diff2 = $('#controller_invoice_weight').val() - $('#controller_landing_weight').val();
    $('#s_g_w_c_short_gain_weight_claim_qty').attr('value', diff2);
    $('#s_g_w_c_short_gain_weight_claim_amount').attr('value', $('#s_c_price').val() * diff2);


    (function () {


        var file_upload_ids = [
            "upload_sales_confirmation",
            "upload_contract_copy",
            "upload_ip_copy",
            "upload_sro_copy",
            "upload_lc_copy",
            "upload_amendment_copy",
//            "shipment_advice",
//            "upload_nn_documents",
            "invoice_upload_payment_copy",
            "upload_acceptance_copy",
            "upload_controller_documents",
            "s_g_w_c_upload_claim_letter",
            "short_gain_payment_copy",
            "upload_claim_letter",
            "upload_payment_copy",
            "debit_upload_payment_copy",
            "upload_carrying_copy",
            "upload_letter",
            "all_mail_attachement"
        ];
        var i;
        for (i = 0; i < file_upload_ids.length; i++) {


            var target_url = "{{URL::to('initial_file_list')}}" + "/" + "{{$project_id}}" + "/" + file_upload_ids[i];

            $.get(
                target_url,
                function (data, status) {


                    for (var k = 0; k < data.length; k++) {
                        var $initial_element = document.getElementById(data[k].select_id + "_div");
                        console.log($initial_element);
                        var row = '<div id=' + data[k].uuid + ' class="form-group" style="padding: 10px 0 0;"><a target="_blank" href="' + '{{URL::to('download')}}' + '/' + data[k].uuid + '"><button class="btn btn-outline btn-primary dim btn-sm" type="button"><i class="fa fa-check">Download</i></button></a><span>' + data[k].name + '</span></div>';
                        $initial_element.innerHTML += row;
                    }

                }
            );
        }

    })();


</script>


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
        fineuploader("{{$project_id}}", "invoice_upload_payment_copy");
        fineuploader("{{$project_id}}", "upload_acceptance_copy");
        fineuploader("{{$project_id}}", "upload_controller_documents");
        fineuploader("{{$project_id}}", "s_g_w_c_upload_claim_letter");
        fineuploader("{{$project_id}}", "short_gain_payment_copy");
        fineuploader("{{$project_id}}", "upload_claim_letter");
        fineuploader("{{$project_id}}", "upload_payment_copy");
        fineuploader("{{$project_id}}", "debit_upload_payment_copy");
        fineuploader("{{$project_id}}", "upload_carrying_copy");
        fineuploader("{{$project_id}}", "upload_letter");
        fineuploader("{{$project_id}}", "all_mail_attachement");

//        sn
        @for($i=1;$i<=$data['shipping_number'];$i++)
        fineuploader("{{$project_id}}", "shipment_advice_" + '{{$i}}');
        var target_url = "{{URL::to('initial_file_list')}}" + "/" + "{{$project_id}}" + "/" + "shipment_advice_" + '{{$i}}';

        $.get(
            target_url,
            function (data, status) {


                for (var k = 0; k < data.length; k++) {
                    var $initial_element = document.getElementById(data[k].select_id + "_div");
                    console.log($initial_element);
                    var row = '<div id=' + data[k].uuid + ' class="form-group" style="padding: 10px 0 0;"><a target="_blank" href="' + '{{URL::to('download')}}' + '/' + data[k].uuid + '"><button class="btn btn-outline btn-primary dim btn-sm" type="button"><i class="fa fa-check">Download</i></button></a><span>' + data[k].name + '</span></div>';
                    $initial_element.innerHTML += row;
                }

            }
        );
        fineuploader("{{$project_id}}", "upload_nn_documents_" + '{{$i}}');
        var target_url = "{{URL::to('initial_file_list')}}" + "/" + "{{$project_id}}" + "/" + "upload_nn_documents_" + '{{$i}}';

        $.get(
            target_url,
            function (data, status) {


                for (var k = 0; k < data.length; k++) {
                    var $initial_element = document.getElementById(data[k].select_id + "_div");
                    console.log($initial_element);
                    var row = '<div id=' + data[k].uuid + ' class="form-group" style="padding: 10px 0 0;"><a target="_blank" href="' + '{{URL::to('download')}}' + '/' + data[k].uuid + '"><button class="btn btn-outline btn-primary dim btn-sm" type="button"><i class="fa fa-check">Download</i></button></a><span>' + data[k].name + '</span></div>';
                    $initial_element.innerHTML += row;
                }

            }
        );
        @endfor
        {{--sn--}}
    });
</script>
<script>
    $(function () {

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": false,
            "preventDuplicates": true,
            "positionClass": "toast-top-center",
            "onclick": null,
            "showDuration": "400",
            "hideDuration": "1000",
            "timeOut": "0",
            "extendedTimeOut": "0",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        $('.input-group.date').datepicker({
            format: 'yyyy-mm-dd',
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });
    });
</script>
@endpush
@section('module')
    <?php
    $select_classes = [
        'shipment_type',
        'shipment_port_of_loading',
        'shipment_transshipment_port',
        'shipment_port_of_discharge'
    ];?>
    @foreach(\App\Option::all()->pluck('name') as $option)
        @if(in_array($option,$select_classes))
            @continue
        @endif
        @include('modals.edit_module',['select_id'=>$option,'label'=>'Add New'])
    @endforeach
    @foreach ($select_classes as $select_class)
        @include('modals.module_for_class_select',['select_id'=>$select_class,'label'=>'Add New'])
    @endforeach


    {{--@foreach(\App\Option::all()->pluck('name') as $option)--}}
    {{--@include('modals.edit_module',['select_id'=>$option,'label'=>'Add New'])--}}
    {{--@endforeach--}}
    {{--sn--}}
    <script src="{{asset('js/shipment.js')}}"></script>


    <script>
        $(function () {
            $('.shipment_type').on('change', toggle_sea_road);
            var classes_for_partial = [
                'shipment_port_of_loading',
                'shipment_transshipment_port',
                'shipment_port_of_discharge'
            ];
                    @if($data['shipping_number'])
            var shipment_transshipment_ports = JSON.parse('<?php echo stripslashes($data['shipment_transshipment_port']);?>');
            var shipment_port_of_loadings = JSON.parse('<?php echo stripslashes($data['shipment_port_of_loading']);?>');
            var shipment_port_of_discharges = JSON.parse('<?php echo stripslashes($data['shipment_port_of_discharge']);?>');
            @endif


    $('.shipment_transshipment_port').each(function (index) {

                var id = $(this).attr('id');
                var className = $(this).attr('class');

                if (!$("#" + id).hasClass("select2-hidden-accessible")) {

                    $("#" + id).select2({
                        placeholder: "select",
                        allowClear: true
                    }).on('select2:opening', getOptionsListShipment(className, id, shipment_transshipment_ports[index])).on('select2:open', {className: className}, function (evt) {
                            $(".select2-dropdown.select2-dropdown--below .btn.btn-primary").remove();
                            $(".select2-dropdown.select2-dropdown--below").append('<div class="text-center"><a data-toggle="modal" class="btn btn-primary" href="#modal-' + evt.data.className + '">ADD NEW</a></div>');
                            $(".select2-dropdown.select2-dropdown--below .btn.btn-primary").css({
                                'width': '100%',
                                'border-radius': '0'
                            });
                        }
                    );
                }


            });
            $('.shipment_port_of_loading').each(function (index) {
                var id = $(this).attr('id');
                var className = $(this).attr('class');

                if (!$("#" + id).hasClass("select2-hidden-accessible")) {

                    $("#" + id).select2({
                        placeholder: "select",
                        allowClear: true
                    }).on('select2:opening', getOptionsListShipment(className, id, shipment_port_of_loadings[index])).on('select2:open', {className: className}, function (evt) {
                            $(".select2-dropdown.select2-dropdown--below .btn.btn-primary").remove();
                            $(".select2-dropdown.select2-dropdown--below").append('<div class="text-center"><a data-toggle="modal" class="btn btn-primary" href="#modal-' + evt.data.className + '">ADD NEW</a></div>');
                            $(".select2-dropdown.select2-dropdown--below .btn.btn-primary").css({
                                'width': '100%',
                                'border-radius': '0'
                            });
                        }
                    );
                }

            });
            $('.shipment_port_of_discharge').each(function (index) {
                var id = $(this).attr('id');
                var className = $(this).attr('class');

                if (!$("#" + id).hasClass("select2-hidden-accessible")) {

                    $("#" + id).select2({
                        placeholder: "select",
                        allowClear: true
                    }).on('select2:opening', getOptionsListShipment(className, id, shipment_port_of_discharges[index])).on('select2:open', {className: className}, function (evt) {
                            $(".select2-dropdown.select2-dropdown--below .btn.btn-primary").remove();
                            $(".select2-dropdown.select2-dropdown--below").append('<div class="text-center"><a data-toggle="modal" class="btn btn-primary" href="#modal-' + evt.data.className + '">ADD NEW</a></div>');
                            $(".select2-dropdown.select2-dropdown--below .btn.btn-primary").css({
                                'width': '100%',
                                'border-radius': '0'
                            });
                        }
                    );
                }

            });

        });

    </script>
    {{--sn--}}
@endsection
