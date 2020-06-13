<html lang="ar" dir="rtl">
<!----------------------------------------- اول سكشن --------------------------------------->

<section id="home-admin" class="users-list-page">
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">

                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>

                <div class="sidebar-menu p-t-30">
                    <ul>

                        <li class="sidebar-dropdown">
                            <a href="#">
                                <span>ادراه المستخدمين</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="{{URL::to('admin/users/create')}} ">اضافة مستخدم
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{URL::to('admin/users')}}">قائمه المستخدمين</a>
                                    </li>

                                </ul>
                            </div>
                        </li>


                        <li class="sidebar-dropdown">
                            <a href="#">
                                <span>ادراه الاستبيانات</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="{{URL::to('admin/surveys/create')}} ">اضافة استبيان
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{URL::to('admin')}}">قائمه الاستبيانات</a>
                                    </li>

                                </ul>
                            </div>
                        </li>



                        <li>
                            <a href="{{URL::to('admin/groups')}}">
                                <span class="xn-text">الفصول التدريبيه</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{URL::to('admin/departments')}}">
                                <span class="xn-text">الاقسام</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{URL::to('admin/courses')}}">
                                <span class="xn-text">المقررات</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->

        </nav>
        <!-- sidebar-wrapper  -->

        <!-- page-content" -->
