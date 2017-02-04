@extends('layouts.master')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="ibox float-e-margins">
                    <form action="{{url('monthly_excel_store')}}" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="ibox-content">
                            <h4 style="font-weight:100;padding-bottom:10px;">Upload Monthly Report</h4>
                            <div class="form-group fileinput fileinput-new" data-provides="fileinput">
            <span class="btn btn-default btn-file">
                <span class="fileinput-new">Select file</span>
                <span class="fileinput-exists">Change</span>
                <input type="file" name="monthly_excel"/>
            </span>
                                <span class="fileinput-filename"
                                      style="color: #3ab7a8;padding: 10px;font-size: 20px;"></span>
                                <a href="#" class="close fileinput-exists" data-dismiss="fileinput"
                                   style="float: none">×</a>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit"><i
                                            class="fa fa-upload"></i>&nbsp;&nbsp;<span
                                            class="bold">Upload</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection