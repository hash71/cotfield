<div id="{{"modal-".$select_id}}" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <form role="form">
                        <div class="form-group"><label>{{$label}}</label> <input class="form-control"></div>
                        <div class="form-group">
                            <div class="">
                                <button id="{{"close-".$select_id}}" class="btn btn-white" type="button">Cancel
                                </button>
                                <button id="{{"submit-".$select_id}}" class="btn btn-primary" type="button">Save changes
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


        function getOptionsListSelected(select2_id) {//just to initialize options global variable

            $.ajax({
                url: '{{url("ajax_select2_options_list")}}' + '/' + select2_id,
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: "{{csrf_token()}}"
                },
                success: function (data) {
                    var selected = allData[select2_id];
                    options = '<option></option>';//for ajax select2 needs an empty first tag for placeholder to work correctly
                    //new
                    for (var i = 0; i < data.length; i++) {
                        if (data[i].id == selected) {
                            options += '<option value="' + data[i].id + '" selected>' + data[i].list + '</option>';
                        } else {
                            options += '<option value="' + data[i].id + '">' + data[i].list + '</option>';
                        }
                    }
                    //newend
//                    for (var key in data) {
//                        if (key == selected) {
//                            options += '<option value="' + key + '" selected>' + data[key] + '</option>';
//                        } else {
//                            options += '<option value="' + key + '">' + data[key] + '</option>';
//                        }
//                    }
                    $("#" + select2_id).empty().append(options);
                }
            });
        }

        $("#{{$select_id}}").select2({
            placeholder: "select",
            allowClear: true
        }).on('select2:opening', getOptionsListSelected('{{$select_id}}')).on('select2:open', function (evt) {
            $(".select2-dropdown.select2-dropdown--below .btn.btn-primary").remove();
            $(".select2-dropdown.select2-dropdown--below").append('<div class="text-center"><a data-toggle="modal" class="btn btn-primary" href="#modal-{{$select_id}}">ADD NEW</a></div>');
            $(".select2-dropdown.select2-dropdown--below .btn.btn-primary").css({
                'width': '100%',
                'border-radius': '0'
            });
        });


        $('#close-{{$select_id}}').click(function () {
            $('#modal-{{$select_id}}').modal('hide');
            $('#modal-{{$select_id}} form input').val('');
        });

        $('#submit-{{$select_id}}').click(function () {
            add_new_option('{{$select_id}}', '{{'#modal-'.$select_id}}');
        });


    });

</script>
@endpush