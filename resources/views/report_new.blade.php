@extends('layouts.master')
@section('title','Reports')
@push('styles')

<link rel="stylesheet" href="{{asset('datatables.min.css')}}">


<style>
    .toggle-vis {
        color: green;
        border: 1px solid #e7e7e7;
        padding: 0px 7px;
        line-height: 30px;
        white-space: nowrap;
    }

    .toggle-color {
        color: red !important;
    }
</style>


@endpush
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Filter</h5>
                    </div>
                    <div class="ibox-content" style="padding-top: 0;">
                        <form role="form" class="form-inline" id="search-form" method="post">
                            <div class="form-group">
                                <select class="form-control m-b" name="account" style="margin-bottom: 0;"
                                        id="select_id">
                                    <option selected="selected" disabled>Select</option>
                                    <option value="contract_date">Contract Date</option>
                                    <option value="p_i_latest_date_of_lc_opening">Last Date Of LC Opening</option>
                                    <option value="p_i_latest_date_of_shipment">Last Date Of Shipment</option>
                                    <option value="lc_date_of_issue">LC Date Of Issue</option>
                                    <option value="ip_date">IP Date</option>
                                    <option value="ip_expiry_date">IP Exp Date</option>
                                    <option value="sro_date">SRO Date</option>
                                    <option value="eta_date">ETA</option>
                                </select>
                            </div>
                            <div class="form-group" id="data_1">

                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input
                                            type="text" class="form-control" id="from_id"
                                            placeholder="From">
                                </div>
                            </div>
                            <div class="form-group" id="data_2">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input
                                            type="text" class="form-control" id="to_id"
                                            placeholder="To">
                                </div>
                            </div>
                            <button class="btn btn-white" type="submit" style="margin-bottom: 0;">Search</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Sales Report</h5>
                    </div>
                    <div class="ibox-content">
                        <div style="padding: 15px 0;">
                            Toggle column:
                            <a class="toggle-vis" data-column="0">Project Name</a> -
                            <a class="toggle-vis" data-column="1">Buyer</a> -
                            <a class="toggle-vis" data-column="2">Supplier</a> -
                            <a class="toggle-vis" data-column="3">Origin</a> -
                            <a class="toggle-vis" data-column="4">QTY</a> -
                            <a class="toggle-vis" data-column="5">Contract No.</a> -
                            <a class="toggle-vis" data-column="6">Contract Date</a> -
                            <a class="toggle-vis" data-column="7">Price</a> -
                            <a class="toggle-vis" data-column="8">Payment</a> -
                            <a class="toggle-vis" data-column="9">Last Date Of LC Opening</a> -
                            <a class="toggle-vis" data-column="10">Last Date Of Shipment</a> -
                            <a class="toggle-vis" data-column="11">LC No.</a> -
                            <a class="toggle-vis" data-column="12">LC Date Of Issue</a> -
                            <a class="toggle-vis" data-column="13">LC Date Of EXP</a> -
                            <a class="toggle-vis" data-column="14">IP No.</a> -
                            <a class="toggle-vis" data-column="15">IP Date</a> -
                            <a class="toggle-vis" data-column="16">IP Exp Date</a> -
                            <a class="toggle-vis" data-column="17">SRO Date</a> -
                            <a class="toggle-vis" data-column="18">Port Of Loading</a> -
                            <a class="toggle-vis" data-column="19">Shipment Date</a>
                            <a class="toggle-vis" data-column="20">ETA</a>
                            <a class="toggle-vis" data-column="21">Invoice Payment Date</a>
                            <a class="toggle-vis" data-column="22">Payment Acceptance Date</a>
                            <a class="toggle-vis" data-column="23">S/G Weight QTY</a>
                            <a class="toggle-vis" data-column="24">S/G Weight Receiving Date</a>
                            <a class="toggle-vis" data-column="25">Quality Claim Amount</a>
                            <a class="toggle-vis" data-column="26">Quality Amount Receiving Date</a>
                            <a class="toggle-vis" data-column="27">Carrying Charge Amount</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example"
                                   id="sales_report" style="width: 100% !important;">
                                <thead>
                                <tr>
                                    <th>Project Name</th>
                                    <th>Buyer</th>
                                    <th>Supplier</th>
                                    <th>Origin</th>
                                    <th>QTY</th>
                                    <th>Contract No.</th>
                                    <th>Contract Date</th>
                                    <th>Price</th>
                                    <th>Payment</th>
                                    <th>Last Date Of LC Opening</th>
                                    <th>Last Date Of Shipment</th>
                                    <th>LC No.</th>
                                    <th>LC Date Of Issue</th>
                                    <th>LC Date Of EXP</th>
                                    <th>IP No.</th>
                                    <th>IP Date</th>
                                    <th>IP Exp Date</th>
                                    <th>SRO Date</th>
                                    <th>Port Of Loading</th>
                                    <th>Shipment Date</th>
                                    <th>ETA</th>
                                    <th>Invoice Payment Date</th>
                                    <th>Payment Acceptance Date</th>
                                    <th>S/G Weight QTY</th>
                                    <th>S/G Weight Receiving Date</th>
                                    <th>Quality Claim Amount</th>
                                    <th>Quality Amount Receiving Date</th>
                                    <th>Carrying Charge Amount</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{asset('datatables.min.js')}}"></script>

<script>
    $(function () {

        $('.toggle-vis').on('click', function () {
            $(this).toggleClass('toggle-color');
        });

        var filter_table = $('#sales_report').DataTable({
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                // Bind click event
                $(nRow).click(function () {
                    console.log();
                    window.open('{{url('/')}}' + '/projects/' + aData.project_id + '/edit', "_blank");
                });
                return nRow;
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{URL::to('ajax_report')}}",
                data: function (d) {
                    d.select = $('select[id=select_id]').val();
                    d.from = $('input[id=from_id]').val();
                    d.to = $('input[id=to_id]').val();
                }
            },
            columns: [
                {data: 'project_name', name: 'project_name'},
                {data: 'buyer_name', name: 'buyer_name'},
                {data: 'supplier_name', name: 'supplier_name'},
                {data: 's_c_origin', name: 's_c_origin'},
                {data: 'p_i_quantity', name: 'p_i_quantity'},
                {data: 'contract_number', name: 'contract_number'},
                {data: 'contract_date', name: 'contract_date'},
                {data: 's_c_price', name: 's_c_price'},
                {data: 's_c_payment', name: 's_c_payment'},
                {data: 'p_i_latest_date_of_lc_opening', name: 'p_i_latest_date_of_lc_opening'},
                {data: 'p_i_latest_date_of_shipment', name: 'p_i_latest_date_of_shipment'},
                {data: 'lc_number', name: 'lc_number'},
                {data: 'lc_date_of_issue', name: 'lc_date_of_issue'},
                {data: 'lc_date_of_expiry', name: 'lc_date_of_expiry'},
                {data: 'i_p_number', name: 'i_p_number'},
                {data: 'ip_date', name: 'ip_date'},
                {data: 'ip_expiry_date', name: 'ip_expiry_date'},
                {data: 'sro_date', name: 'sro_date'},
                {data: 'lc_port_of_loading', name: 'lc_port_of_loading'},
                {data: 'shipment_date', name: 'shipment_date'},
                {data: 'eta_date', name: 'eta_date'},
                {data: 'payment_invoice_payment_date', name: 'payment_invoice_payment_date'},
                {data: 'payment_acceptance_date', name: 'payment_acceptance_date'},
                {data: 's_g_w_c_short_gain_weight_claim_qty', name: 's_g_w_c_short_gain_weight_claim_qty'},
                {data: 's_g_w_c_amount_received_date', name: 's_g_w_c_amount_received_date'},
                {data: 'q_c_quality_claim_amount', name: 'q_c_quality_claim_amount'},
                {data: 'q_c_amount_received_date', name: 'q_c_amount_received_date'},
                {data: 'cc_amount', name: 'cc_amount'}
            ],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
//            pageLength: 25,
//            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
//                {extend: 'copy'},
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excel', title: 'Report',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdf', title: 'Report', orientation: 'landscape', pageSize: 'LEGAL',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    customize: function (win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    },
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    title: '',
                    exportOptions: {
                        columns: ':visible'
                    }
                }
            ]
        });
        $('a.toggle-vis').on('click', function (e) {
            e.preventDefault();

            // Get the column API object
            var column = filter_table.column($(this).attr('data-column'));

            // Toggle the visibility
            column.visible(!column.visible());
        });
        $('#search-form').on('submit', function (e) {
            filter_table.draw();
            e.preventDefault();
        });

        $('.toggle-vis').each(function () {
            var column = filter_table.column($(this).attr('data-column'));
            var col = $(this).attr('data-column');

            if (col >= 0 && col <= 4) {
                $(this).toggleClass('toggle-color');
                column.visible();
            } else {
                column.visible(0);
            }
        });
    });
</script>
@endpush
