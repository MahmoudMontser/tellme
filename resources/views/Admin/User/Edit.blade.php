@include('Admin.Layouts.header')





<?php
$Users = \App\User::where('type', 'Brand')->orderBy('id', 'desc')->get();
?>














<html lang="ar" dir="rtl">
<!----------------------------------------- اول سكشن --------------------------------------->

<section id="home-admin">


    <!-- sidebar-wrapper  -->
    <main class="page-content">
        <div class="container-fluid with-nav">
            <div class="row admin-name">
                    <span class="p-1">
                        <i class="fa fa-user fa-1x"></i>

                    </span>
                <h6 class="p-1">اسم الادمن <span class="p-1">(Admin)</span></h6>

            </div>
            <hr>
            <div class="row create-new">
                <div class="col-12">
                    <span class="login-rounded">
                        <img src="NoName/images/icons8-login-rounded-50.png" alt="">
                    </span>
                    <h6 class="p-1 d-inline-block">انشاء مستخدم جديد</h6>
                </div>

                <div class="col-md-10 col-sm-12 mx-auto">
                    <!--  ************ all form******************************** -->
                    <form action="{{URL::to('admin/user/'.$Usr->id.'/edit ')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <!-- ********* input ***************************-->

                        <div class="form-group col-md-6 col-sm-12 row">
                            <label for="inputName" class="col-sm-2 col-form-label @if($errors->has('name')) text-danger @endif ">الاسم </label>
                            <div class="d-inline-block col-sm-10 mx-auto">
                                <input type="text"  value="{{$Usr->name}}" class="form-control @if($errors->has('name'))  is-invalid @endif" name="name"  id="inputName"/>
                                @if($errors->has('name'))
                                    <div class="col-sm-3">
                                        <small id="passwordHelp" class="text-danger">
                                            {{$errors->first('name')}}
                                        </small>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- ********* input ***************************-->

                        <div class="form-group col-md-6 col-sm-12 row">
                            <label for="inputType" class="col-sm-3 col-form-label @if($errors->has('type')) text-danger @endif">نوع المستخدم </label>
                            <div class="d-inline-block col-sm-9 mx-auto">
                                <select class="form-control "  name="type" data-live-search="true"  id="type">
                                    <option disabled selected>اختر</option>
                                    <option value="Admin" @if($Usr->type=='Admin' ) selected @endif  >مشرف</option>
                                    <option value="Teacher" @if($Usr->type=='Teacher' ) selected @endif>مدرب</option>
                                    <option value="Student" @if($Usr->type=='Student' ) selected @endif>متدرب</option>
                                </select>
                                @if($errors->has('type'))
                                    <div class="col-sm-3">
                                        <small id="passwordHelp" class="text-danger">
                                            {{$errors->first('type')}}
                                        </small>
                                    </div>
                                @endif

                            </div>
                        </div>
                        <!-- ********* input ***************************-->

                        <div class="form-group col-md-6 col-sm-12 row">
                            <label for="inputEmail" class="col-sm-2 col-form-label @if($errors->has('email')) text-danger @endif">البريد </label>
                            <div class="d-inline-block col-sm-10 mx-auto">
                                <input type="email"  value="{{$Usr->email}}" class="form-control @if($errors->has('email'))  is-invalid @endif" name="email" id="inputEmail">
                                @if($errors->has('email'))
                                    <div class="col-sm-3">
                                        <small id="passwordHelp" class="text-danger">
                                            {{$errors->first('email')}}
                                        </small>
                                    </div>
                                @endif
                            </div>
                        </div>



                        <!-- ********* input ***************************-->


                        <div class="form-group col-md-6 col-sm-12 row  @if($errors->has('phone')) text-danger @endif">
                            <label for="inputTel" class="col-sm-2 col-form-label">الهاتف </label>
                            <div class="d-inline-block col-sm-10 mx-auto">
                                <input type="tel" value="{{$Usr->phone}}" class="form-control @if($errors->has('phone'))  is-invalid @endif" name="phone" id="inputTel">
                                @if($errors->has('phone'))
                                    <div class="col-sm-3">
                                        <small id="passwordHelp" class="text-danger">
                                            {{$errors->first('phone')}}
                                        </small>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- ********* input ***************************-->



                        <?php
                        $departments=\App\Department::all();
                        ?>
                        <div class="form-group col-md-6 col-sm-12 row">
                            <label for="inputDepart" class="col-sm-2 col-form-label @if($errors->has('department_id')) text-danger @endif ">القسم </label>
                            <div class="d-inline-block col-sm-10 mx-auto">
                                <select value="{{old('department_id')}}" class="form-control @if($errors->has('department_id'))  is-invalid @endif" name="department_id">
                                    <option disabled selected>اختر</option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}" @if($Usr->department_id==$department->id ) selected @endif> {{$department->name}}</option>
                                    @endforeach

                                </select>
                                @if($errors->has('department_id'))
                                    <div class="col-sm-3">
                                        <small id="passwordHelp" class="text-danger">
                                            {{$errors->first('department_id')}}
                                        </small>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <?php
                        $groups=\App\Group::all();
                        ?>
                        <div class="form-group col-md-6 col-sm-12 row">
                            <label for="inputDepart" class="col-sm-2 col-form-label @if($errors->has('group_id')) text-danger @endif ">الفصل التدريبي </label>
                            <div class="d-inline-block col-sm-10 mx-auto">
                                <select value="{{old('group_id')}}" class="form-control @if($errors->has('group_id'))  is-invalid @endif" name="group_id">
                                    <option disabled >اختر</option>
                                    @foreach($groups as $group)
                                        <option value="{{$group->id}}" @if($Usr->group_id==$group->id ) selected @endif> {{$group->name}}</option>
                                    @endforeach

                                </select>
                                @if($errors->has('group_id'))
                                    <div class="col-sm-3">
                                        <small id="passwordHelp" class="text-danger">
                                            {{$errors->first('group_id')}}
                                        </small>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- ********* input ***************************-->
                        <div class="form-group col-md-6 col-sm-12 row">
                            <label for="password" class="col-sm-3 col-form-label @if($errors->has('password')) text-danger @endif">كلمة المرور </label>
                            <div class="d-inline-block col-sm-9 mx-auto">
                                <input type="password" value="{{old('password')}}" class="form-control @if($errors->has('password'))  is-invalid @endif" name="password"  id="password">
                                @if($errors->has('password'))
                                    <div class="col-sm-3">
                                        <small id="passwordHelp" class="text-danger">
                                            {{$errors->first('password')}}
                                        </small>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- ********* input ***************************-->


                        <div class="form-group col-md-6 col-sm-12 row">
                            <label for="password" class="col-sm-4 col-form-label @if($errors->has('password_confirmation')) text-danger @endif">تاكيد كلمة المرور </label>
                            <div class="d-inline-block col-sm-8 mx-auto">
                                <input type="password" value="{{old('password_confirmation')}}" class="form-control @if($errors->has('password_confirmation'))  is-invalid @endif" name="password_confirmation" id="password">
                                @if($errors->has('password_confirmation'))
                                    <div class="col-sm-3">
                                        <small id="passwordHelp" class="text-danger">
                                            {{$errors->first('password_confirmation')}}
                                        </small>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- ********* input ***************************-->


                        <div class="form-group col-md-6 col-sm-12 row">
                            <label for="password" class="col-sm-4 col-form-label @if($errors->has('image')) text-danger @endif">تحميل الصوره </label>
                            <div class="d-inline-block col-sm-8 mx-auto">
                                <input type='file' name="image" id="imgInp" class="btn"/>
                                <img id="blah"  class="@if($errors->has('image'))  is-invalid @endif" src="{{asset('storage/app/Images/User/Images/' . $Usr->id . '/'.$Usr->image)}}" alt="user img" style="height: 60px;width: 60px"/>

                                @if($errors->has('image'))
                                    <div class="col-sm-3">
                                        <small id="passwordHelp" class="text-danger">
                                            {{$errors->first('image')}}
                                        </small>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- ********* input ***************************-->


                        <div class="form-group col-md-12 col-sm-12 row d-flex justify-content-end">
                            <input type="submit" value="حفظ" class="btn btn-first-color">
                        </div>



                    </form>
                </div>
            </div>
        </div>


    </main>
    <!-- page-content" -->

</section>
@include('Admin.Layouts.footer')


