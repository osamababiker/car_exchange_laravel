<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
                <path d="M19.4,4.1l-9-4C10.1,0,9.9,0,9.6,0.1l-9,4C0.2,4.2,0,4.6,0,5s0.2,0.8,0.6,0.9l9,4C9.7,10,9.9,10,10,10s0.3,0,0.4-0.1l9-4
              C19.8,5.8,20,5.4,20,5S19.8,4.2,19.4,4.1z" />
                <path d="M10,15c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
              c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,15,10.1,15,10,15z" />
                <path d="M10,20c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
              c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,20,10.1,20,10,20z" />
            </svg>

            <span class="align-middle me-3"> لوحة التحكم </span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a data-bs-target="#forms" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">ادخال</span>
                </a>
                <ul id="forms" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('campaigns.create') }}">
                            <span class="align-middle">اضافة حملة </span>
                        </a>
                        <a class="sidebar-link" href="{{ route('categories.create') }}">
                            <span class="align-middle">اضافة تصنيف </span>
                        </a>
                        <a class="sidebar-link" href="{{ route('countries.create') }}">
                            <span class="align-middle">اضافة دولة </span>
                        </a>
                        <a class="sidebar-link" href="{{ route('currancies.create') }}">
                            <span class="align-middle">اضافة عملة </span>
                        </a>
                        <a class="sidebar-link" href="{{ route('organizations.create') }}">
                            <span class="align-middle">اضافة منظمة </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#datatables" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">الجداول</span>
                </a>
                <ul id="datatables" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('organizations.index') }}"> جدول المنظمات </a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('campaigns.index') }}"> جدول الحملات </a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('users.index') }}"> جدول المستخدمين </a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('donations.index') }}"> جدول التبرعات </a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('categories.index') }}"> جدول التصنيفات </a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('countries.index') }}"> جدول الدول </a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('currancies.index') }}"> جدول العملات </a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('settings.index') }}"> اعدادات التطبيق  </a></li>
                </ul>
            </li>


        </ul>

        <!-- <div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <strong class="d-inline-block mb-2">تقرير المبيعات الشهرية</strong>
                <div class="mb-3 text-sm">
                    تقرير المبيعات الشهرية جاهز للتحميل
                </div>

                <div class="d-grid">
                    <a href="#" class="btn btn-primary" target="_blank">تحميل الان</a>
                </div>
            </div>
        </div> -->
    </div>
</nav>
<div class="main">
    <nav class="navbar navbar-expand navbar-light navbar-bg">
        <a class="sidebar-toggle">
            <i class="hamburger align-self-center"></i>
        </a>

        <form class="d-none d-sm-inline-block">
            <div class="input-group input-group-navbar">
                <input type="text" class="form-control" placeholder="ابحث عن ..." aria-label="Search">
                <button class="btn" type="button">
                    <i class="align-middle" data-feather="search"></i>
                </button>
            </div>
        </form>

        <div class="navbar-collapse collapse">
            <ul class="navbar-nav navbar-align">
                <li class="nav-item dropdown">
                    <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                        <i class="align-middle" data-feather="settings"></i>
                    </a>

                    <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/img/logo.png') }}" class="avatar img-fluid rounded-circle me-1" alt="{{ Auth::user()->name }}" /> <span class="text-dark"> {{ Auth::user()->name }} </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                تسجيل خروج
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
