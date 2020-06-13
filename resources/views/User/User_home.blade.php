@include('Admin.Layouts.header')

<html lang="ar" dir="rtl">
<!----------------------------------------- اول سكشن --------------------------------------->

<?php
    $user=\Illuminate\Support\Facades\Auth::user();
    $surveys=\App\Survey::where('start_date', '<=', \Carbon\Carbon::now())
        ->where('end_date', '>=', \Carbon\Carbon::now())->orderBy('id', 'DESC')->get();
?>
<section id="home-admin">
    <section id="trainee-survey">
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid with-nav">
                <div class="row trainee-survey w-100 p-t-20">
                    <button class="btn trainee-survey-btn mx-auto">  @if($user->type=='Student')  متدرب @elseif($user->type=='Teacher')  مدرب @endif</button>
                </div>

                <div class="row trainee-survey-list p-t-30">

                    @foreach($surveys as $survey)

                        <?php
                        $departments_id=unserialize($survey->departments);
                        $groups_id=unserialize($survey->groups);
                        $courses_id=unserialize($survey->courses);

                        $has_course=false;
                        foreach (unserialize($survey->courses) as $i){
                            $course=\App\Course::find($i);
                            if ($course->department_id == $user->department_id){
                                $has_course=true;
                            }

                        }


                        ?>


                        @if($has_course || in_array($user->group_id,$groups_id)  || in_array($user->department_id,$departments_id))

                            <?php
                                $types=unserialize($survey->types)
                            ?>

                            @if(($survey->types!='') ?in_array($user->type,$types):1)
                    <!--item-->
                    @if(\App\Vote::Where('user_id',$user->id)->Where('survey_id',$survey->id)->count()>0)
                    <div class="col-md-9 col-sm-12 survey-list-item mx-auto d-flex align-items-center bg-white h-60-px w-100 m-t-10 survey-done">
                        <h6 class="p-r-30 p-l-30"> {{$survey->title}} - {{$survey->target}}</h6>
                        <span>
                        <i class="far fa-check-square fa-2x"></i>
                    </span>

                    </div>
                        @else
                    <!--item-->
                    <div class="col-md-9 col-sm-12 survey-list-item mx-auto d-flex align-items-center bg-white h-60-px w-100 m-t-10 survey-not-done">
                        <h6 class="p-r-30 p-l-30"> {{$survey->title}} - {{$survey->target}}</h6>
                        <a href="{{URL::to('votes_Create/'.$survey->id)}}">بدء الان</a>

                    </div>
                        @endif


                        @endif


                    @endif

                        @endforeach

                </div>

                <!--            pagination-->
            </div>


        </main>
        <!-- page-content" -->
    </section>
</section>

@include('Admin.Layouts.footer')

