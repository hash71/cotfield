<div id="modal-project" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <form role="form">
                        <div class="form-group"><label>Email</label> <input id="input-project" type="email"
                                                                            placeholder="Enter email"
                                                                            class="form-control"></div>
                        <div class="form-group">
                            <div class="">
                                <button id="close-button-project" class="btn btn-white" type="submit">Cancel</button>
                                <button id="submit-project" class="btn btn-primary" type="submit">Save changes</button>
                            </div>
                        </div>

                    </form>
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
                    options = '<option></option>';//for ajax select2 needs an empty first tag for placeholder to work correctly
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

        $('#close-button-project').click(function () {
            $('#modal-project').modal('hide');
            $('#modal-project form input').val('');
        });

        $('#submit-project').click(function () {
            $.post("{{URL::to('/').'/ajax_project'}}",
                    {
                        _token: "{{csrf_token()}}",
                        project: $('#input-project').val()
                    },
                    function (data, status) {
                        if (data.success) {
                            $('#modal-project').modal('hide');
                            toastr["success"]("successful");
                        } else {
                            toastr["error"]("unsuccessful");
                        }
                    }
            );

        });


    });

</script>
@endpush