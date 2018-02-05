<!DOCTYPE html>
<html>

<head>
    <title>Batin XXIV - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap/css/bootstrap-theme.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">


    <link rel="stylesheet" href="{{asset('vendors/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/select2/select2-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/datepicker/bootstrap-datepicker3.min.css')}}">
    <!-- styles -->
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">
    <link href="{{asset('css/icon.css')}}" rel="stylesheet">
    <link href="{{asset('css/button.css')}}" rel="stylesheet">
    @section("stylesheet")
    @show
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    @section("javascript")
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('js/vendor/jquery-1.12.0.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('js/bootbox.min.js')}}"></script>
    <script src="{{asset('vendors/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
    <!--
<script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js
"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
-->

    <script src="{{asset('js/bootstrap-notify.min.js')}}"></script>
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('js/backend/notify.js')}}"></script>
    <script src="{{asset('js/clipboard.min.js')}}"></script>
    <script src="{{asset('vendors/datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('vendors/datepicker/locales/bootstrap-datepicker.id.min.js')}}"></script>
    <script src="{{asset('js/jquery.form.min.js')}}"></script>
    <script src="{{asset('js/form-validation.js')}}"></script>
    @show
</head>

<body>
    <div class="header  navbar navbar-fixed-top">
        @include("backend.header")
    </div>
    <div class="page-content">
        <hr>
        <div class="row">
            <div class="col-md-2 col-md-offset-1">
                @include("backend.sidebar")
            </div>
            <div class="col-md-8">
                @yield("content")
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function() {
            $('.select2').select2({
                theme: "bootstrap"
            });
            $('.date-input').datepicker({
                language: "id",
                calendarWeeks: true,
                todayHighlight: true,
                autoclose: true,
                format: 'dd/mm/yyyy'
            });
        })

    </script>
</body>

</html>
