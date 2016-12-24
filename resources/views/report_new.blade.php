@extends('layouts.master')
@section('title','Reports')
@push('styles')

<link rel="stylesheet" href="{{asset('datatables.min.css')}}">


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
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example"
                                   id="sales_report">
                                <thead>
                                <tr>
                                    <th>Project Name</th>
                                    <th>Buyer</th>
                                    <th>Supplier</th>
                                    <th>Contract No.</th>
                                    <th>Contract Date</th>
                                    <th>Origin</th>
                                    <th>Price</th>
                                    <th>Payment</th>
                                    <th>QTY</th>
                                    <th>Last Date Of LC Opening</th>
                                    <th>Last Date Of Shipment</th>
                                    <th>LC No.</th>
                                    <th>LC Date Of Issue</th>
                                    <th>IP No.</th>
                                    <th>IP Date</th>
                                    <th>IP Exp Date</th>
                                    <th>SRO Date</th>
                                    <th>Port Of Loading</th>
                                    <th>ETA</th>
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
        var filter_table = $('#sales_report').DataTable({
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                // Bind click event
                $(nRow).click(function () {
                    console.log();
                    window.open('{{url('/')}}' + '/projects/' + aData.project_id + '/edit', "_self");
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
                {data: 'contract_number', name: 'contract_number'},
                {data: 'contract_date', name: 'contract_date'},
                {data: 's_c_origin', name: 's_c_origin'},
                {data: 's_c_price', name: 's_c_price'},
                {data: 's_c_payment', name: 's_c_payment'},
                {data: 'p_i_quantity', name: 'p_i_quantity'},
                {data: 'p_i_latest_date_of_lc_opening', name: 'p_i_latest_date_of_lc_opening'},
                {data: 'p_i_latest_date_of_shipment', name: 'p_i_latest_date_of_shipment'},
                {data: 'lc_number', name: 'lc_number'},
                {data: 'lc_date_of_issue', name: 'lc_date_of_issue'},
                {data: 'i_p_number', name: 'i_p_number'},
                {data: 'ip_date', name: 'ip_date'},
                {data: 'ip_expiry_date', name: 'ip_expiry_date'},
                {data: 'sro_date', name: 'sro_date'},
                {data: 'lc_port_of_loading', name: 'lc_port_of_loading'},
                {data: 'eta_date', name: 'eta_date'}
            ],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
//            pageLength: 25,
//            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [

//                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'Report'},
                {extend: 'pdf', title: 'Report', orientation: 'landscape', pageSize: 'LEGAL'},
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
                    title: ''
                }
            ]
        });
        $('#search-form').on('submit', function (e) {
            filter_table.draw();
            e.preventDefault();
        });
    });
</script>
@endpush
