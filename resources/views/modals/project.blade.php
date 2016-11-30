<div id="modal-project_status" class="modal fade" aria-hidden="true" style="display: none;">
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
                                <button id="close-button-project_status" class="btn btn-white" type="button">Cancel
                                </button>
                                <button id="submit-project_status" class="btn btn-primary" type="button">Save changes
                                </button>
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


//        $("#project_status").select2({
//            placeholder: "Select File Status",
//            allowClear: true
//        }).on('select2:opening', function () {
//            getOptionsList('project_status');
//        });

        $("#project_status").select2({
            placeholder: "Select a status",
            allowClear: true
        }).on('select2:opening', getOptionsList('project_status')).on('select2:open', function (evt) {
            $(".select2-dropdown.select2-dropdown--below .btn.btn-primary").remove();
            $(".select2-dropdown.select2-dropdown--below").append('<div class="text-center"><a data-toggle="modal" class="btn btn-primary" href="#modal-project_status">Form in simple modal box</a></div>');
            $(".select2-dropdown.select2-dropdown--below .btn.btn-primary").css({
                'width': '100%',
                'border-radius': '0'
            });
        });


        $('#close-button-project_status').click(function () {
            $('#modal-project_status').modal('hide');
            $('#modal-project_status form input').val('');
        });

        $('#submit-project_status').click(function () {
            add_new_option('project_status', '#modal-project_status');
        });


    });

</script>
@endpush