function getOptionsList(select2_id) {//just to initialize options global variable
    console.log('getOptionsList');
    $.ajax({
        url: '{{url("ajax_select2_options_list")}}' + '/' + select2_id,
        type: 'POST',
        dataType: 'json',
        data: {
            _token: "{{csrf_token()}}"
        },
        success: function (data) {
            options = '<option></option>';//for ajax select2 needs an empty first tag for placeholder to work correctly
            for (var key in data) {
                options += '<option value="' + key + '">' + data[key] + '</option>';
            }
            $("#" + select2_id).empty().append(options);//
        }
    });
}

function add_new_option(select2_id) {

    $.post("{{url('ajax_project_create_option')}}" + '/' + select2_id,
        {
            _token: "{{csrf_token()}}",
            value: $('#modal-' + select2_id + ' input').val()
        },
        function (data, status) {
            if (data == 1) {
                $('#modal-' + select2_id).modal('hide');
                toastr["warning"]("successful");
                $("#modal-" + select2_id).on('select2:opening', getOptionsList(select2_id));
            } else {
                toastr["error"]("unsuccessful");
            }
        }
    );

}

function fineuploader(project_id, element_id) {
    var uploader = new qq.FineUploader({
        element: document.getElementById(element_id),
        session: {
            endpoint: "{{URL::to('initial_file_list')}}" + "/" + project_id + "/" + element_id
        },
        request: {
            debug: true,
            endpoint: "{{URL::to('upload')}}",
            params: {
                _token: "{{csrf_token()}}",
                project_id: project_id,
                element_id: element_id,
            }
        },
        deleteFile: {
            debug: true,
            enabled: true,
            endpoint: "{{URL::to('upload')}}",
            params: {
                _token: "{{csrf_token()}}"
            }

        },
        chunking: {
            enabled: true,
            concurrent: {
                enabled: true
            },
            success: {
                endpoint: "{{URL::to('upload')}}?done"
            },
            params: {
                _token: "{{csrf_token()}}"
            }
        },
        resume: {
            enabled: true,
            recordsExpireIn: 1
        },
        retry: {
            enableAuto: true,
            showButton: true
        },
        thumbnails: {
            placeholders: {
                notAvailablePath: "{{URL::to('/fine-uploader/placeholders/File.svg')}}"
            }
        },
        validation: {
            allowedExtensions: ['pdf', 'docx', 'doc', 'xlsx', 'xls', 'ppt', 'pptx'],
            sizeLimit: 15728640
        },
        callbacks: {
            onComplete: function (id, name, responseJSON) {
                var $element = document.getElementById(element_id + "_div");
                var row = '<div class="form-group" style="padding: 10px 0 0;"><div id=' + responseJSON.uuid + '><a target="_blank" href="' + '{{URL::to('
                download
                ')}}' + '/' + responseJSON.uuid + '"><button class="btn btn-outline btn-primary dim btn-sm" type="button"><i class="fa fa-check">Download</i></button></a><span>' + responseJSON.uploadName + '</span></div></div>';
                $element.innerHTML += row;
            },
            onDeleteComplete: function (id, xhr) {
                var element_to_delete = xhr.responseURL.split('/')[6].split('?')[0];
                $('#' + element_to_delete).remove();
            }
        }
    });
}


