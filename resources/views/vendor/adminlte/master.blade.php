<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MeEdu</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">

    @if(config('adminlte.plugins.select2'))
        <!-- Select2 -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
    @endif

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">

    @if(config('adminlte.plugins.datatables'))
        <!-- DataTables with bootstrap 3 style -->
        <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.css">
    @endif

    @yield('adminlte_css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

            <link crossorigin="anonymous" integrity="sha384-sr24+N5hvbO83z6WV4A9zRt0bXHxKxmHiE2MliCVO6ic+CIbnJsqndMaaM6kdShS" href="https://lib.baomitu.com/flatpickr/4.5.2/flatpickr.min.css" rel="stylesheet">
            <script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
            <script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js') }}"></script>
            <script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

            <style>
                /* source-sans-pro-300 */
                @font-face {
                    font-family: 'Source Sans Pro';
                    font-style: normal;
                    font-weight: 300;
                    src: url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-300.eot'); /* IE9 Compat Modes */
                    src: local('Source Sans Pro'), local('SourceSans Pro-Normal'),
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-300.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-300.woff2') format('woff2'), /* Super Modern Browsers */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-300.woff') format('woff'), /* Modern Browsers */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-300.ttf') format('truetype'), /* Safari, Android, iOS */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-300.svg#SourceSans Pro') format('svg'); /* Legacy iOS */
                }

                /* source-sans-pro-regular */
                @font-face {
                    font-family: 'Source Sans Pro';
                    font-style: normal;
                    font-weight: regular;
                    src: url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-regular.eot'); /* IE9 Compat Modes */
                    src: local('Source Sans Pro'), local('SourceSans Pro-Normal'),
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-regular.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-regular.woff2') format('woff2'), /* Super Modern Browsers */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-regular.woff') format('woff'), /* Modern Browsers */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-regular.ttf') format('truetype'), /* Safari, Android, iOS */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-regular.svg#SourceSans Pro') format('svg'); /* Legacy iOS */
                }

                /* source-sans-pro-600 */
                @font-face {
                    font-family: 'Source Sans Pro';
                    font-style: normal;
                    font-weight: 600;
                    src: url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-600.eot'); /* IE9 Compat Modes */
                    src: local('Source Sans Pro'), local('SourceSans Pro-Normal'),
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-600.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-600.woff2') format('woff2'), /* Super Modern Browsers */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-600.woff') format('woff'), /* Modern Browsers */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-600.ttf') format('truetype'), /* Safari, Android, iOS */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-600.svg#SourceSans Pro') format('svg'); /* Legacy iOS */
                }

                /* source-sans-pro-700 */
                @font-face {
                    font-family: 'Source Sans Pro';
                    font-style: normal;
                    font-weight: 700;
                    src: url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-700.eot'); /* IE9 Compat Modes */
                    src: local('Source Sans Pro'), local('SourceSans Pro-Normal'),
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-700.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-700.woff2') format('woff2'), /* Super Modern Browsers */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-700.woff') format('woff'), /* Modern Browsers */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-700.ttf') format('truetype'), /* Safari, Android, iOS */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-700.svg#SourceSans Pro') format('svg'); /* Legacy iOS */
                }

                /* source-sans-pro-300italic */
                @font-face {
                    font-family: 'Source Sans Pro';
                    font-style: italic;
                    font-weight: 300;
                    src: url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-300italic.eot'); /* IE9 Compat Modes */
                    src: local('Source Sans Pro'), local('SourceSans Pro-Italic'),
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-300italic.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-300italic.woff2') format('woff2'), /* Super Modern Browsers */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-300italic.woff') format('woff'), /* Modern Browsers */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-300italic.ttf') format('truetype'), /* Safari, Android, iOS */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-300italic.svg#SourceSans Pro') format('svg'); /* Legacy iOS */
                }

                /* source-sans-pro-italic */
                @font-face {
                    font-family: 'Source Sans Pro';
                    font-style: italic;
                    font-weight: regular;
                    src: url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-italic.eot'); /* IE9 Compat Modes */
                    src: local('Source Sans Pro'), local('SourceSans Pro-Italic'),
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-italic.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-italic.woff2') format('woff2'), /* Super Modern Browsers */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-italic.woff') format('woff'), /* Modern Browsers */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-italic.ttf') format('truetype'), /* Safari, Android, iOS */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-italic.svg#SourceSans Pro') format('svg'); /* Legacy iOS */
                }

                /* source-sans-pro-600italic */
                @font-face {
                    font-family: 'Source Sans Pro';
                    font-style: italic;
                    font-weight: 600;
                    src: url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-600italic.eot'); /* IE9 Compat Modes */
                    src: local('Source Sans Pro'), local('SourceSans Pro-Italic'),
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-600italic.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-600italic.woff2') format('woff2'), /* Super Modern Browsers */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-600italic.woff') format('woff'), /* Modern Browsers */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-600italic.ttf') format('truetype'), /* Safari, Android, iOS */
                    url('//lib.baomitu.com/fonts/source-sans-pro/source-sans-pro-600italic.svg#SourceSans Pro') format('svg'); /* Legacy iOS */
                }
            </style>
</head>
<body class="hold-transition @yield('body_class')">

@yield('body')

@if(config('adminlte.plugins.select2'))
    <!-- Select2 -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
@endif

@if(config('adminlte.plugins.datatables'))
    <!-- DataTables with bootstrap 3 renderer -->
    <script src="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js"></script>
@endif

@if(config('adminlte.plugins.chartjs'))
    <!-- ChartJS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
@endif

<script crossorigin="anonymous" integrity="sha384-RIQuldGV8mnjGdob13cay/K1AJa+LR7VKHqSXrrB5DPGryn4pMUXRLh92Ev8KlGF" src="https://lib.baomitu.com/sweetalert/2.1.2/sweetalert.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-OpRdsqyoNpMsxINrUErWMPDGYcDdgDXG+MefUFBy42yukJGecar+6uS4HBGGWb+e" src="https://lib.baomitu.com/flatpickr/4.5.2/flatpickr.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-uOV94oddoQmmdQhRtBPzXMX7CBxGVw888Cp9gjgRspAq/go5oea3c+cS8OlY+N6C" src="https://lib.baomitu.com/wangEditor/3.1.1/wangEditor.min.js"></script>
<script>
    @if(get_first_flash('success'))
    swal("成功", "{{get_first_flash('success')}}", "success");
    @endif
    @if(get_first_flash('warning'))
    swal("警告", "{{get_first_flash('warning')}}", "warning");
    @endif
    @if(get_first_flash('error'))
    swal("错误", "{{get_first_flash('error')}}", "error");
    @endif
</script>

@yield('adminlte_js')

</body>
</html>
