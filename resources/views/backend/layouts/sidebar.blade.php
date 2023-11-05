 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3"> لوحة التحكم</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="{{ route('dashboard') }}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>لوحة التحكم</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         أدارة المستخدمين
     </div>

     <!-- Users -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users" aria-expanded="true"
             aria-controls="users">
             <i class="fas fa-fw fa-user"></i>
             <span>المستخدمين</span>
         </a>
         <div id="users" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                 <a class="collapse-item" href="{{ route('users.create') }}">أضافة مستخدم</a>
                 <a class="collapse-item" href="{{ route('users.index') }}">كل المستخدمين</a>
             </div>
         </div>
     </li>

     <!-- Roles -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#roles" aria-expanded="true"
             aria-controls="roles">
             <i class="fas fa-fw fa-user"></i>
             <span>Roles</span>
         </a>
         <div id="roles" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                 <a class="collapse-item" href="{{ route('roles.create') }}">أضافة Role</a>
                 <a class="collapse-item" href="{{ route('roles.index') }}">كل Roles</a>
             </div>
         </div>
     </li>

     <!-- Clients -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#clients" aria-expanded="true"
             aria-controls="clients">
             <i class="fas fa-fw fa-users"></i>
             <span>العملاء</span>
         </a>
         <div id="clients" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                 <a class="collapse-item" href="{{ route('clients.create') }}">أضافة عميل</a>
                 <a class="collapse-item" href="{{ route('clients.index') }}">كل العملاء</a>
             </div>
         </div>
     </li>


     <!-- Languages -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#languages"
             aria-expanded="true" aria-controls="languages">
             <i class="fas fa-fw fa-cog"></i>
             <span> اللغات</span>
         </a>
         <div id="languages" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                 <a class="collapse-item" href="{{ route('languages.create') }}">أضافة لغة</a>
                 <a class="collapse-item" href="{{ route('languages.index') }}">كل اللغات</a>
             </div>
         </div>
     </li>

     <!-- Services -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#services"
             aria-expanded="true" aria-controls="services">
             <i class="fas fa-fw fa-cog"></i>
             <span> الخدمات</span>
         </a>
         <div id="services" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                 <a class="collapse-item" href="{{ route('services.create') }}">أضافة خدمة</a>
                 <a class="collapse-item" href="{{ route('services.index') }}">كل الخدمات</a>
             </div>
         </div>
     </li>

     <!-- Expense Items -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#expense_types"
             aria-expanded="true" aria-controls="expense_types">
             <i class="fas fa-fw fa-money-bill"></i>
             <span> أنواع المصروفات</span>
         </a>
         <div id="expense_types" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                 <a class="collapse-item" href="{{ route('expense_types.create') }}">أضافة نوع صرف</a>
                 <a class="collapse-item" href="{{ route('expense_types.index') }}">كل أنواع المصروفات</a>
             </div>
         </div>
     </li>

     <!-- Service Providers -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#service_providers"
             aria-expanded="true" aria-controls="service_providers">
             <i class="fas fa-fw fa-users"></i>
             <span>مقدمى الخدمات</span>
         </a>
         <div id="service_providers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                 <a class="collapse-item" href="{{ route('service_providers.create') }}">أضافة مقدم خدمة</a>
                 <a class="collapse-item" href="{{ route('service_providers.index') }}">كل مقدمى الخدمات</a>
             </div>
         </div>
     </li>


     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         الماليات
     </div>

     <!-- Receive Cash -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#receive_cash"
             aria-expanded="true" aria-controls="receive_cash">
             <i class="fas fa-fw fa-money-bill"></i>
             <span>أستلام نقدية</span>
         </a>
         <div id="receive_cash" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                 <a class="collapse-item" href="{{ route('receive_cash.create') }}">أضافة أستلام نقدية</a>
                 <a class="collapse-item" href="{{ route('receive_cash.index') }}">كل أستلامات النقدية</a>
                 <a class="collapse-item" href="{{ route('receive_cash.reports') }}"> تقارير أستلامات النقدية</a>

             </div>
         </div>
     </li>

     <!-- cash Out-->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cash_out"
             aria-expanded="true" aria-controls="cash_out">
             <i class="fas fa-fw fa-money-bill"></i>
             <span>صرف نقدية</span>
         </a>
         <div id="cash_out" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                 <a class="collapse-item" href="{{ route('cash_out.create') }}">أضافة صرف نقدية</a>
                 <a class="collapse-item" href="{{ route('cash_out.index') }}">كل صرف النقدية</a>
                 <a class="collapse-item" href="{{ route('cash_out.reports') }}">تقارير صرف النقدية</a>

             </div>
         </div>
     </li>

     <!-- Expense Items -->
     {{-- </ul> <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#expense_items"
             aria-expanded="true" aria-controls="expense_items">
             <i class="fas fa-fw fa-money-bill"></i>
             <span> بنود المصروفات</span>
         </a>
         <div id="expense_items" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{ route('expense_items.create') }}">أضافة بند صرف</a>
                 <a class="collapse-item" href="{{ route('expense_items.index') }}">كل بنود المصروفات</a>
             </div>
         </div>
     </li> --}}




     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

     <!-- Sidebar Message -->
     {{-- <div class="sidebar-card d-none d-lg-flex">
         <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
         <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components,
             and more!</p>
         <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to
             Pro!</a>
     </div> --}}

 </ul>
 <!-- End of Sidebar -->
