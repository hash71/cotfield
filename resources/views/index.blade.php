@extends('layouts.master')
@section('title','Index Page')
@push('styles')

<style>
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
        <form id="main_form" method="post" class="" action="{{url('projects/store')}}" enctype="multipart/form-data">
            <input type="hidden" name="project_id" value="{{$project_id}}" id="project_id">
            {!! csrf_field() !!}
            <div class="row">
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
            <div class="row">
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
            <div class="row">
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
            <div class="row">
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
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Select file</span>
            <span class="fileinput-exists">Change</span>

            <input type="file" name="upload_sales_confirmation" id="upload_sales_confirmation">
            </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                       data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>Contract</h3>
                            <div class="form-group">
                                <label for="contract_number">Supplier Name</label>
                                <input type="text" id="contract_number" name="contract_number" autocomplete="off"
                                       class="form-control text-box" value="">
                            </div>
                            <div class="form-group" id="data_1">
                                <label class="font-normal">Contract Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input
                                            type="text" class="form-control" value="{{date("d/m/Y")}}"
                                            name="contract_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="upload_sales_confirmation">Upload Contract Copy</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Select file</span>
            <span class="fileinput-exists">Change</span>

            <input type="file" name="upload_contract_copy" id="upload_sales_confirmation">
            </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                       data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>Performa Invoice</h3>
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
                                    <input type="text" class="form-control" value="{{date(" d/m/Y ")}}" name="pi_date"
                                           id="pi_date">
                                </div>
                            </div>
                            <div class="form-group" id="data_3">
                                <label for="last_date_of_lc_opening" class="font-normal">Last Date Of LC Opening</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" value="{{date(" d/m/Y ")}}"
                                           name="last_date_of_lc_opening" id="last_date_of_lc_opening">
                                </div>
                            </div>
                            <div class="form-group" id="data_4">
                                <label for="last_date_of_shipment" class="font-normal">Last Date Of Shipment</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" value="{{date(" d/m/Y ")}}"
                                           name="last_date_of_shipment" id="last_date_of_shipment">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
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
                                    <input type="text" class="form-control" value="{{date(" d/m/Y ")}}"
                                           name="ip_date">
                                </div>
                            </div>
                            <div class="form-group" id="data_6">
                                <label class="font-normal">IP Expiry Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" value="{{date(" d/m/Y ")}}"
                                           name="ip_expiry_date">
                                </div>
                            </div>
                            <div class="form-group" id="data_7">
                                <label class="font-normal">SRO Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" value="{{date(" d/m/Y ")}}"
                                           name="sro_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="upload_sales_confirmation">Upload IP Copy</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Select file</span>
            <span class="fileinput-exists">Change</span>
            <input type="file" name="upload_ip_copy" id="upload_ip_copy">
            </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                       data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="upload_sales_confirmation">Upload SRO Copy</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Select file</span>
            <span class="fileinput-exists">Change</span>
            <input type="file" name="upload_sro_copy" id="upload_sro_copy">
            </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                       data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
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
                                <label class="font-normal" for="date_of_issue">Date Of Issue</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" value="{{date(" d/m/Y ")}}"
                                           name="date_of_issue" id="date_of_issue">
                                </div>
                            </div>
                            <div class="form-group" id="data_9">
                                <label class="font-normal" for="date_of_expiry">Date Of Expiry</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" value="{{date(" d/m/Y ")}}"
                                           name="date_of_expiry" id="date_of_expiry">
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
                                    <input type="text" class="form-control" value="{{date(" d/m/Y ")}}"
                                           name="latest_date_of_shipment" id="latest_date_of_shipment">
                                </div>
                            </div>
                            <div class="form-group" id="data_11">
                                <label class="font-normal" for="lc_amendment_day">LC Amendment Day</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" value="{{date(" d/m/Y ")}}"
                                           name="lc_amendment_day" id="lc_amendment_day">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="upload_lc_copy">Upload LC Copy</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Select file</span>
            <span class="fileinput-exists">Change</span>
            <input type="file" name="upload_lc_copy" id="upload_lc_copy">
            </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                       data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="upload_amendment_copy">Upload Amendment Copy</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Select file</span>
            <span class="fileinput-exists">Change</span>
            <input type="file" name="upload_amendment_copy" id="upload_amendment_copy">
            </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                       data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>Shipment</h3>
                            <div class="form-group" id="data_12">
                                <label class="font-normal" for="shipment_date">Shipment Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" value="{{date(" d/m/Y ")}}"
                                           name="shipment_date" id="shipment_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="shipment_type">Shipment Type</label>
                                <select id="shipment_type" name="shipment_type" style="width: 100%;">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="shipment_shipping_line">Shipping Line</label>
                                <input type="text" id="shipment_shipping_line" name="shipment_shipping_line"
                                       autocomplete="off" class="form-control text-box" value="">
                            </div>
                            <div class="form-group">
                                <label for="shipment_vessel_name">Vessel Name</label>
                                <input type="text" id="shipment_vessel_name" name="shipment_vessel_name"
                                       autocomplete="off" class="form-control text-box" value="">
                            </div>
                            <div class="form-group">
                                <label for="shipment_bill_of_lading">Bill Of Loading Number</label>
                                <input type="text" id="shipment_bill_of_lading" name="shipment_bill_of_lading"
                                       autocomplete="off" class="form-control text-box" value="">
                            </div>
                            <div class="form-group">
                                <label for="shipment_no_of_containers">No. Of Containers</label>
                                <input type="text" id="shipment_no_of_containers" name="shipment_no_of_containers"
                                       autocomplete="off" class="form-control " value="">
                            </div>
                            <div class="form-group">
                                <label for="shipment_no_of_bales">No. Of Bales</label>
                                <input type="text" id="shipment_no_of_bales" name="shipment_no_of_bales"
                                       autocomplete="off" class="form-control " value="">
                            </div>

                            <div class="form-group">
                                <label for="shipment_port_of_loading">Port Of Loading</label>
                                <select id="shipment_port_of_loading" name="shipment_port_of_loading"
                                        style="width: 100%;">
                                </select>
                            </div>
                            <div class="form-group" id="data_12">
                                <label class="font-normal" for="transshipment_date">Date Of Issue</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" value="{{date(" d/m/Y ")}}"
                                           name="transshipment_date" id="transshipment_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="shipment_transshipment_port">Transshipment Port</label>
                                <select id="shipment_transshipment_port" name="shipment_transshipment_port"
                                        style="width: 100%;">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="shipment_port_of_discharge">Port Of Discharge</label>
                                <select id="shipment_port_of_discharge" name="shipment_port_of_discharge"
                                        style="width: 100%;">
                                </select>
                            </div>
                            <div class="form-group" id="data_13">
                                <label class="font-normal" for="eta_date">ETA Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" value="{{date(" d/m/Y ")}}" name="eta_date"
                                           id="eta_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="shipment_advice">Shipment Advice</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Select file</span>
            <span class="fileinput-exists">Change</span>
            <input type="file" name="shipment_advice" id="shipment_advice">
            </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                       data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>NN Documents</h3>
                            <div class="form-group">
                                <label for="nn_commercial_invoice_no">Commercial Invoice Number</label>
                                <input type="text" id="nn_commercial_invoice_no" name="nn_commercial_invoice_no"
                                       autocomplete="off" class="form-control text-box" value="">
                            </div>
                            <div class="form-group" id="data_14">
                                <label class="font-normal" for="nn_commercial_invoice_date">Commercial Invoice
                                    Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" value="{{date(" d/m/Y ")}}"
                                           name="nn_commercial_invoice_date" id="nn_commercial_invoice_date">
                                </div>
                            </div>
                            <div class="form-group" id="data_15">
                                <label class="font-normal" for="courier_date">Courier Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" value="{{date(" d/m/Y ")}}"
                                           name="courier_date" id="courier_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nn_dhl_courier_name">Courier Name</label>
                                <input type="text" id="nn_dhl_courier_name" name="nn_dhl_courier_name"
                                       autocomplete="off" class="form-control text-box" value="">
                            </div>
                            <div class="form-group">
                                <label for="nn_dhl_courier_details">File Number</label>
                                <input type="text" id="nn_dhl_courier_details" name="nn_dhl_courier_details"
                                       autocomplete="off" class="form-control text-box" value="">
                            </div>
                            <div class="form-group">
                                <label for="upload_nn_documents">Upload NN Documents</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Select file</span>
            <span class="fileinput-exists">Change</span>
            <input type="file" name="upload_nn_documents" id="upload_nn_documents">
            </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                       data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>Payment</h3>
                            <div class="form-group" id="data_16">
                                <label class="font-normal" for="payment_invoice_payment_date">Invoice Payment
                                    Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" value="{{date(" d/m/Y ")}}"
                                           name="payment_invoice_payment_date" id="payment_invoice_payment_date">
                                </div>
                            </div>
                            <div class="form-group" id="data_17">
                                <label class="font-normal" for="payment_acceptance_date">Payment Acceptance Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" value="{{date(" d/m/Y ")}}"
                                           name="payment_acceptance_date" id="payment_acceptance_date">
                                </div>
                            </div>
                            <div class="form-group" id="data_18">
                                <label class="font-normal" for="payment_maturity_due_date">Maturity Due Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" value="{{date(" d/m/Y ")}}"
                                           name="payment_maturity_due_date" id="payment_maturity_due_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="invoice_upload_payment_copy">Upload Payment Copy</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Select file</span>
            <span class="fileinput-exists">Change</span>
            <input type="file" name="invoice_upload_payment_copy" id="invoice_upload_payment_copy">
            </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                       data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="upload_acceptance_copy">Upload Acceptance Copy</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Select file</span>
            <span class="fileinput-exists">Change</span>
            <input type="file" name="upload_acceptance_copy" id="upload_acceptance_copy">
            </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                       data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
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
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Select file</span>
            <span class="fileinput-exists">Change</span>
            <input type="file" name="upload_controller_documents" id="upload_controller_documents">
            </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                       data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>Short/Gain Weight Claim</h3>
                            <div class="form-group" id="data_19">
                                <label class="font-noraml" for="s_g_w_c_short_gain_weight_claim_date">Short/Gain Weight
                                    Claim Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" id="s_g_w_c_short_gain_weight_claim_qty"
                                           name="s_g_w_c_short_gain_weight_claim_qty" autocomplete="off"
                                           class="form-control" value="">
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
                            <div class="form-group" id="data_8">
                                <label class="font-noraml" for="s_g_w_c_amount_received_date">Amount Received
                                    Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" value="{{date(" d/m/Y ")}}"
                                           name="s_g_w_c_amount_received_date" id="s_g_w_c_amount_received_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="s_g_w_c_received_account_number">Received Amount Name</label>
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
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
        <span class="fileinput-new">Select file</span>
        <span class="fileinput-exists">Change</span>
        <input type="file" name="s_g_w_c_upload_claim_letter" id="s_g_w_c_upload_claim_letter">
        </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                       data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="short_gain_payment_copy">Upload Payment Copy</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
        <span class="fileinput-new">Select file</span>
        <span class="fileinput-exists">Change</span>
        <input type="file" name="short_gain_payment_copy" id="short_gain_payment_copy">
        </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                       data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>Quality Claim</h3>
                            <div class="form-group" id="data_8">
                                <label class="font-noraml" for="q_c_quality_claim_date">Quality Claim Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" value="{{date(" d/m/Y ")}}"
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
                            <div class="form-group" id="data_8">
                                <label class="font-noraml" for="q_c_amount_received_date">Amount Received Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" value="{{date(" d/m/Y ")}}"
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
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
        <span class="fileinput-new">Select file</span>
        <span class="fileinput-exists">Change</span>
        <input type="file" name="upload_claim_letter" id="upload_claim_letter">
        </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                       data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="upload_payment_copy">Upload Payment Copy</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
        <span class="fileinput-new">Select file</span>
        <span class="fileinput-exists">Change</span>
        <input type="file" name="upload_payment_copy" id="upload_payment_copy">
        </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                       data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>Debit Note</h3>
                            <div class="form-group">
                                <label for="debit_note_number">Debit Note Number</label>
                                <input type="text" id="debit_note_number" name="debit_note_number" autocomplete="off"
                                       class="form-control text-box" value="">
                            </div>
                            <div class="form-group" id="data_8">
                                <label class="font-noraml" for="debit_note_date">Debit Note Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" value="{{date(" d/m/Y ")}}"
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
                            <div class="form-group" id="data_8">
                                <label class="font-noraml" for="debit_note_amount_received_date">Amount Received
                                    Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" value="{{date(" d/m/Y ")}}"
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
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
        <span class="fileinput-new">Select file</span>
        <span class="fileinput-exists">Change</span>
        <input type="file" name="upload_letter" id="upload_letter">
        </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                       data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="debit_note_remarks">Remarks</label>
                                <input type="text" id="debit_note_remarks" name="debit_note_remarks" autocomplete="off"
                                       class="form-control text-box" value="">
                            </div>
                            <div class="form-group">
                                <label for="debit_upload_payment_copy">Upload Payment Copy</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
        <span class="fileinput-new">Select file</span>
        <span class="fileinput-exists">Change</span>
        <input type="file" name="debit_upload_payment_copy" id="debit_upload_payment_copy">
        </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                       data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>Carrying Charge</h3>
                            <div class="form-group" id="data_8">
                                <label class="font-noraml" for="cc_lc_opening_date">LC Opening Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" value="{{date(" d/m/Y ")}}"
                                           name="cc_lc_opening_date" id="cc_lc_opening_date">
                                </div>
                            </div>
                            <div class="form-group" id="data_8">
                                <label class="font-noraml" for="cc_actual_lc_opening_date">Actual LC Opening
                                    Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" value="{{date(" d/m/Y ")}}"
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
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
        <span class="fileinput-new">Select file</span>
        <span class="fileinput-exists">Change</span>
        <input type="file" name="upload_carrying_copy" id="upload_carrying_copy">
        </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                       data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
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
            <div class="row">
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
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
        <span class="fileinput-new">Select file</span>
        <span class="fileinput-exists">Change</span>
        <input type="file" name="all_mail_attachement" id="all_mail_attachement">
        </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                       data-dismiss="fileinput">Remove</a>
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

    @foreach(\App\Option::all()->pluck('name') as $option)
        @include('modals.module',['select_id'=>$option,'label'=>'Add New'])
    @endforeach

@endsection

@push('scripts')
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
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });


    });


</script>
@endpush
