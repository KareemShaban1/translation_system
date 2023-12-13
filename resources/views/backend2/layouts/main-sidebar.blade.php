<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">

                    <!-- Dashboard -->
                    <li>
                        <a href="{{ route('dashboard') }}"><i class="ti-home"></i><span class="right-nav-text">لوحة التحكم
                            </span> </a>
                    </li>

                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">المستخدمين </li>
                    <!-- menu item Elements-->

                    <!-- Roles Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#roles">
                            <div class="pull-left"><i class="fas fa-fw fa-user"></i></i><span class="right-nav-text">

                                    Roles</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="roles" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('roles.create') }}">أضافة Role</a> </li>
                            <li> <a href="{{ route('roles.index') }}">كل Roles</a> </li>

                        </ul>
                    </li>


                    <!-- User Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#users">
                            <div class="pull-left"><i class="fas fa-fw fa-user"></i></i><span class="right-nav-text">
                                    أدارة
                                    المستخدمين</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="users" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('users.create') }}">أضافة مستخدم</a> </li>
                            <li> <a href="{{ route('users.index') }}">كل المستخدمين</a> </li>

                        </ul>
                    </li>

                    <!-- Service Providers Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#service_providers">
                            <div class="pull-left"><i class="fas fa-fw fa-users"></i><span class="right-nav-text">
                                    أدارة
                                    مقدمى الخدمات</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="service_providers" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('service_providers.create') }}">أضافة مقدم خدمة</a> </li>
                            <li> <a href="{{ route('service_providers.index') }}">كل مقدمى الخدمات</a> </li>

                        </ul>
                    </li>

                    <!-- Clients Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#clients">
                            <div class="pull-left"><i class="fas fa-fw fa-user"></i></i><span class="right-nav-text">
                                    أدارة
                                    العملاء</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="clients" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('clients.create') }}">أضافة عميل</a> </li>
                            <li> <a href="{{ route('clients.index') }}">كل العملاء</a> </li>

                        </ul>
                    </li>

                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">الخدمات </li>
                    <!-- menu item Elements-->


                    <!-- Languages Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#languages">
                            <div class="pull-left"><i class="fas fa-fw fa-cog"></i><span class="right-nav-text">
                                    أدارة
                                    اللغات</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="languages" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('languages.create') }}">أضافة لغة</a> </li>
                            <li> <a href="{{ route('languages.index') }}">كل اللغات</a> </li>

                        </ul>
                    </li>


                    <!-- Services Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#services">
                            <div class="pull-left"><i class="fas fa-fw fa-cog"></i><span class="right-nav-text">
                                    أدارة
                                    الخدمات</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="services" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('services.create') }}">أضافة خدمة</a> </li>
                            <li> <a href="{{ route('services.index') }}">كل الخدمات</a> </li>

                        </ul>
                    </li>


                    <!-- Expenses Type Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#expense_types">
                            <div class="pull-left"><i class="fas fa-fw fa-money-bill"></i><span class="right-nav-text">
                                    أدارة
                                    المصروفات</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="expense_types" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('expense_types.create') }}">أضافة مصروف</a> </li>
                            <li> <a href="{{ route('expense_types.index') }}">كل المصروفات</a> </li>

                        </ul>
                    </li>




                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">الماليات </li>
                    <!-- menu item Elements-->


                    <!-- Recive Cash Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#receive_cash">
                            <div class="pull-left"><i class="fas fa-fw fa-money-bill"></i><span
                                    class="right-nav-text">
                                    أدارة
                                    أستلام نقدية</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="receive_cash" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('receive_cash.create') }}">أضافة أستلام نقدية</a> </li>
                            <li> <a href="{{ route('receive_cash.index') }}">كل أستلامات نقدية</a> </li>
                            <li> <a href="{{ route('receive_cash.cashReceive') }}"> أستلامات النقدية الكاش</a> </li>
                            <li> <a href="{{ route('receive_cash.onlineReceive') }}"> أستلامات النقدية الأونلاين</a>
                            </li>
                            <li> <a href="{{ route('receive_cash.reports') }}">تقاير أستلامات نقدية</a> </li>

                        </ul>
                    </li>


                    <!-- Cash Out Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#cash_out">
                            <div class="pull-left"><i class="fas fa-fw fa-money-bill"></i><span
                                    class="right-nav-text">
                                    أدارة
                                    صرف نقدية</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="cash_out" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('cash_out.create') }}">أضافة صرف نقدية</a> </li>
                            <li> <a href="{{ route('cash_out.index') }}">كل صرف نقدية</a> </li>
                            <li> <a href="{{ route('cash_out.reports') }}">تقاير صرق نقدية</a> </li>

                        </ul>
                    </li>


                </ul>
                </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
