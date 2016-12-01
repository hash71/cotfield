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
</style>
@endpush
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">

        {{csrf_field()}}
        <form method="post" class="" action="{{url('formdata')}}">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h3>Project</h3>
                            <div class="form-group">
                                <label>File Number</label>
                                <input type="email" placeholder="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>File Status</label>
                                <select id="project_status" class=""
                                        style="width: 100%;">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>

    {{--@include('modals.project')--}}
    @include('modals.module',['select_id'=>'project_status','label'=>'Project Status'])
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


    });



</script>
@endpush
