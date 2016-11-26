@extends('layouts.master')
@section('title','Index Page')
@push('styles')
{{--<style>--}}
{{--.select2-container .select2-selection--single {--}}
{{--box-sizing: border-box;--}}
{{--cursor: pointer;--}}
{{--display: block;--}}
{{--height: 34px;--}}
{{--user-select: none;--}}
{{---webkit-user-select: none;--}}
{{--}--}}

{{--.select2-container--default .select2-selection--single .select2-selection__rendered {--}}
{{--color: #444;--}}
{{--line-height: 32px;--}}
{{--}--}}

{{--.select2-container--default .select2-selection--single .select2-selection__arrow {--}}
{{--height: 32px;--}}
{{--position: absolute;--}}
{{--top: 1px;--}}
{{--right: 1px;--}}
{{--width: 20px;--}}
{{--}--}}
{{--</style>--}}

<style>
    .modal-content {
        position: relative;
        top: 100px;
    }
</style>
@endpush
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <form method="post" class="form-horizontal" action="{{url('formdata')}}">
            {{csrf_field()}}
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Horizontal form</h5>
                        </div>
                        <div class="ibox-content">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Email</label>
                                    <div class="col-lg-10">
                                        <input type="email" placeholder="Email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Email</label>
                                    <div class="col-lg-10">
                                        <select id="select_project" name="1" class="first select2_demo_1 form-control"
                                                style="width: 100%;">

                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

    @include('modals.project')
@endsection

@push('scripts')
<script>
    $(function () {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": false,
            "preventDuplicates": false,
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
    });
</script>
@endpush
