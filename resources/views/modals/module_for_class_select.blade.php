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

        $('#close-{{$select_id}}').click(function () {
            $('#modal-{{$select_id}}').modal('hide');
            $('#modal-{{$select_id}} form input').val('');
        });

        $('#submit-{{$select_id}}').click(function () {
            add_new_option_shipment('{{$select_id}}', '{{'#modal-'.$select_id}}');
        });


    });

</script>
@endpush