
@include('Admin.Layouts.header')

<html lang="ar" dir="rtl">
<!----------------------------------------- اول سكشن --------------------------------------->

<section id="home-admin">

    <section id="create-survey-home">




        <main class="page-content">
            <div class="container-fluid with-nav">
                <div class="row create-new">
                    <div class="col-12">
                    <span class="login-rounded">
                        <img src="{{URL::to('/')}}/Assets/images/icons8-login-rounded-50.png" alt="">
                    </span>
                        <h6 class="p-1 d-inline-block">انشاء  استبيان</h6>
                    </div>
                </div>


                <form  class="row" action="{{URL::to('/admin/surveys')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                <div class="row col-12">

                    <div class="col-md-12 col-sm-12 mx-auto row">






                        <div class="form-group col-md-4 col-sm-12 row">
                            <label for="inputType" class="col-sm-12 col-form-label"  @if($errors->has('types')) text-danger @endif>نوع المستخدم</label>
                            <div class="d-inline-block col-sm-12 mx-auto">
                                <select value="" title="اختر اكثر من اختيار" class="form-control selectpicker  @if($errors->has('types'))  is-invalid @endif" name="types[]" multiple>

                                        <option value="Teacher"> مدريبين</option>
                                        <option value="Student"> متدربين</option>


                                </select>
                                @if($errors->has('types'))
                                    <div class="col-sm-3">
                                        <small id="passwordHelp" class="text-danger">
                                            {{$errors->first('types')}}
                                        </small>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- ********* input ***************************-->

                        <?php
                        $departments=\App\Department::all();
                        ?>

                        <div class="form-group col-md-4 col-sm-12 row">
                            <label for="inputType" class="col-sm-12 col-form-label"  @if($errors->has('departments')) text-danger @endif>القسم</label>
                            <div class="d-inline-block col-sm-12 mx-auto">
                                <select value="" title="اختر اكثر من اختيار" class="form-control selectpicker  @if($errors->has('departments'))  is-invalid @endif" name="departments[]" multiple>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}" @if(old('departments')==$department->id ) selected @endif> {{$department->name}}</option>
                                    @endforeach

                                </select>
                                @if($errors->has('departments'))
                                    <div class="col-sm-3">
                                        <small id="passwordHelp" class="text-danger">
                                            {{$errors->first('departments')}}
                                        </small>
                                    </div>
                                @endif
                            </div>
                        </div>                        <!-- ********* input ***************************-->


                        <?php
                        $groups=\App\Group::all();
                        ?>

                        <div class="form-group col-md-4 col-sm-12 row">
                            <label for="inputType" class="col-sm-12 col-form-label"  @if($errors->has('groups')) text-danger @endif>الفصل</label>
                            <div class="d-inline-block col-sm-12 mx-auto">
                                <select value="" title="اختر اكثر من اختيار" class="form-control selectpicker  @if($errors->has('groups'))  is-invalid @endif" name="groups[]" multiple>
                                    @foreach($groups as $group)
                                        <option value="{{$group->id}}" @if(old('groups')==$group->id ) selected @endif> {{$group->name}}</option>
                                    @endforeach

                                </select>
                                @if($errors->has('groups'))
                                    <div class="col-sm-3">
                                        <small id="passwordHelp" class="text-danger">
                                            {{$errors->first('groups')}}
                                        </small>
                                    </div>
                                @endif
                            </div>
                        </div>






                        <!-- ********* input ***************************-->
                        <?php
                        $courses=\App\Course::all();
                        ?>

                        <div class="form-group col-md-4 col-sm-12 row">
                            <label for="inputType" class="col-sm-12 col-form-label"  @if($errors->has('courses')) text-danger @endif>المقرر</label>
                            <div class="d-inline-block col-sm-12 mx-auto">
                                <select value="" title="اختر اكثر من اختيار" class="form-control selectpicker  @if($errors->has('courses'))  is-invalid @endif" name="courses[]" multiple>
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}" @if(old('courses')==$course->id ) selected @endif> {{$course->name}}</option>
                                    @endforeach

                                </select>
                                @if($errors->has('courses'))
                                    <div class="col-sm-3">
                                        <small id="passwordHelp" class="text-danger">
                                            {{$errors->first('courses')}}
                                        </small>
                                    </div>
                                @endif
                            </div>
                        </div>


                    </div>

                </div>

                <div class="row col-12">

                    <div class="col-md-5 col-sm-12 mx-auto div-border question-box p-t-10 m-t-20">
                        <div class="box-header">
                            <span class="first-color p-l-10">
                                <i class="fas fa-plus-circle"></i>
                            </span>
                            <h6 class="d-inline-block">مدة عرض  استبيان</h6>
                        </div>
                        <hr>
                        <div class="box-body row">
                            <div class="col-6">
                                <label for="input-first-date" class="col-form-label fz-12 @if($errors->has('start_date')) text-danger @endif">تاريخ البدايه</label>
                                <input type="date" value="{{ old('start_date')}}" class="form-control @if($errors->has('start_date'))  is-invalid @endif" name="start_date" id="input-last-date">
                                @if($errors->has('start_date'))
                                    <div class="col-sm-3">
                                        <small id="passwordHelp" class="text-danger">
                                            {{$errors->first('start_date')}}
                                        </small>
                                    </div>
                                @endif

                            </div>

                            <div class="col-6">
                                <label for="input-last-date" class="col-form-label fz-12  @if($errors->has('end_date')) text-danger @endif">تاريخ النهايه</label>
                                <input type="date" value="{{old('end_date')}}" class="form-control @if($errors->has('end_date'))  is-invalid @endif" name="end_date" id="input-last-date">
                                @if($errors->has('end_date'))
                                    <div class="col-sm-3">
                                        <small id="passwordHelp" class="text-danger">
                                            {{$errors->first('end_date')}}
                                        </small>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>

                    <div class="col-md-5 col-sm-12 mx-auto div-border question-box p-t-10 m-t-20">
                        <div class="box-header">
                            <span class="first-color p-l-10">
                                <i class="fas fa-plus-circle"></i>
                            </span>
                            <h6 class="d-inline-block">نوع  استبيان</h6>
                        </div>
                        <hr>
                        <div class="box-body row">
                            <div class="col-6">
                                <label for="survey-add" class="col-form-label fz-12  @if($errors->has('title')) text-danger @endif">عنوان  الاستبيان</label>
                                <input type="text"  value="{{old('title')}}" class="form-control @if($errors->has('title'))  is-invalid @endif" name="title"/>
                                @if($errors->has('title'))
                                    <div class="col-sm-3">
                                        <small id="passwordHelp" class="text-danger">
                                            {{$errors->first('title')}}
                                        </small>
                                    </div>
                                @endif

                            </div>



                            <div class="col-6">
                                <label for="make-for" class="col-form-label fz-12  @if($errors->has('target')) text-danger @endif">الهدف من الاستبيان</label>
                                <input type="text"  value="{{old('target')}}" class="form-control @if($errors->has('target'))  is-invalid @endif" name="target"/>
                                @if($errors->has('target'))
                                    <div class="col-sm-3">
                                        <small id="passwordHelp" class="text-danger">
                                            {{$errors->first('target')}}
                                        </small>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>


                    <div class="form-group col-md-1 col-sm-5 mx-auto">

                        <input type="submit" class="form-control btn btn-first-color" value="انشاء">

                    </div>
                </div>



                </form>




{{--                    <div class="col-md-10 col-sm-12 mx-auto div-border question-box p-t-10 m-t-30">--}}
{{--                        <div class="box-header">--}}
{{--                            <span class="first-color p-l-10">--}}
{{--                                <i class="fas fa-plus-circle"></i>--}}
{{--                            </span>--}}
{{--                            <h6 class="d-inline-block">اضافة سؤال</h6>--}}
{{--                        </div>--}}
{{--                        <hr>--}}
{{--                        <div class="box-body row">--}}
{{--                            <div class="col-4">--}}
{{--                                <label for="survey-add" class="col-form-label fz-12">السؤال</label>--}}
{{--                                <input type="text" class="form-control" id="survey-add">--}}

{{--                            </div>--}}

{{--                            <div class="col-4">--}}
{{--                                <label for="make-for" class="col-form-label fz-12">نوع السؤال</label>--}}
{{--                                <select class="form-control">--}}
{{--                                    <option disabled selected>اختر</option>--}}
{{--                                    <option>اختيار 3</option>--}}
{{--                                    <option>اختيار 4</option>--}}
{{--                                    <option>حقل نصي</option>--}}

{{--                                </select>--}}
{{--                            </div>--}}

{{--                            <div class="col-4">--}}
{{--                                <label for="make-for" class="col-form-label fz-12">نوع الاجابه</label>--}}
{{--                                <select class="form-control">--}}
{{--                                    <option disabled selected>اختر</option>--}}
{{--                                    <option>جيد-جيدجدا-ممتاز-ضعيف</option>--}}
{{--                                    <option>نعم/لا</option>--}}
{{--                                    <option>اوافق -لا اوافق -ربما</option>--}}
{{--                                    <option>حقل نصي</option>--}}

{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="col-12 p-3 d-flex justify-content-end">--}}
{{--                                <input type="submit" value="حفظ" class="btn btn-first-color fz-12">--}}
{{--                            </div>--}}
{{--                        </div--}}

{{--                    </div>--}}

                </div>
            </div>






        </main>
        <!-- page-content" -->
        </div>
    </section>

</section>
@include('Admin.Layouts.footer')
