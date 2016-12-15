@extends('layouts.master')

@push('styles')
<link rel="stylesheet" href="{{asset('fine-uploader/fine-uploader-new.css')}}">
@endpush

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <form action="">
                <input type="hidden" name="project_id" value="{{$project_id}}" id="project_id">
                <div id="uploader"></div>
            </form>
        </div>
        <div id="uploader_div">

        </div>
    </div>
@endsection

@push('scripts')
<script src="{{asset('fine-uploader/fine-uploader.js')}}"></script>
<script type="text/template" id="qq-template">
    <div class="qq-uploader-selector qq-uploader" qq-drop-area-text="Drop files here">
        <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
            <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                 class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
        </div>
        <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
            <span class="qq-upload-drop-area-text-selector"></span>
        </div>
        <div class="qq-upload-button-selector qq-upload-button">
            <div>Upload a file</div>
        </div>
        <span class="qq-drop-processing-selector qq-drop-processing">
            <span>Processing dropped files...</span>
            <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
        </span>
        <ul class="qq-upload-list-selector qq-upload-list" aria-live="polite" aria-relevant="additions removals">
            <li>
                <div class="qq-progress-bar-container-selector">
                    <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                         class="qq-progress-bar-selector qq-progress-bar"></div>
                </div>
                <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                <img class="qq-thumbnail-selector" qq-max-size="100">
                <span class="qq-upload-file-selector qq-upload-file"></span>
                <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
                <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                <span class="qq-upload-size-selector qq-upload-size"></span>
                <button type="button" class="qq-btn qq-upload-cancel-selector qq-upload-cancel">Cancel</button>
                <button type="button" class="qq-btn qq-upload-retry-selector qq-upload-retry">Retry</button>
                <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">Delete</button>
                <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
            </li>
        </ul>

        <dialog class="qq-alert-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">Close</button>
            </div>
        </dialog>

        <dialog class="qq-confirm-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">No</button>
                <button type="button" class="qq-ok-button-selector">Yes</button>
            </div>
        </dialog>

        <dialog class="qq-prompt-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <input type="text">
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">Cancel</button>
                <button type="button" class="qq-ok-button-selector">Ok</button>
            </div>
        </dialog>
    </div>
</script>
<script>

    fineuploader("1481610847n9v", "uploader");

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
                    var row = '<div class="row" style="padding: 10px 0 0;"><div id=' + responseJSON.uuid + '><a target="_blank" href="' + '{{URL::to('download')}}' + '/' + responseJSON.uuid + '"><button class="btn btn-outline btn-primary dim btn-sm" type="button"><i class="fa fa-check">Download</i></button></a><span>' + responseJSON.uploadName + '</span></div></div>';
                    $element.innerHTML += row;
                },
                onDeleteComplete: function (id, xhr) {
                    var element_to_delete = xhr.responseURL.split('/')[6].split('?')[0];
                    $('#' + element_to_delete).remove();
                }
            }
        });
    }


</script>
@endpush
