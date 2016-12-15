@extends('layouts.master')
@section('title','Table')
@push('styles')

<link rel="stylesheet" href="{{asset('datatables.min.css')}}">
@endpush
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Sales Report</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example"
                                   id="sales_report">
                                <thead>
                                <tr>
                                    <th>Project ID</th>
                                    <th>Buyer</th>
                                    <th>Supplier</th>
                                    <th>Contract Number</th>
                                    <th>Contract Date</th>
                                    <th>Origin</th>
                                    <th>Price</th>
                                    <th>Payment</th>
                                    <th>QTY</th>
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
        $('#sales_report').DataTable({
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {

                // Bind click event
                $(nRow).click(function () {
//                    console.log(nRow);
                    window.open('http://example.com');
                    //OR
//                    window.open(aData.url);

                });

                return nRow;
            },
            processing: true,
            serverSide: true,
            ajax: "{{URL::to('ajax_sales_report')}}",
            columns: [
                {data: 'project_name', name: 'project_name'},
                {data: 'buyer_name', name: 'buyer_name'},
                {data: 'supplier_name', name: 'supplier_name'},
                {data: 'contract_number', name: 'contract_number'},
                {data: 'contract_date', name: 'contract_date'},
                {data: 'origin', name: 'origin'},
                {data: 's_c_price', name: 's_c_price'},
                {data: 's_c_payment', name: 's_c_payment'},
                {data: 'p_i_quantity', name: 'p_i_quantity'}
            ],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
//            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {
                    extend: 'print',
                    customize: function (win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ]
        });

    });
</script>
@endpush
