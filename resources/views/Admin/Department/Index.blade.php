
@include('Admin.Layouts.header')

<html lang="ar" dir="rtl">
<!----------------------------------------- اول سكشن --------------------------------------->

<section id="home-admin" class="users-list-page">

    <!-- sidebar-wrapper  -->
    <main class="page-content">
        <div class="container-fluid with-nav">
            <div class="row create-new">
                <div class="col-12">
                    <span class="login-rounded">
                        <img src="{{URL::to('/')}}/Assets/images/icons8-login-rounded-50.png" alt="">
                    </span>
                    <h6 class="p-1 d-inline-block">انشاء قسم جديد</h6>
                </div>
            </div>

            <div class="row">


                <form class="col-md-12 col-sm-12 mx-auto row" action="{{URL::to('/admin/departments')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                    <!-- ********* input ***************************-->

                    <div class="form-group col-md-3 col-sm-12 row mx-auto">
                        <label for="inputType" class="col-sm-3 col-form-label"  @if($errors->has('name')) text-danger @endif>اسم القسم</label>
                        <div class="d-inline-block col-sm-9 mx-auto">
                            <input type="text"  value="{{old('name')}}" class="form-control @if($errors->has('name'))  is-invalid @endif" name="name"/>
                            @if($errors->has('name'))
                                <div class="col-sm-3">
                                    <small id="passwordHelp" class="text-danger">
                                        {{$errors->first('name')}}
                                    </small>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-md-1 col-sm-5 mx-auto">

                        <input type="submit" class="form-control btn btn-first-color" value="انشاء">

                    </div>


                </form>

            </div>
            <hr>
            <div class="row create-new">
                <div class="col-12">
                    <span class="login-rounded">
                        <img src="{{URL::to('/')}}/Assets/images/icons8-login-rounded-50.png" alt="">
                    </span>
                    <h6 class="p-1 d-inline-block">قائمة الاقسام</h6>
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
                            <th scope="col">اسم القسم </th>
                            <th scope="col">عدد المتدربين</th>
                            <th scope="col">تعديل</th>
                            <th scope="col">حذف</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $Departments=\App\Department::all();
                        ?>
                        @foreach($Departments as $Department)
                        <tr id="row_{{ $Department->id }}">
                            <td>{{$Department->name}}</td>
                            <td><a href="">{{\App\User::where('department_id',$Department->id)->where('type','Student')->count()}}</a></td>
                            <td>

                                <a   data-toggle="modal" data-target="#Update{{$Department->id}}" style="color:#007bff">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            </td>
                            <td>
                                <a onclick="showConfirmMessage('{{URL::to('admin/departments/'.$Department->id.'/delete')}}')"
                                        data-toggle="tooltip"
                                        data-placement="top" title="حذف " style="margin: auto">
                                    <img src="{{URL::to('/')}}/Assets/images/icons8-delete-48.png" class="icon-size" alt="">
                                </a>


                            </td>
                        </tr>





                        <div class="modal fade" id="Update{{$Department->id}}" tabindex="-1" role="dialog">
                            <form action="{{URL::to('/admin/departments/'.$Department->id.'/update')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="modal-dialog " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="smallModalLabel">تعديل القسم</h4>
                                            <small><b>القسم :</b> {{$Department->name}}</small>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-8 col-xs-8">
                                                    <div class="input-group">
                                                                                    <span class="input-group-addon">
                                                                                     اسم القسم  :
                                                                                    </span>
                                                        <div class="form-line">

                                                            <input type="text"  value="{{$Department->name}}" class="form-control @if($errors->has('name'))  is-invalid @endif" name="name"/>

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



{{--            <div class="row pagination-div p-t-30">--}}
{{--                <nav aria-label="Page navigation" class="mx-auto">--}}
{{--                    <ul class="pagination">--}}
{{--                        <li class="page-item">--}}
{{--                            <a class="page-link" href="#" aria-label="Previous">--}}
{{--                                <span aria-hidden="true">&laquo;</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                        <li class="page-item">--}}
{{--                            <a class="page-link" href="#" aria-label="Next">--}}
{{--                                <span aria-hidden="true">&raquo;</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </nav>--}}

{{--            </div>--}}

        </div>


    </main>
    <!-- page-content" -->
    </div>
</section>
@include('Admin.Layouts.footer')
