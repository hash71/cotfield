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

    .form-group {
        padding: 0 4px 4px 0;
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
                                        id="select_id1" multiple>
                                    {{--<option value="" style="visibility: hidden;" disabled>IMPORTER</option>--}}
                                    @foreach($importer as $data)
                                        <option value="{{$data->importer}}">{{$data->importer}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control m-b" name="account" style="margin-bottom: 0;"
                                        id="select_id2" multiple>
                                    {{--<option value="" style="visibility: hidden;">EXPORTER</option>--}}
                                    @foreach($exporter as $data)
                                        <option value="{{$data->exporter}}">{{$data->exporter}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <select class="form-control m-b" name="account" style="margin-bottom: 0;"
                                        id="select_id3" multiple>
                                    {{--<option value="" style="visibility: hidden;">EXPORTER ORIGIN</option>--}}
                                @foreach($exporter_origin as $data)
                                        <option value="{{$data->exporter_origin}}">{{$data->exporter_origin}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control m-b" name="account" style="margin-bottom: 0;"
                                        id="select_id4" multiple>
                                    {{--<option value="" style="visibility: hidden;">PRODUCT ORIGIN</option>--}}
                                    @foreach($product_origin as $data)
                                        <option value="{{$data->product_origin}}">{{$data->product_origin}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control m-b" name="account" style="margin-bottom: 0;"
                                        id="select_id5" multiple>
                                    {{--<option value="" style="visibility: hidden;">GRADE TYPE</option>--}}
                                    @foreach($grade_type as $data)
                                        <option value="{{$data->grade_type}}">{{$data->grade_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control m-b" name="account" style="margin-bottom: 0;"
                                        id="select_id6" multiple>
                                    {{--<option value="" style="visibility: hidden;">STAPLE</option>--}}
                                    @foreach($staple as $data)
                                        <option value="{{$data->staple}}">{{$data->staple}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control m-b" name="account" style="margin-bottom: 0;"
                                        id="select_id7" multiple>
                                    {{--<option value="" style="visibility: hidden;">MIC</option>--}}
                                    @foreach($mic as $data)
                                        <option value="{{$data->mic}}">{{$data->mic}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control m-b" name="account" style="margin-bottom: 0;"
                                        id="select_id8" multiple>
                                    {{--<option value="" style="visibility: hidden;">RATE PER LB (USD)</option>--}}
                                    @foreach($rate_per_lb_usd as $data)
                                        <option value="{{$data->rate_per_lb_usd}}">{{$data->rate_per_lb_usd}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control m-b" name="account" style="margin-bottom: 0;"
                                        id="select_id9" multiple>
                                    {{--<option value="" style="visibility: hidden;">QTY (MT)</option>--}}
                                    @foreach($qty_mt as $data)
                                        <option value="{{$data->qty_mt}}">{{$data->qty_mt}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control m-b" name="account" style="margin-bottom: 0;"
                                        id="select_id10" multiple>
                                    {{--<option value="" style="visibility: hidden;">PORT</option>--}}
                                    @foreach($port as $data)
                                        <option value="{{$data->port}}">{{$data->port}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control m-b" name="account" style="margin-bottom: 0;"
                                        id="select_id11" multiple>
                                    {{--<option value="" style="visibility: hidden;">month</option>--}}
                                    @foreach($month as $data)
                                        <option value="{{$data->month}}">{{$data->month}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control m-b" name="account" style="margin-bottom: 0;"
                                        id="select_id12" multiple>
                                    {{--<option value="" style="visibility: hidden;">YEAR</option>--}}
                                    @foreach($year as $data)
                                        <option value="{{$data->year}}">{{$data->year}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="padding-top: 10px;">
                                <button class="btn btn-info" type="submit" style="margin-bottom: 0;">Filter Result
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Monthly Excel Report</h5>
                    </div>
                    <div class="ibox-content">
                        {{--<div style="padding: 15px 0;">--}}
                        {{--Toggle column:--}}
                        {{--<a class="toggle-vis" data-column="0">Project Name</a> ---}}
                        {{--<a class="toggle-vis" data-column="1">Buyer</a> ---}}
                        {{--<a class="toggle-vis" data-column="2">Supplier</a> ---}}
                        {{--<a class="toggle-vis" data-column="3">Contract No.</a> ---}}
                        {{--<a class="toggle-vis" data-column="4">Contract Date</a> ---}}
                        {{--<a class="toggle-vis" data-column="5">Origin</a> ---}}
                        {{--<a class="toggle-vis" data-column="6">Price</a> ---}}
                        {{--<a class="toggle-vis" data-column="7">Payment</a> ---}}
                        {{--<a class="toggle-vis" data-column="8">QTY</a> ---}}
                        {{--<a class="toggle-vis" data-column="9">Last Date Of LC Opening</a> ---}}
                        {{--<a class="toggle-vis" data-column="10">Last Date Of Shipment</a> ---}}
                        {{--<a class="toggle-vis" data-column="11">LC No.</a> ---}}
                        {{--<a class="toggle-vis" data-column="12">LC Date Of Issue</a> ---}}
                        {{--<a class="toggle-vis" data-column="13">IP No.</a> ---}}
                        {{--<a class="toggle-vis" data-column="14">IP Date</a> ---}}
                        {{--<a class="toggle-vis" data-column="15">IP Exp Date</a> ---}}
                        {{--<a class="toggle-vis" data-column="16">SRO Date</a> ---}}
                        {{--<a class="toggle-vis" data-column="17">Port Of Loading</a> ---}}
                        {{--<a class="toggle-vis" data-column="18">ETA</a>--}}
                        {{--</div>--}}
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example"
                                   id="monthly_excel">
                                <thead>
                                <tr>
                                    <th>Importer</th>
                                    <th>Exporter</th>
                                    <th>Exporter Origin</th>
                                    <th>Product Origin</th>
                                    <th>Grade Type</th>
                                    <th>Staple</th>
                                    <th>Mic</th>
                                    <th>Rate Per LB Usd</th>
                                    <th>QTY MT</th>
                                    <th>Port</th>
                                    <th>Month</th>
                                    <th>Year</th>
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

        var filter_table = $('#monthly_excel').DataTable({
            {{--"fnRowCallback": function (nRow, aData, iDisplayIndex) {--}}
                    {{--// Bind click event--}}
                    {{--$(nRow).click(function () {--}}
                    {{--console.log();--}}
                    {{--window.open('{{url('/')}}' + '/projects/' + aData.project_id + '/edit', "_blank");--}}
                    {{--});--}}
                    {{--return nRow;--}}
                    {{--},--}}
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{URL::to('ajax_excel_report')}}",
                data: function (d) {
                    d.importer = $('#select_id1').val();
                    d.exporter = $('#select_id2').val();
                    d.exporter_origin = $('#select_id3').val();
                    d.product_origin = $('#select_id4').val();
                    d.grade_type = $('#select_id5').val();
                    d.staple = $('#select_id6').val();
                    d.mic = $('#select_id7').val();
                    d.rate_per_lb_usd = $('#select_id8').val();
                    d.qty_mt = $('#select_id9').val();
                    d.port = $('#select_id10').val();
                    d.month = $('#select_id11').val();
                    d.year = $('#select_id12').val();
                }
            },
            columns: [
                {data: 'importer', name: 'importer'},
                {data: 'exporter', name: 'exporter'},
                {data: 'exporter_origin', name: 'exporter_origin'},
                {data: 'product_origin', name: 'product_origin'},
                {data: 'grade_type', name: 'grade_type'},
                {data: 'staple', name: 'staple'},
                {data: 'mic', name: 'mic'},
                {data: 'rate_per_lb_usd', name: 'rate_per_lb_usd'},
                {data: 'qty_mt', name: 'qty_mt'},
                {data: 'port', name: 'port'},
                {data: 'month', name: 'month'},
                {data: 'year', name: 'year'}
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
    });

    $(function () {

        $('#select_id1').select2({
            placeholder: "IMPORTER",
            allowClear: true
        });
        $('#select_id2').select2({
            placeholder: "EXPORTER",
            allowClear: true
        });
        $('#select_id3').select2({
            placeholder: "EXPORTER ORIGIN",
            allowClear: true
        });
        $('#select_id4').select2({
            placeholder: "PRODUCT ORIGIN",
            allowClear: true
        });
        $('#select_id5').select2({
            placeholder: "GRADE /TYPE",
            allowClear: true
        });
        $('#select_id6').select2({
            placeholder: "STAPLE",
            allowClear: true
        });
        $('#select_id7').select2({
            placeholder: "MIC",
            allowClear: true
        });
        $('#select_id8').select2({
            placeholder: "RATE/LB",
            allowClear: true
        });
        $('#select_id9').select2({
            placeholder: "QTY",
            allowClear: true
        });
        $('#select_id10').select2({
            placeholder: "PORT",
            allowClear: true
        });
        $('#select_id11').select2({
            placeholder: "MM",
            allowClear: true
        });
        $('#select_id12').select2({
            placeholder: "YYYY",
            allowClear: true
        });


    });
</script>
@endpush
