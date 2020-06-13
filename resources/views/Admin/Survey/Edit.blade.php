
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
                        <h6 class="p-1 d-inline-block">تعديل استبيان</h6>
                    </div>
                </div>

                <form  class="row" action="{{URL::to('/admin/survey/'.$survey->id.'/edit')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                <div class="row col-12">

                    <div class="col-md-12 col-sm-12 mx-auto row">

                        <!-- ********* input ***************************-->




                        <div class="form-group col-md-4 col-sm-12 row">
                            <label for="inputType" class="col-sm-12 col-form-label"  @if($errors->has('types')) text-danger @endif>نوع المستخدم</label>
                            <div class="d-inline-block col-sm-12 mx-auto">
                                <?php
                                $types=unserialize($survey->types);
                                ?>
                                <select value="{{old('types')}}" title="اختر اكثر من اختيار" class="form-control selectpicker  @if($errors->has('types'))  is-invalid @endif" name="types[]" multiple>

                                    <option value="Teacher" @if( $types!= [] && in_array('Teacher',$types) ) selected @endif> مدربين</option>
                                    <option value="Student" @if( $types!= [] && in_array('Student',$types) ) selected @endif> متدربين</option>
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



                    <?php
                        $departments=\App\Department::all();
                        ?>

                        <div class="form-group col-md-4 col-sm-12 row">
                            <label for="inputType" class="col-sm-12 col-form-label"  @if($errors->has('departments')) text-danger @endif>القسم</label>
                            <div class="d-inline-block col-sm-12 mx-auto">
                                <select value="{{old('departments')}}" title="اختر اكثر من اختيار" class="form-control selectpicker  @if($errors->has('departments'))  is-invalid @endif" name="departments[]" multiple>
                                    <?php
                                    $departments_id=unserialize($survey->departments);
                                    ?>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}"  @if( $departments_id!= [] && in_array($department->id,$departments_id) ) selected @endif > {{$department->name}}</option>
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
                                <select value="{{old('groups')}}" title="اختر اكثر من اختيار" class="form-control selectpicker  @if($errors->has('groups'))  is-invalid @endif" name="groups[]" multiple>
                                    <?php
                                    $groups_id=unserialize($survey->groups);
                                    ?>
                                    @foreach($groups as $group)
                                        <option value="{{$group->id}}" @if( $groups_id!= [] && in_array($group->id,$groups_id) ) selected @endif > {{$group->name}}</option>
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
                        </div>                                    <!-- ********* input ***************************-->
                        <?php
                        $courses=\App\Course::all();
                        ?>

                        <div class="form-group col-md-4 col-sm-12 row">
                            <label for="inputType" class="col-sm-12 col-form-label"  @if($errors->has('courses')) text-danger @endif>المقرر</label>
                            <div class="d-inline-block col-sm-12 mx-auto">
                                <select value="{{old('courses')}}" title="اختر اكثر من اختيار" class="form-control selectpicker  @if($errors->has('courses'))  is-invalid @endif" name="courses[]" multiple>
                                 <?php
                                    $courses_id=unserialize($survey->courses);
                                    ?>
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}" @if( $courses_id!= [] && in_array($course->id,$courses_id) ) selected @endif> {{$course->name}}</option>
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
                                <input type="date" value="{{$survey->start_date}}" class="form-control @if($errors->has('start_date'))  is-invalid @endif" name="start_date" id="input-last-date">
                                @if($errors->has('start_date'))
                                    <div class="col-sm-3">
                                        <small id="passwordHelp" class="text-danger">
                                            {{$errors->first('start_date')}}
                                        </small>
                                    </div>
                                @endif

                            </div>

                            <div class="col-6">
                                <label for="input-last-date" class="col-form-label fz-12  @if($errors->has('title')) text-danger @endif">تاريخ النهايه</label>
                                <input type="date" value="{{$survey->end_date}}" class="form-control @if($errors->has('end_date'))  is-invalid @endif" name="end_date" id="input-last-date">
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
                                <label for="survey-add" class="col-form-label fz-12  @if($errors->has('title')) text-danger @endif">عنوان الاستطلاع</label>
                                <input type="text"  value="{{$survey->title}}" class="form-control @if($errors->has('title'))  is-invalid @endif" name="title"/>
                                @if($errors->has('title'))
                                    <div class="col-sm-3">
                                        <small id="passwordHelp" class="text-danger">
                                            {{$errors->first('title')}}
                                        </small>
                                    </div>
                                @endif

                            </div>

                            <div class="col-6">
                                <label for="make-for" class="col-form-label fz-12  @if($errors->has('title')) text-danger @endif">الهدف من الاستبيان</label>
                                <input type="text"  value="{{$survey->target}}" class="form-control @if($errors->has('target'))  is-invalid @endif" name="target"/>
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

                        <input type="submit" class="form-control btn btn-first-color" value="تعديل">

                    </div>



                </div>



                </form>


                <hr>

                <div class="row create-new">
                    <div class="col-12">
                    <span class="login-rounded">
                        <img src="{{URL::to('/')}}/Assets/images/icons8-login-rounded-50.png" alt="">
                    </span>
                        <h6 class="p-1 d-inline-block">الاسئلة</h6>
                    </div>

                    <div class="col-md-8 col-sm-12 mx-auto p-t-20" style="overflow: scroll">
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
                                <th scope="col">السوال</th>
                                <th scope="col">نوع الأجابة</th>
                                <th scope="col">تعديل</th>
                                <th scope="col">حذف</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $questions=\App\Question::where('survey_id',$survey->id)->get();

                            ?>
                            @foreach($questions as $question)
                                <tr id="row_{{ $question->id }}">
                                    <td>{{$question->question}}</td>
                                    <td>
                                        @if($question->answer_type=='Estimates')
                                            جيد-جيدجدا-ممتاز-ضعيف
                                            @elseif($question->answer_type=='Confirmation')
                                            نعم/لا
                                        @elseif($question->answer_type=='Approval')

                                            اوافق -لا اوافق -ربم

                                            @else
                                        حقل نصي
                                            @endif


                                    </td>
                                    <td>

                                        <a   data-toggle="modal" data-target="#Update{{$question->id}}" style="color:#007bff">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a onclick="showConfirmMessage('{{URL::to('admin/questions/'.$question->id.'/delete')}}')"
                                           data-toggle="tooltip"
                                           data-placement="top" title="حذف " style="margin: auto">
                                            <img src="{{URL::to('/')}}/Assets/images/icons8-delete-48.png" class="icon-size" alt="">
                                        </a>


                                    </td>
                                </tr>





                                <div class="modal fade" id="Update{{$question->id}}" tabindex="-1" role="dialog">
                                    <form action="{{URL::to('/admin/question/'.$question->id.'/edit')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="modal-dialog " role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="smallModalLabel">تعديل السؤال</h4>
                                                    <small><b>السؤال :</b> {{$question->question}}</small>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-sm-8 col-xs-8">
                                                            <div class="input-group">
                                                                                    <span class="input-group-addon">
                                                                                     السؤال :
                                                                                    </span>
                                                                <div class="form-line">

                                                                    <input type="text"  value="{{$question->question}}" class="form-control @if($errors->has('question'))  is-invalid @endif" name="question"/>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8 col-xs-8">
                                                            <div class="input-group">
                                                                                    <span class="input-group-addon">
                                                                                     نوع الاجابة:
                                                                                    </span>
                                                                <div class="form-line">

                                                                    <select class="form-control @if($errors->has('answer_type'))  is-invalid @endif" name="answer_type">
                                                                        <option disabled selected>اختر</option>
                                                                        <option value="Estimates" @if($question->answer_type=='Estimates' ) selected @endif >جيد-جيدجدا-ممتاز-ضعيف</option>
                                                                        <option value="Confirmation" @if($question->answer_type=='Confirmation' ) selected @endif >نعم/لا</option>
                                                                        <option  value="Approval" @if($question->answer_type=='Approval' ) selected @endif >اوافق -لا اوافق -ربما</option>
                                                                        <option value="TextArea" @if($question->answer_type=='TextArea' ) selected @endif >حقل نصي</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn prime-bg">تنفيذ</button>
                                                    <button type="button" class="btn bg-blue-grey " data-dismiss="modal">إلغاء</button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                            @endforeach
                            </tbody>
                        </table>



                    </div>
                </div>


                <hr>

                <div class="col-md-10 col-sm-12 mx-auto div-border question-box p-t-10 m-t-30">
                        <div class="box-header">
                            <span class="first-color p-l-10">
                                <i class="fas fa-plus-circle"></i>
                            </span>
                            <h6 class="d-inline-block">اضافة سؤال</h6>
                        </div>
                        <hr>
                    <form action="{{URL::to('/admin/survey/'.$survey->id.'/question/create')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="box-body row">
                            <div class="col-4">
                                <label for="question-add" class="col-form-label fz-12  @if($errors->has('question')) text-danger @endif">السؤال</label>
                                <input type="text"  value="{{old('question')}}" class="form-control @if($errors->has('question'))  is-invalid @endif" name="question"/>
                                @if($errors->has('question'))
                                    <div class="col-sm-3">
                                        <small id="passwordHelp" class="text-danger">
                                            {{$errors->first('question')}}
                                        </small>
                                    </div>
                                @endif

                            </div>


                            <div class="col-4">
                                <label for="make-for" class="col-form-label fz-12 @if($errors->has('answer_type')) text-danger @endif">نوع الاجابه</label>
                                <select class="form-control @if($errors->has('answer_type'))  is-invalid @endif" name="answer_type">
                                    <option disabled selected>اختر</option>
                                    <option value="Estimates" @if(old('answer_type')=='Estimates' ) selected @endif >جيد-جيدجدا-ممتاز-ضعيف</option>
                                    <option value="Confirmation" @if(old('answer_type')=='Confirmation' ) selected @endif >نعم/لا</option>
                                    <option  value="Approval" @if(old('answer_type')=='Approval' ) selected @endif >اوافق -لا اوافق -ربما</option>
                                    <option value="TextArea" @if(old('answer_type')=='TextArea' ) selected @endif >حقل نصي</option>

                                </select>

                                @if($errors->has('answer_type'))
                                    <div class="col-sm-3">
                                        <small id="passwordHelp" class="text-danger">
                                            {{$errors->first('answer_type')}}
                                        </small>
                                    </div>
                                @endif
                            </div>
                            <div class="col-12 p-3 d-flex justify-content-end">
                                <input type="submit" value="حفظ" class="btn btn-first-color fz-12">
                            </div>
                        </div>
                    </form>
                    </div>

                </div>
            </div>






        </main>
        <!-- page-content" -->
        </div>
    </section>

</section>
@include('Admin.Layouts.footer')
