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
                        <h5>Basic Data Tables example with responsive plugin</h5>
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
                                   id="users-table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
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

{{--<script>--}}
    {{--$(document).ready(function () {--}}
        {{--$('.dataTables-example').DataTable({--}}
            {{--pageLength: 25,--}}
            {{--responsive: true,--}}
            {{--dom: '<"html5buttons"B>lTfgitp',--}}
            {{--buttons: [--}}
                {{--{extend: 'copy'},--}}
                {{--{extend: 'csv'},--}}
                {{--{extend: 'excel', title: 'ExampleFile'},--}}
                {{--{extend: 'pdf', title: 'ExampleFile'},--}}

                {{--{--}}
                    {{--extend: 'print',--}}
                    {{--customize: function (win) {--}}
                        {{--$(win.document.body).addClass('white-bg');--}}
                        {{--$(win.document.body).css('font-size', '10px');--}}

                        {{--$(win.document.body).find('table')--}}
                                {{--.addClass('compact')--}}
                                {{--.css('font-size', 'inherit');--}}
                    {{--}--}}
                {{--}--}}
            {{--]--}}

        {{--});--}}

    {{--});--}}

{{--</script>--}}
<script>
    $(function () {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{URL::to('/').'/datatables/data'}}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'}
            ],
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
