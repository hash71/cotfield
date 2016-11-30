<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title','Cotfield')</title>

    <link href="{{asset(elixir('css/vendor.css'))}}" rel="stylesheet">
    <link href="{{asset(elixir('css/inspinia.css'))}}" rel="stylesheet">

    @stack('styles')

</head>

<body class="md-skin">
<div id="wrapper">
    @include('layouts.navigation')
    <div id="page-wrapper" class="gray-bg">
        @include('layouts.topnavbar')
        @yield('content')
        @include('layouts.footer')
    </div>
</div>


<script src="{{asset(elixir('js/vendor.js'))}}"></script>
<script src="{{asset(elixir('js/inspinia.js'))}}"></script>
<script>
    function getOptionsList(select2_id) {//just to initialize options global variable
        $.ajax({
            url: '{{url("ajax_select2_options_list")}}' + '/' + select2_id,
            type: 'POST',
            dataType: 'json',
            data: {
                _token: "{{csrf_token()}}"
            },
            success: function (data) {
                console.log(data);
                var i;
                options = '<option></option>';//for ajax select2 needs an empty first tag for placeholder to work correctly
                for (var key in data) {
                    options += '<option value="' + key + '">' + data[key] + '</option>';
                }
                console.log(options);
                $("#" + select2_id).empty().append(options);//
            }
        });
    }

    function add_new_option(url, modal_id) {
        $.post("{{url('ajax_project_create_option')}}" + '/' + url,
                {
                    _token: "{{csrf_token()}}",
                    value: $('#input-project').val()
                },
                function (data, status) {
                    console.log(data);
                    if (data == 1) {
                        $('' + modal_id).modal('hide');
                        toastr["warning"]("successful");
                        $("#project_status").on('select2:opening', getOptionsList('project_status'));
                    } else {
                        toastr["error"]("unsuccessful");
                    }
                }
        );

    }
</script>

@stack('scripts')


</body>

</html>
