
@include('Admin.Layouts.header')

<html lang="ar" dir="rtl">
<!----------------------------------------- اول سكشن --------------------------------------->




<form  action="{{URL::to('/votes_Create/'.$survey->id)}}" method="post" enctype="multipart/form-data">
<section id="questions">

        {{csrf_field()}}
    <div class="container-fluid">
        <div class="row question-header text-center p-t-30 p-b-30">
            <h3 class="mx-auto">استطلاع رأي الخريج في ادارة الجامعه</h3>
        </div>
        <div class="row question-body">

            <?php
            $Questions=\App\Question::where('survey_id',$survey->id);
            ?>
                <div class="col-md-6 col-sm-12 row col-border">


            @foreach($Questions->skip(0)->take(round($survey->Questions->count()/2))->get() as $question )

                @if($question->answer_type=='Estimates')
                    <div class="col-md-9 col-sm-11 bg-white p-1 mx-auto question-item m-1">
                        <h6 class="w-75 p-t-30 p-b-10 p-r-20">{{$question->question}}</h6>
                        <span class="required">*</span>
                        <div  class="select-options mx-auto p-b-20">
                        <p>
                            <input type="radio" id="vote_{{$question->id}}_1" value="ممتاز" name="vote[{{$question->id}}]" checked>
                            <label for="vote_{{$question->id}}_1">ممتاز</label>
                        </p>
                        <p>
                            <input type="radio" id="vote_{{$question->id}}_2" value="جيد جدا" name="vote[{{$question->id}}]" checked>
                            <label for="vote_{{$question->id}}_2">جيد جدا</label>
                        </p>
                        <p>
                            <input type="radio" id="vote_{{$question->id}}_3" value="جيد" name="vote[{{$question->id}}]">
                            <label for="vote_{{$question->id}}_3">جيد</label>
                        </p>
                        <p>
                            <input type="radio" id="vote_{{$question->id}}_4" value="ضعيف" name="vote[{{$question->id}}]">
                            <label for="vote_{{$question->id}}_4">ضعيف</label>

                        </p>
                        </div>
                    </div>
                @elseif($question->answer_type=='Confirmation')



                    <div class="col-md-9 col-sm-11 bg-white p-1 mx-auto question-item m-1">
                        <h6 class="w-75 p-t-30 p-b-10 p-r-20">
                            {{$question->question}}</h6>
                        <span class="required">*</span>
                        <div  class="select-options mx-auto p-b-20">
                            <p>
                                <input type="radio" id="vote_{{$question->id}}_5" value="نعم" name="vote[{{$question->id}}]" checked>
                                <label for="vote_{{$question->id}}_5">نعم</label>
                            </p>
                            <p>
                                <input type="radio" id="vote_{{$question->id}}_6" value="لا " name="vote[{{$question->id}}]">
                                <label for="vote_{{$question->id}}_6">لا </label>
                            </p>
                        </div>

                    </div>

                @elseif($question->answer_type=='Approval')

                    <div class="col-md-9 col-sm-11 bg-white p-1 mx-auto question-item m-1">
                        <h6 class="w-75 p-t-30 p-b-10 p-r-20">{{$question->question}}</h6>
                        <span class="required">*</span>
                        <div class="select-options mx-auto p-b-20">

                        <p>
                                <input type="radio" id="vote_{{$question->id}}_7" value="اوافق" name="vote[{{$question->id}}]" checked>
                                <label for="vote_{{$question->id}}_7">اوافق</label>
                            </p>
                            <p>
                                <input type="radio" id="vote_{{$question->id}}_8" value="لا اوافق " name="vote[{{$question->id}}]">
                                <label for="vote_{{$question->id}}_8">لا اوافق </label>
                            </p>
                            <p>
                                <input type="radio" id="vote_{{$question->id}}_9" value="ربما" name="vote[{{$question->id}}]">
                                <label for="vote_{{$question->id}}_9">ربما</label>

                            </p>
                        </div>
                    </div>


                @else


                        <div class="col-md-9 col-sm-11 bg-white p-1 mx-auto question-item m-1">
                            <h6 class="w-75 p-t-30 p-b-10 p-r-20">{{$question->question}}</h6>
                            <span class="required">*</span>
                                <input class="input100" type="text" name="vote[{{$question->id}}]" placeholder="ادخل اجابتك">
                                <span class="focus-input100"></span>
                        </div>


                @endif


                @endforeach
                </div>




                <div class="col-md-6 col-sm-12 row">


                    @foreach($Questions->skip(round($survey->Questions->count()/2))->take($survey->Questions->count()-round($survey->Questions->count()/2))->get() as $question )

                        @if($question->answer_type=='Estimates')
                            <div class="col-md-9 col-sm-11 bg-white p-1 mx-auto question-item m-1">
                                <h6 class="w-75 p-t-30 p-b-10 p-r-20">{{$question->question}}</h6>
                                <span class="required">*</span>
                                <div  class="select-options mx-auto p-b-20">
                                    <p>
                                        <input type="radio" id="vote_{{$question->id}}_1" value="ممتاز" name="vote[{{$question->id}}]" checked>
                                        <label for="vote_{{$question->id}}_1">ممتاز</label>
                                    </p>
                                    <p>
                                        <input type="radio" id="vote_{{$question->id}}_2" value="جيد جدا" name="vote[{{$question->id}}]" checked>
                                        <label for="vote_{{$question->id}}_2">جيد جدا</label>
                                    </p>
                                    <p>
                                        <input type="radio" id="vote_{{$question->id}}_3" value="جيد" name="vote[{{$question->id}}]">
                                        <label for="vote_{{$question->id}}_3">جيد</label>
                                    </p>
                                    <p>
                                        <input type="radio" id="vote_{{$question->id}}_4" value="ضعيف" name="vote[{{$question->id}}]">
                                        <label for="vote_{{$question->id}}_4">ضعيف</label>

                                    </p>
                                </div>
                            </div>
                        @elseif($question->answer_type=='Confirmation')



                            <div class="col-md-9 col-sm-11 bg-white p-1 mx-auto question-item m-1">
                                <h6 class="w-75 p-t-30 p-b-10 p-r-20">
                                    {{$question->question}}</h6>
                                <span class="required">*</span>
                                <div  class="select-options mx-auto p-b-20">
                                    <p>
                                        <input type="radio" id="vote_{{$question->id}}_5" value="نعم" name="vote[{{$question->id}}]" checked>
                                        <label for="vote_{{$question->id}}_5">نعم</label>
                                    </p>
                                    <p>
                                        <input type="radio" id="vote_{{$question->id}}_6" value="لا " name="vote[{{$question->id}}]">
                                        <label for="vote_{{$question->id}}_6">لا </label>
                                    </p>
                                </div>

                            </div>

                        @elseif($question->answer_type=='Approval')

                            <div class="col-md-9 col-sm-11 bg-white p-1 mx-auto question-item m-1">
                                <h6 class="w-75 p-t-30 p-b-10 p-r-20">{{$question->question}}</h6>
                                <span class="required">*</span>
                                <div  class="select-options mx-auto p-b-20">

                                    <p>
                                        <input type="radio" id="vote_{{$question->id}}_7" value="اوافق" name="vote[{{$question->id}}]" checked>
                                        <label for="vote_{{$question->id}}_7">اوافق</label>
                                    </p>
                                    <p>
                                        <input type="radio" id="vote_{{$question->id}}_8" value="لا اوافق " name="vote[{{$question->id}}]">
                                        <label for="vote_{{$question->id}}_8">لا اوافق </label>
                                    </p>
                                    <p>
                                        <input type="radio" id="vote_{{$question->id}}_9" value="ربما" name="vote[{{$question->id}}]">
                                        <label for="vote_{{$question->id}}_9">ربما</label>

                                    </p>
                                </div>
                            </div>


                        @else


                            <div class="col-md-9 col-sm-11 bg-white p-1 mx-auto question-item m-1">
                                <h6 class="w-75 p-t-30 p-b-10 p-r-20">{{$question->question}}</h6>
                                <span class="required">*</span>
                                <input class="input100" type="text" name="vote[{{$question->id}}]" placeholder="ادخل اجابتك">
                                <span class="focus-input100"></span>
                            </div>


                        @endif


                    @endforeach
                </div>





        </div>

        <div class="row d-flex p-l-30 justify-content-end p-b-30">
            <button class="btn-first-color btn"> ارسال</button>
        </div>


    </div>
</section>
</form>
@include('Admin.Layouts.footer')
