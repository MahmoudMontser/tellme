@include('Admin.Layouts.header')

<html lang="ar" dir="rtl">
<!----------------------------------------- اول سكشن --------------------------------------->

<section id="login-page">
    <div class="container-fluid">
        <div class="row h-100">
            <div class="col-md-8 col-sm-10 text-center login-div">
                <h3 class="color-0E7">سجل دخولك الان</h3>
                    <form action="{{URL::to('admin/login')}}" class="row p-t-30 login-form" method="post">
                    {{csrf_field()}}
                    <!--                       error div -->

                        <?php $error_check = Session::get('error-l');?>
                        @if(!empty($error_check))
                    <div class="col-md-6 m-4 col-sm-10 mx-auto h-30-px row align-items-center justify-content-center login-error">

                        <p class="m-auto col-11">بيانات التسجيل خاطئه !</p>
                        <div id="close-error" class="col-1">
                            <i class="fas fa-times-circle"></i>
                        </div>

                    </div>
                        @endif
                    <!-- ********* input ***************************-->

                    <div class="form-group col-md-7 col-sm-10 mx-auto">

                        <input type="email" class="form-control" value="{{old('email')}}" name="email" placeholder="اسم المستخدم">

                    </div>

                    <div class="form-group col-md-7 col-sm-10 mx-auto">

                        <input type="password" class="form-control" name="password" placeholder="كلمة المرور">

                    </div>



                    <div class="form-group col-md-7 col-sm-10 mx-auto">
                        <input type="submit" value="دخول" class="btn btn-1565c0 form-control">
                    </div>



                </form>

            </div>
            <div class="col-md-4 d-none d-sm-block login-img">
                <img src="{{URL::to('/')}}/Assets/images/login.jpg" alt="">
                <div class="transparent text-center color-white m-auto d-flex justify-content-center align-items-center flex-column">
                    <h3>اهلا بك في </h3>
                    <h3>Tell ME</h3>
                    <h3>سجل دخولك الان</h3>


                </div>
            </div>
        </div>
    </div>

</section>
@include('Admin.Layouts.footer')
