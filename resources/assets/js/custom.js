$(function () {

    function getOptionsList(url, select2_id) {//just to initialize options global variable
        $.ajax({
            url: '{{url("ajax_select2_options_list")}}' + '/' + url,
            type: 'POST',
            dataType: 'json',
            data: {
                _token: "{{csrf_token()}}"
            },
            success: function (data) {
                console.log(data);
                var i;
                options = '<option></option>';//for ajax select2 needs an empty first tag for placeholder to work correctly
                for (i = 0; i < data.length; i++) {
                    options += '<option value="' + data[i].id + '">' + data[i].option + '</option>';
                }
                $("" + select2_id).empty().append(options);
            }
        });
    }

});

