<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>@lang('site.title')</title>

    {{--<!-- Bootstrap 3.3.7 -->--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/skin-blue.min.css') }}">

    @if (app()->getLocale() == 'ar')
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/AdminLTE-rtl.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/rtl.css') }}">

    {{-- chanige style fonts --}}

    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Cairo', sans-serif !important;
        }
    </style>
    @else
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/AdminLTE.min.css') }}">
    @endif

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>
<body class="login-page">

    <div class="login-box">

        <div class="login-logo">
            <a href="../../index2.html"><b>
                    <title>@lang('site.title')</title>
                </b></a>
        </div><!-- end of login lgo -->

        <div class="login-box-body">
            <p class="login-box-msg">Forgot Password</p>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    <h4>{{session('success')}}</h4>
                </div>
            @endif
            @include('partials._errors')

                    <form method="POST" action="{{route('forgot-password-post')}}">
                        @csrf

                        {{ method_field('post') }}

                        <div class="form-group has-feedback">
                            <input type="email" name="email" class="form-control" placeholder="@lang('site.email')">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
        
                        <button type="submit" class="btn btn-primary btn-block btn-flat">@lang('site.Reset')</button>
        
                        <div class="form-group">
                            <a href="{{ aurl('login') }}" class="card-link">Sign in</a>
                    </div>

                    </form><!-- end of form -->
        
                </div><!-- end of login body -->
        
            </div><!-- end of login-box -->
        
            {{--<!-- jQuery 3 -->--}}
            <script src="{{ asset('dashboard_files/js/jquery.min.js') }}"></script>
        
            {{--<!-- Bootstrap 3.3.7 -->--}}
            <script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>
        
            {{--icheck--}}
            <script src="{{ asset('dashboard_files/plugins/icheck/icheck.min.js') }}"></script>
        
            {{--<!-- FastClick -->--}}
            <script src="{{ asset('dashboard_files/js/fastclick.js') }}"></script>
        
        </body>
        
        </html>