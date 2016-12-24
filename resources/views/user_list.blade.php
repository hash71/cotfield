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
                        <h5>Users List</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example"
                                   id="user_list">
                                <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Role</th>
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
        $('#user_list').DataTable({
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                // Bind click event
                $(nRow).click(function () {
                    console.log();
                    window.open('{{url('edit_user')}}' + '/' + aData.id, "_self");
                });
                return nRow;
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{URL::to('ajax_user_list')}}",
                type: 'post',
                data: {
                    _token: "{{csrf_token()}}"
                }
            },
            columns: [
                {data: 'username', name: 'username'},
                {data: 'role', name: 'role'}
            ],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });

    });
</script>
@endpush
