@include('Admin.Layouts.header')













<html lang="ar" dir="rtl" >
<!----------------------------------------- اول سكشن --------------------------------------->

<section id="home-admin" class="users-list-page">


    <!-- sidebar-wrapper  -->
    <main class="page-content">
        <div class="container-fluid with-nav">
            <div class="row admin-name">
                    <span class="p-1">
                        <i class="fa fa-user fa-1x"></i>

                    </span>
                <h6 class="p-1">اسم الادمن <span class="p-1">({{\Illuminate\Support\Facades\Auth::user()->name}})</span></h6>

            </div>
            <hr>
            <div class="row create-new">
                <div class="col-12">
                    <span class="login-rounded">
                        <img src="NoName/images/icons8-login-rounded-50.png" alt="">
                    </span>
                    <h6 class="p-1 d-inline-block">المستخدمين</h6>
                </div>

                <div class="col-md-11 col-sm-12 mx-auto p-t-30" style="overflow: scroll">

                    <!--success div-->
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

                @endif                    <!--/// success div-->


                    <table class="table table-striped">
                        <thead class="bg-white">
                        <tr>
                            <th scope="col">الاسم </th>
                            <th scope="col">نوع المستخدم</th>
                            <th scope="col">الفصل التدريبي</th>
                            <th scope="col">القسم </th>
                            <th scope="col">البريد</th>
                            <th scope="col">الهاتف</th>
                            <th scope="col">وقت الانشاء</th>
                            <th scope="col">تعديل</th>
                            <th scope="col">حذف</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $Users=\App\User::orderBy('id', 'desc')->get();
                        ?>
                        @foreach($Users as $User)
                            <tr id="row_{{ $User->id }}">
                                <td>{{$User->name}}</td>
                                <td>
                                    @if($User->type=="Admin")
                                        مشرف
                                    @elseif($User->type=="Teacher")
                                        مدرب
                                    @else
                                        متدرب
                                    @endif
                                </td>

                                <td> @if(\App\Group::find($User->group_id)){{\App\Group::find($User->group_id)->name}} @endif</td>


                            <td> @if(\App\Department::find($User->department_id)){{\App\Department::find($User->department_id)->name}} @endif</td>

                                <td>{{$User->phone}}</td>
                                <td>{{$User->email}}</td>
                                <td>{{$User->created_at}}</td>
                                <td>

                                    <a href="{{ URL::to('admin/users/'.$User->id.'/edit') }}">

                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </td>
                                <td>
                                    <a onclick="showConfirmMessage('{{URL::to('admin/users/'.$User->id.'/delete')}}')"
                                       data-toggle="tooltip"
                                       data-placement="top" title="حذف " style="margin: auto">
                                        <img src="{{URL::to('/')}}/Assets/images/icons8-delete-48.png" class="icon-size" alt="">
                                    </a>


                                </td>
                        </tr>


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
