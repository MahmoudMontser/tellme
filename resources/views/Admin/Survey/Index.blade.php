@include('Admin.Layouts.header')
<html lang="ar" dir="rtl" >
<!----------------------------------------- اول سكشن --------------------------------------->

<section id="home-admin" class="users-list-page">
    <!----------------------------------------- اول سكشن --------------------------------------->
    <section id="questions">
        <div class="container-fluid ">
            <div class="row question-header text-center p-t-30 p-b-30">
                <h3 class="mx-auto">نتيجة استطلاع رأي الخريج في ادارة الجامعه</h3>
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
    <span class="percent">

                                         @if(count(\App\Vote::where('question_id',$question->id)->where('vote','ممتاز')->groupBy('user_id')->get())>0)



            {{(count(\App\Vote::where('question_id',$question->id)->where('vote','ممتاز')->groupBy('user_id')->get())/count(\App\Vote::where('question_id',$question->id)->groupBy('user_id')->get()))*100}}

        @else
            0
        @endif


                                            %</span>

                                        <span class="option">ممتاز</span>
                                    </p>
                                    <p>
                                                                               <span class="percent">

                                         @if(count(\App\Vote::where('question_id',$question->id)->where('vote','جيد جدا')->groupBy('user_id')->get())>0)

                                                                                       {{(count(\App\Vote::where('question_id',$question->id)->where('vote','جيد جدا')->groupBy('user_id')->get())/count(\App\Vote::where('question_id',$question->id)->groupBy('user_id')->get()))*100}}

                                                                                   @else
                                                                                       0
                                                                                   @endif


                                            %</span>

                                        <span class="option">جيد جدا</span>
                                    </p>
                                    <p>
                                                                                                                       <span class="percent">

                                         @if(count(\App\Vote::where('question_id',$question->id)->where('vote','جيد')->groupBy('user_id')->get())>0)

                                                                                                                               {{(count(\App\Vote::where('question_id',$question->id)->where('vote','جيد')->groupBy('user_id')->get())/count(\App\Vote::where('question_id',$question->id)->groupBy('user_id')->get()))*100}}

                                                                                                                           @else
                                                                                                                               0
                                                                                                                           @endif


                                            %</span>

                                        <span class="option">جيد</span>
                                    </p>
                                    <p>
                                                                                                                                                              <span class="percent">

                                         @if(count(\App\Vote::where('question_id',$question->id)->where('vote','ضعيف')->groupBy('user_id')->get())>0)



                                                                                                                                                                      {{(count(\App\Vote::where('question_id',$question->id)->where('vote','ضعيف')->groupBy('user_id')->get())/count(\App\Vote::where('question_id',$question->id)->groupBy('user_id')->get()))*100}}

                                                                                                                                                                  @else
                                                                                                                                                                      0
                                                                                                                                                                  @endif


                                            %</span>

                                        <span class="option">ضعيف</span>

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
                                        <span class="percent">

                                         @if(count(\App\Vote::where('question_id',$question->id)->where('vote','نعم')->groupBy('user_id')->get())>0)

                                        {{(count(\App\Vote::where('question_id',$question->id)->where('vote','نعم')->groupBy('user_id')->get())/count(\App\Vote::where('question_id',$question->id)->groupBy('user_id')->get()))*100}}


                                             @else
                                             0
                                        @endif


                                            %</span>
                                        <span class="option">نعم</span>
                                    </p>
                                    <p>
                                       <span class="percent">

                                         @if(count(\App\Vote::where('question_id',$question->id)->where('vote','لا')->groupBy('user_id')->get())>0)

                                               {{(count(\App\Vote::where('question_id',$question->id)->where('vote','لا')->groupBy('user_id')->get())/count(\App\Vote::where('question_id',$question->id)->groupBy('user_id')->get()))*100}}

                                           @else
                                               0
                                           @endif


                                            %</span>
                                        <span class="option">لا </span>
                                    </p>
                                </div>

                            </div>

                        @elseif($question->answer_type=='Approval')

                            <div class="col-md-9 col-sm-11 bg-white p-1 mx-auto question-item m-1">
                                <h6 class="w-75 p-t-30 p-b-10 p-r-20">{{$question->question}}</h6>
                                <span class="required">*</span>
                                <div class="select-options mx-auto p-b-20">

                                    <p>
                                       <span class="percent">

                                         @if(count(\App\Vote::where('question_id',$question->id)->where('vote','اوافق')->groupBy('user_id')->get())>0)

                                               {{(count(\App\Vote::where('question_id',$question->id)->where('vote','اوافق')->groupBy('user_id')->get())/count(\App\Vote::where('question_id',$question->id)->groupBy('user_id')->get()))*100}}

                                           @else
                                               0
                                           @endif


                                            %</span>
                                        <span class="option">اوافق</span>
                                    </p>
                                    <p>
                                       <span class="percent">

                                         @if(count(\App\Vote::where('question_id',$question->id)->where('vote','لا اوافق')->groupBy('user_id')->get())>0)

                                               {{(count(\App\Vote::where('question_id',$question->id)->where('vote','لا اوافق')->groupBy('user_id')->get())/count(\App\Vote::where('question_id',$question->id)->groupBy('user_id')->get()))*100}}

                                           @else
                                               0
                                           @endif


                                            %</span>
                                        <span class="option">لا اوافق </span>
                                    </p>
                                    <p>
                                       <span class="percent">

                                         @if(count(\App\Vote::where('question_id',$question->id)->where('vote','ربما')->groupBy('user_id')->get())>0)

                                               {{(count(\App\Vote::where('question_id',$question->id)->where('vote','ربما')->groupBy('user_id')->get())/count(\App\Vote::where('question_id',$question->id)->groupBy('user_id')->get()))*100}}

                                           @else
                                               0
                                           @endif


                                            %</span>
                                        <span class="option">ربما</span>

                                    </p>
                                </div>
                            </div>


                        @else


                            <div class="col-md-9 col-sm-11 bg-white p-1 mx-auto question-item m-1">
                                <h6 class="w-75 p-t-30 p-b-10 p-r-20">{{$question->question}}</h6>
                                <span class="required">*</span>
                                @foreach(\App\Vote::where('question_id',$question->id)->get() as $vote)
                                <input class="input100" disabled type="text" value="{{$vote->vote}}" placeholder="ادخل اجابتك">
                                    <span class="focus-input100"></span>

                                @endforeach
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
    <span class="percent">

                                         @if(count(\App\Vote::where('question_id',$question->id)->where('vote','ممتاز')->groupBy('user_id')->get())>0)



            {{(count(\App\Vote::where('question_id',$question->id)->where('vote','ممتاز')->groupBy('user_id')->get())/count(\App\Vote::where('question_id',$question->id)->groupBy('user_id')->get()))*100}}

        @else
            0
        @endif


                                            %</span>

                                        <span class="option">ممتاز</span>
                                    </p>
                                    <p>
                                                                               <span class="percent">

                                         @if(count(\App\Vote::where('question_id',$question->id)->where('vote','جيد جدا')->groupBy('user_id')->get())>0)

                                                                                       {{(count(\App\Vote::where('question_id',$question->id)->where('vote','جيد جدا')->groupBy('user_id')->get())/count(\App\Vote::where('question_id',$question->id)->groupBy('user_id')->get()))*100}}

                                                                                   @else
                                                                                       0
                                                                                   @endif


                                            %</span>

                                        <span class="option">جيد جدا</span>
                                    </p>
                                    <p>
                                                                                                                       <span class="percent">

                                         @if(count(\App\Vote::where('question_id',$question->id)->where('vote','جيد')->groupBy('user_id')->get())>0)

                                                                                                                               {{(count(\App\Vote::where('question_id',$question->id)->where('vote','جيد')->groupBy('user_id')->get())/count(\App\Vote::where('question_id',$question->id)->groupBy('user_id')->get()))*100}}

                                                                                                                           @else
                                                                                                                               0
                                                                                                                           @endif


                                            %</span>

                                        <span class="option">جيد</span>
                                    </p>
                                    <p>
                                                                                                                                                              <span class="percent">

                                         @if(count(\App\Vote::where('question_id',$question->id)->where('vote','ضعيف')->groupBy('user_id')->get())>0)



                                                                                                                                                                      {{(count(\App\Vote::where('question_id',$question->id)->where('vote','ضعيف')->groupBy('user_id')->get())/count(\App\Vote::where('question_id',$question->id)->groupBy('user_id')->get()))*100}}

                                                                                                                                                                  @else
                                                                                                                                                                      0
                                                                                                                                                                  @endif


                                            %</span>

                                        <span class="option">ضعيف</span>

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
                                        <span class="percent">

                                         @if(count(\App\Vote::where('question_id',$question->id)->where('vote','نعم')->groupBy('user_id')->get())>0)

                                                {{(count(\App\Vote::where('question_id',$question->id)->where('vote','نعم')->groupBy('user_id')->get())/count(\App\Vote::where('question_id',$question->id)->groupBy('user_id')->get()))*100}}


                                            @else
                                                0
                                            @endif


                                            %</span>
                                        <span class="option">نعم</span>
                                    </p>
                                    <p>
                                       <span class="percent">

                                         @if(count(\App\Vote::where('question_id',$question->id)->where('vote','لا')->groupBy('user_id')->get())>0)

                                               {{(count(\App\Vote::where('question_id',$question->id)->where('vote','لا')->groupBy('user_id')->get())/count(\App\Vote::where('question_id',$question->id)->groupBy('user_id')->get()))*100}}

                                           @else
                                               0
                                           @endif


                                            %</span>
                                        <span class="option">لا </span>
                                    </p>
                                </div>

                            </div>

                        @elseif($question->answer_type=='Approval')

                            <div class="col-md-9 col-sm-11 bg-white p-1 mx-auto question-item m-1">
                                <h6 class="w-75 p-t-30 p-b-10 p-r-20">{{$question->question}}</h6>
                                <span class="required">*</span>
                                <div class="select-options mx-auto p-b-20">

                                    <p>
                                       <span class="percent">

                                         @if(count(\App\Vote::where('question_id',$question->id)->where('vote','اوافق')->groupBy('user_id')->get())>0)

                                               {{(count(\App\Vote::where('question_id',$question->id)->where('vote','اوافق')->groupBy('user_id')->get())/count(\App\Vote::where('question_id',$question->id)->groupBy('user_id')->get()))*100}}

                                           @else
                                               0
                                           @endif


                                            %</span>
                                        <span class="option">اوافق</span>
                                    </p>
                                    <p>
                                       <span class="percent">

                                         @if(count(\App\Vote::where('question_id',$question->id)->where('vote','لا اوافق')->groupBy('user_id')->get())>0)

                                               {{(count(\App\Vote::where('question_id',$question->id)->where('vote','لا اوافق')->groupBy('user_id')->get())/count(\App\Vote::where('question_id',$question->id)->groupBy('user_id')->get()))*100}}

                                           @else
                                               0
                                           @endif


                                            %</span>
                                        <span class="option">لا اوافق </span>
                                    </p>
                                    <p>
                                       <span class="percent">

                                         @if(count(\App\Vote::where('question_id',$question->id)->where('vote','ربما')->groupBy('user_id')->get())>0)

                                               {{(count(\App\Vote::where('question_id',$question->id)->where('vote','ربما')->groupBy('user_id')->get())/count(\App\Vote::where('question_id',$question->id)->groupBy('user_id')->get()))*100}}

                                           @else
                                               0
                                           @endif


                                            %</span>
                                        <span class="option">ربما</span>

                                    </p>
                                </div>
                            </div>


                        @else


                            <div class="col-md-9 col-sm-11 bg-white p-1 mx-auto question-item m-1">
                                <h6 class="w-75 p-t-30 p-b-10 p-r-20">{{$question->question}}</h6>
                                <span class="required">*</span>
                                @foreach(\App\Vote::where('question_id',$question->id)->get() as $vote)
                                    <input class="input100" disabled type="text" value="{{$vote->vote}}" placeholder="ادخل اجابتك">
                                    <span class="focus-input100"></span>

                                @endforeach
                            </div>


                        @endif

                    @endforeach
                </div>





            </div>


            <div class="row d-flex p-l-30 justify-content-end p-b-30">
                <a class="btn-first-color btn" href="{{url()->previous()}}"> عودة</a>
            </div>


        </div>
    </section>

@include('Admin.Layouts.footer')
