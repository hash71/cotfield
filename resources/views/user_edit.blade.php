@extends('layouts.master')
@section('title','Edit User')
@push('styles')


@endpush
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edit User</h5>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal" method="post" action="{{URL::to('update_user').'/'.$id}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group"><label class="col-lg-2 control-label">Username</label>

                                <div class="col-lg-10"><span
                                            class="form-control">{{\App\User::find($id)->username}}</span>

                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label">Password</label>

                                <div class="col-lg-10"><input type="password" placeholder="Password"
                                                              class="form-control" name="password" required></div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-sm btn-info btn-outline" type="submit">Update Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

<script>
    @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
        toastr["error"]("{{$error}}");
    @endforeach
    @endif
</script>

@endpush
