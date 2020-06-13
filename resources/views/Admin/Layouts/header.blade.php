<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">




    <link rel="stylesheet" href="{{URL::to('/')}}/Assets/css/animate.min.css" type="text/css">

    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::to('/')}}/Assets/css/bootstrap-select.min.css">





    <!--    rtl bootstrap-->
    <link rel="stylesheet" href="{{URL::to('/')}}/Assets/css/bootstrapRtl.min.css">




    <!-- Main Style -->


    <link rel="stylesheet" href="{{URL::to('/')}}/Assets/css/style.css" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Lalezar&display=swap" rel="stylesheet">


    <title>Header</title>

</head>




<body dir="rtl">



<section>

    <div class="navigation-wrap">
        <div class="top-header d-flex justify-content-end align-items-center">
            @if(!\Illuminate\Support\Facades\Auth::guest())
            <a href="{{\Illuminate\Support\Facades\URL::to('admin/logout')}}" class="second-color fz-12 p-l-25">خروج<i class="fas fa-sign-in-alt m-r-5"></i></a>
                @endif

        </div>

        <div class="container-fluid header">

            <div class="row h-100">
                <div class="col-3 text-center">
                    <a href="" class="logo"><img src="{{URL::to('/')}}/Assets/images/logo.jpg" alt=""></a>

                </div>
                <div class="col-7 d-flex justify-content-start align-self-center text-center">
                    <ul class="header-list mx-auto">

                        @if(!\Illuminate\Support\Facades\Auth::guest())
                            @if(\Illuminate\Support\Facades\Auth::user()->type=='Admin')
                        <li> <a href="{{URL::to('admin')}}" class="first-link">الرئيسيه</a>  </li>
                            @else
                        <li> <a href="{{URL::to('/')}}" class="first-link">الرئيسيه</a>  </li>

                            @endif
                        <li><a href="{{URL::to('/admin/about_us')}}">من نحن </a> </li>
                        @endif
                    </ul>


                </div>
                <div class="col-2 text-center">
                    @if(!\Illuminate\Support\Facades\Auth::guest())
                    <a href="" class="user-photo"><img src="{{asset('storage/app/Images/User/Images/' .\Illuminate\Support\Facades\Auth::id(). '/'.\Illuminate\Support\Facades\Auth::user()->image)}}" alt="{{\Illuminate\Support\Facades\Auth::user()->name}}" class="rounded-circle m-t-15" ></a>
                        @else
                        <a href="{{\Illuminate\Support\Facades\URL::to('admin/login')}}" class="second-color fz-12 p-l-25">تسجبل الدخول<i class="fas fa-sign-in-alt m-r-5"></i></a>

                    @endif

                </div>
            </div>
        </div>




    </div>
</section>
@if(\Illuminate\Support\Facades\Auth::check())
@if(\Illuminate\Support\Facades\Auth::user()->type=='Admin')
    @if(!isset($hide_sid))
@include('Admin.Layouts.sidenav')
    @endif
    @endif
    @endif
