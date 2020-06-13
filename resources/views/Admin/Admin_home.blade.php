@include('Admin.Layouts.header')

<section id="home-admin" class="users-list-page">


    <!-- sidebar-wrapper  -->
    <main class="page-content">
        <div class="container-fluid with-nav">
            <div class="row wedged">
                <div class="col-3 mx-auto bg-white row">
                    <div class="col-8 text-center p-t-25">
                        <h6>الاستبيانات المتاحه</h6>
                        <span class="survey-num first-color fz-30">{{\App\Survey::where('start_date', '<=', \Carbon\Carbon::now())
    ->where('end_date', '>=', \Carbon\Carbon::now())->count()}} </span>

                    </div>
                    <div class="col-4 text-center d-flex align-items-center">
                        <span><img src="{{URL::to('/')}}/Assets/images/icons8-survey-64%20(1).png" alt=""></span>
                    </div>

                </div>
                <div class="col-3 mx-auto bg-white row">
                    <div class="col-8 text-center p-t-25">
                        <h6>عدد المدربين</h6>
                        <span class="survey-num first-color fz-30">{{\App\User::where('type','Teacher')->count()}} </span>

                    </div>
                    <div class="col-4 text-center d-flex align-items-center">
                        <span><img src="{{URL::to('/')}}/Assets/images/icons8-user-account-50%20(1).png" alt=""></span>
                    </div>

                </div>
                <div class="col-3 mx-auto bg-white row">
                    <div class="col-8 text-center p-t-25">
                        <h6>عدد المتدربين</h6>
                        <span class="survey-num first-color fz-30">{{\App\User::where('type','Student')->count()}}</span>

                    </div>
                    <div class="col-4 text-center d-flex align-items-center">
                        <span><img src="{{URL::to('/')}}/Assets/images/icons8-user-account-50%20(1).png" alt=""></span>
                    </div>

                </div>


            </div>
            <hr>
            <div class="row create-new">
                <div class="col-12">
                    <span class="login-rounded">
                        <img src="{{URL::to('/')}}/Assets/images/icons8-login-rounded-50.png" alt="">
                    </span>
                    <h6 class="p-1 d-inline-block">الاستبيانات</h6>
                </div>

                <div class="col-md-11 col-sm-12 mx-auto p-t-20" style="overflow: scroll">


                @if(Session::get('PopSuccess') != '')

                    <!--success div-->
                        <div class="col-md-12 m-2 col-sm-12 mx-auto btn-success h-30-px row align-items-center done-success">

                            <p class="m-auto col-11 text-center">{{Session::get('PopSuccess')}}</p>
                            <div id="close-done-success" class="col-1">
                                <i class="fas fa-times-circle"></i>
                            </div>

                        </div>
                        <!--/// success div-->

                    {{ Session::forget('PopSuccess') }}

                @endif



                    <table class="table table-striped">
                        <thead class="bg-white">
                        <tr>
                            <th scope="col">الرقم</th>
                            <th scope="col">عنوان  الاستبيان</th>
                            <th scope="col">هدف  الاستبيان</th>
                            <th scope="col">عدد الاسئلة</th>

                            <th scope="col">عدد الاصوات</th>
                            <th scope="col">تاريخ العرض</th>
                            <th scope="col">التفعيل</th>
                            <th scope="col">تعديل</th>
                            <th scope="col">حذف</th>
                            <th scope="col">التقرير</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $surveys=\App\Survey::all();
                            $x=1;
                        ?>
                        @foreach($surveys as $survey)
                            <tr id="row_{{ $survey->id }}">
                            <td class="first-color">{{$x}}</td>
                            <td>{{$survey->title}}</td>
                            <td>{{$survey->target}}</td>
                            <td>{{\App\Question::where('survey_id',$survey->id)->count()}}</td>
                            <td class="first-color">{{\count(\App\Vote::where('survey_id',$survey->id)->groupBy('user_id')->get())}}</td>
                            <td class="first-color">{{$survey->start_date}} - {{$survey->end_date}}</td>
                            <td>


                                @if($survey->start_date <= \Carbon\Carbon::now() && $survey->end_date >= \Carbon\Carbon::now())
                                    مفعل
                                    @else
                                    متوقف
                                @endif


                            </td>
                            <td>
                                <a href="{{ URL::to('/admin/surveys/'.$survey->id.'/edit') }}">

                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            </td>
                                <td>
                                    <a onclick="showConfirmMessage('{{URL::to('admin/surveys/'.$survey->id.'/delete')}}')"
                                       data-toggle="tooltip"
                                       data-placement="top" title="حذف " style="margin: auto">
                                        <img src="{{URL::to('/')}}/Assets/images/icons8-delete-48.png" class="icon-size" alt="">
                                    </a>


                                </td>
                                <td>
                                    <a href="{{URL::to('admin/survey/'.$survey->id.'/result')}}">
                                        <img src="{{URL::to('/')}}/Assets/images/icons8-survey-64%20(1).png" class="icon-size" alt="">
                                    </a>
                                </td>
                        </tr>
                            <?php
                            $x++;
                            ?>
                            @endforeach

                        </tbody>
                    </table>



                </div>
            </div>




        </div>


    </main>
    <!-- page-content" -->
    </div>
</section>
@include('Admin.Layouts.footer')

