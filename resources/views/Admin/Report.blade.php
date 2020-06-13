@include('Admin.Layouts.header')


<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{URL::to('/admin')}}">الرئيسية</a></li>
    <li class="active">تقرير المهام</li>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2>تقرير المهام</h2>
</div>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <?php
    $Users = \App\User::orderBy('id', 'desc')->get();
    ?>

    <div class="row">
        <div class="col-md-12">



            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5>
                       التقارير
                    </h5>
                </div>
                <div class="panel-body">
                    <form action="{{URL::to('/admin/report')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group" @if(\Illuminate\Support\Facades\Auth::user()->type!="Admin")   hidden @endif>

                            <label class="col-md-2 control-label @if($errors->has('employee_id')) text-danger @endif">الموظف</label>
                            <div class="col-md-9">

                                <select class="form-control col-md-3  "   name="employee_id" data-live-search="true"  id="type">

                                    <option value="">كل الموظفين</option>
                                    @if(\Illuminate\Support\Facades\Auth::user()->type=="Admin")

                                    @foreach($Users as $User)
                                        <option value="{{$User->id}}" @if(old('employee_id')==$User->id) selected @endif  >{{$User->name}}</option>
                                    @endforeach
                                        @else
                                        <option value="{{\Illuminate\Support\Facades\Auth::id()}}"  selected    >{{\Illuminate\Support\Facades\Auth::user()->name}}</option>

                                    @endif
                                </select>
                                @if($errors->has('employee_id'))
                                    <div class="col-sm-3">
                                        <small id="passwordHelp" class="text-danger">
                                            {{$errors->first('employee_id')}}
                                        </small>
                                    </div>
                                @endif
                            </div>

                        </div>


                        <div class="form-group">

                            <label class="col-md-2 control-label @if($errors->has('type')) text-danger @endif">حالة المهمة</label>
                            <div class="col-md-9">

                                <select class="form-control col-md-3  "  name="type" data-live-search="true"  id="type">
                                    <option value="">كل الحالات</option>
                                    <option value="Done" @if(old('type')=='Done' ) selected @endif  >مكتملة</option>
                                    <option value="NotDone" @if(old('type')=='NotDone' ) selected @endif>غير مكنملة</option>
                                    <option value="Expired" @if(old('type')=='Expired' ) selected @endif>متاخرة</option>
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




                        <?php
                        $Places=\App\Place::orderBy('id', 'desc')->get();
                        ?>
                        <div class="form-group">

                            <label class="col-md-2 control-label @if($errors->has('place_id')) text-danger @endif">الجهة</label>
                            <div class="col-md-9">

                                <select class="form-control col-md-3  "  name="place_id" data-live-search="true"  id="type">

                                    <option value="">كل الجهات</option>
                                    @foreach($Places as $Place)
                                        <option value="{{$Place->id}}" @if(old('place_id')==$Place->id) selected @endif  >{{$Place->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('place_id'))
                                    <div class="col-sm-3">
                                        <small id="passwordHelp" class="text-danger">
                                            {{$errors->first('place_id')}}
                                        </small>
                                    </div>
                                @endif
                            </div>

                        </div>




                        <div class="form-group ">

                                    <label class="col-md-2 control-label @if($errors->has('city')) text-danger @endif">التاريخ</label>
                                    <div class="col-md-10" style="width: 30%">
                                        <?php
                                        $samples_categories=\App\SamplesCategory::orderBy('id', 'desc')->get();
                                        ?>

                                            <div class="input-group">
                                                <input type="text" name="date_from" class="form-control datepicker" value="2020-01-01">
                                                <span class="input-group-addon add-on"> - </span>
                                                <input type="text" name="date_to" class="form-control datepicker" value="2020-06-05">
                                            </div>
                                            </div>

                                        @if($errors->has('date_from'))
                                            <div class="col-sm-3">
                                                <small id="passwordHelp" class="text-danger">
                                                    {{$errors->first('date_from')}}
                                                </small>
                                            </div>
                                        @endif
                            @if($errors->has('date_to'))
                                <div class="col-sm-3">
                                    <small id="passwordHelp" class="text-danger">
                                        {{$errors->first('date_to')}}
                                    </small>
                                </div>
                            @endif

                                </div>





                        <button class="btn btn-primary pull-right " type="submit">إستعلام <span class="fa fa-floppy-o fa-right"></span></button>

                            </div>



                        </div>


                    </form>





                </div>
            </div>

        @if(isset($Tasks))






            <table border="1" cellpadding="3"  class="text-center"  id="printTable" style="display: none ; width:100%">
                        <thead>

                <tr style="text-align: center">


                    <td colspan = '1'>بيانات السيارة</td>







                    <td rowspan="2">الموظف المسؤول</td>
                    <td rowspan="2">الحالة</td>
                    <td rowspan="2">تاريخ الانشاء</td>
                    <td rowspan="2">تاريخ الاستحقاق</td>
                    <td rowspan="2">الهاتف</td>
                    <td rowspan="2">العينات</td>
                    <td rowspan="2">اسم الجهة</td>
                    <td rowspan="2">الكود</td>

                </tr>
                <tr class = "meta">







                    <th>رقم الوحة</th>




                </tr>

{{--                        <tr>--}}
{{--                            <th>الكود</th>--}}
{{--                            <th>اسم الجهة</th>--}}
{{--                            <th>االعينة</th>--}}
{{--                            <th>الهاتف</th>--}}
{{--                            <th>تاريخ الاستحقاق</th>--}}
{{--                            <th>الموظف المسؤول</th>--}}
{{--                            <th>الحالة</th>--}}
{{--                            <th>تاريخ الانشاء</th>--}}



{{--                            <th>رقم السيارة</th>--}}
{{--                            <th>نوع السيارة</th>--}}
{{--                            <th>الدلال</th>--}}
{{--                            <th>المسار</th>--}}
{{--                            <th>المبيد </th>--}}
{{--                            <th>CONC </th>--}}
{{--                            <th>MRL  </th>--}}
{{--                        </tr>--}}
                        </thead>
                <tbody style="text-align: right">

                        @foreach($Tasks as $Task)
                            <tr id="row_{{ $Task->id }}">


                                @if($Task->Status=='Done')
                                    <?php
                                    $Report=\App\Report::where('task_id',$Task->id)->first();
                                    ?>





                                        <td>{{$Report->car_id}}</td>






                                @else
                                    <td></td>

                                @endif

                                    <td>{{\App\User::find($Task->employee_id)->name}}</td>
                                    <td>

                                        @if($Task->Status=='Done')
                                            <span for="" style="background-color: greenyellow;" >تم الانجاز</span>
                                        @elseif($Task->Status=='NotDone')
                                            <span for="" style="background-color: yellow" >تحت التنفيذ </span>
                                        @else
                                            <span for="" style="background-color: red" >متأخر </span>
                                        @endif
                                    </td>
                                    <td>{{$Task->created_at}}</td>
                                    <td>{{$Task->due_time}}</td>
                                    <td>@if($Task->phone !='') {{$Task->phone}} @endif</td>
                                    <?php
                                    $samples=\App\Sample::whereIn('id',unserialize($Task->samples))->get();
                                    ?>
                                    <td>
                                    @foreach($samples as $sample)
                                        {{$sample->name}}
                                    @endforeach
                                    </td>
                                    <td>{{\App\Place::find($Task->place_id)->name}}</td>
                                <td>{{$Task->code}}</td>









                            </tr>
                        @endforeach
                        </tbody>
                    </table>




            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading" style="direction: ltr">
                    <ul class="panel-controls">
                        <li> <button id="print_table" class="btn btn-warning"><i class="fa fa-print "></i></button></li>
                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>

                    </ul>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th>الكود</th>
                                <th>اسم الجهة</th>
                                <th>الهاتف</th>
                                <th>العنوان</th>
                                <th>ملاحظات</th>
                                <th>تاريخ الاستحقاق</th>
                                <th>المشرف</th>
                                <th>الموظف المسؤول</th>
                                <th>الحالة</th>
                                <th>تاريخ الانشاء</th>
                                <th>الادوات</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($Tasks as $Task)




                                <tr id="row_{{ $Task->id }}">
                                    <td>{{$Task->code}}</td>
                                    <td>{{\App\Place::find($Task->place_id)->name}}</td>
                                    <td>@if($Task->phone !='') {{$Task->phone}} @endif</td>
                                    <td>{{$Task->address}}</td>
                                    <td>{{$Task->civil_registry}}</td>
                                    <td>{{$Task->due_time}}</td>
                                    <td>{{\App\User::find($Task->user_id)->name}}</td>
                                    <td>{{\App\User::find($Task->employee_id)->name}}</td>
                                    <td>

                                        @if($Task->Status=='Done')
                                            <span for="" style="background-color: greenyellow;" >تم الانجاز</span>
                                        @elseif($Task->Status=='NotDone')
                                            <span for="" style="background-color: yellow" >تحت التنفيذ </span>
                                        @else
                                            <span for="" style="background-color: red" >متأخر </span>
                                        @endif
                                    </td>
                                    <td>{{$Task->created_at}}</td>

                                    <td>
                                        <a href="{{ URL::to('admin/tasks/'.$Task->id.'/edit') }}"
                                           class="btn bg-light-green waves-effect" data-toggle="tooltip"
                                           data-placement="top" title="تعديل" style="margin: auto">
                                            <i class="fa fa-cog"></i>
                                        </a>

                                        @if(\Illuminate\Support\Facades\Auth::id() =='1')
                                            <button onclick="showConfirmMessage('{{ URL::to('admin/tasks/'.$Task->id.'/delete') }}')"
                                                    class="btn btn-danger btn-condensed waves-effect btn-sm"
                                                    data-toggle="tooltip"
                                                    data-placement="top" title="حذف " style="margin: auto">
                                                <i class="fa fa-trash-o"></i>

                                            </button>
                                        @endif



                                        @if($Task->Status=='Done')
                                            <button type="button"  title="عرض تقرير المهمة" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Report{{$Task->id}}">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        @endif

                                    </td>
                                </tr>




                                @if(\App\Report::where('task_id',$Task->id)->count()>0)
                                    <div class="modal fade" id="Report{{$Task->id}}" tabindex="-1" role="dialog">
                                        <div class="modal-dialog " role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="smallModalLabel">عرض تقرير المهمة</h4>
                                                    <small><b>كود المهمة :</b> {{$Task->code}}</small>
                                                </div>
                                                <?php
                                                $Report=\App\Report::where('task_id',$Task->id)->first();
                                                ?>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="col-sm-8 col-xs-8">
                                                                <div class="input-group">
                                                                                      <span >
                                                                                     الرقم   :
                                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="text"  value="{{$Report->car_id}}" class="form-control @if($errors->has('car_id'))  is-invalid @endif" name="car_id" disabled/>

                                                                        <img src="{{asset('storage/app/Images/Report/Images/' . $Report->id . '/'.$Report->image)}}" alt="{{$Report->name}}" style="width: 100px;height: 100px">

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="col-md-6">
                                                            <?php
                                                            $samples=\App\Sample::whereIn('id',unserialize($Task->samples))->get();
                                                            ?>
                                                            <div class="col-sm-8 col-xs-8">
                                                                <div class="input-group">
                                                                                    <span >
                                                                                     العينات  :
                                                                                    </span>
                                                                    <div class="form-line">
                                                                        @foreach($samples as $sample)
                                                                            <input type="text"  value="{{$sample->name}}" class="form-control @if($errors->has('car_id'))  is-invalid @endif" name="sample_name" disabled/>
                                                                            <br>
                                                                            <br>
                                                                            <br>

                                                                        @endforeach

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="clearfix"></div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn bg-blue-grey " data-dismiss="modal">غلق</button>
                                                </div>
                                            </div>
                                        </div>

                                        </form>
                                    </div>
                                @endif



                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END DEFAULT DATATABLE -->
            @endif









        </div>




    </div>







</div>
<!-- PAGE CONTENT WRAPPER -->




@include('Admin.Layouts.footer')
