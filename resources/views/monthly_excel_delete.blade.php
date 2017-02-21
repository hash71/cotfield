@extends('layouts.master')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="ibox float-e-margins">
                    <form action="{{url('monthly_excel_delete')}}" method="post" enctype="multipart/form-data">
                        {!! method_field('delete') !!}
                        {!! csrf_field() !!}
                        <div class="ibox-content">
                            <h4 style="font-weight:100;padding-bottom:10px;">Delete Monthly Report</h4>
                            <div class="form-group" id="data_x">
                                <label class="font-noraml">Select Month & Year</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input
                                            type="text" class="form-control" value="" name="monthly_excel" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline btn-danger">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection