<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="index.html"><i class="icon-speedometer"></i> {{ __('words.dashboard') }} <span class="tag tag-info">جدید</span></a>
            </li>

            <li class="nav-title">
               مدیریت کاربران
            </li>
             <li class="nav-item">
                <a class="nav-link" href="#"><i class="icon-user-follow"></i> ثبت کاربر</a>
                <a class="nav-link" href="#"><i class="icon-people"></i> لیست کاربران</a>
                <a class="nav-link" href="#"><i class="icon-user-following"></i> دسترسی کاربران</a>
            </li>

            <li class="nav-title">
               مدیریت فایل ها
            </li>
             <li class="nav-item">
                <a class="nav-link" href="#"><i class="icon-docs"></i> لیست فایل ها</a>
            </li>

            <li class="nav-title">
               Dashboard Settings
            </li>
             <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.settings') }}"><i class="fa fa-cog"></i>{{ __('words.settings') }}</a>
                <a class="nav-link" href="#"><i class="fa fa-sign-out"></i>{{ __('words.logout') }}</a>
            </li>


        </ul>
    </nav>
</div>
