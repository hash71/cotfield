<div id="modal-project" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">Sign in</h3>

                        <p>Sign in today for more expirience.</p>

                        <form role="form">
                            <div class="form-group"><label>Email</label> <input type="email"
                                                                                placeholder="Enter email"
                                                                                class="form-control"></div>
                            <div class="form-group"><label>Password</label> <input type="password"
                                                                                   placeholder="Password"
                                                                                   class="form-control"></div>
                            <div>
                                <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Log
                                        in</strong></button>
                                <label>
                                    <div class="icheckbox_square-green" style="position: relative;"><input
                                                type="checkbox" class="i-checks"
                                                style="position: absolute; opacity: 0;">
                                        <ins class="iCheck-helper"
                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                    Remember me </label>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-6"><h4>Not a member?</h4>
                        <p>You can create an account:</p>
                        <p class="text-center">
                            <a href=""><i class="fa fa-sign-in big-icon"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>

    $(function () {

        function getOptionsList() {//just to initialize options global variable
            $.ajax({
                url: '{{url("ajax")}}',
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: "{{csrf_token()}}"
                },
                success: function (data) {
                    var i;
                    options = '';
                    for (i = 0; i < data.length; i++) {
                        options += '<option value="' + data[i].id + '">' + data[i].option + '</option>';
                    }
                    $("#select_project").empty().append(options);
                }
            });
        }


        $("#select_project").select2({
            placeholder: "Select a status",
            allowClear: true
        }).on('select2:opening', getOptionsList()).on('select2:open', function (evt) {
            $(".select2-dropdown.select2-dropdown--below .btn.btn-primary").remove();
            $(".select2-dropdown.select2-dropdown--below").append('<div class="text-center"><a data-toggle="modal" class="btn btn-primary" href="#modal-project">Form in simple modal box</a></div>');
            $(".select2-dropdown.select2-dropdown--below .btn.btn-primary").css({
                'width': '100%',
                'border-radius': '0'
            });
        });


    });

</script>
@endpush