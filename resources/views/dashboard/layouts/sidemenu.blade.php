<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="index.html"><i class="icon-speedometer"></i> {{ __('words.dashboard') }} <span class="tag tag-info">جدید</span></a>
            </li>

            <li class="nav-title">
                {{ __('words.Users') }}
            </li>
             <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.users.create') }}"><i class="icon-user-follow"></i> {{ __('words.Add User') }}</a>
                <a class="nav-link" href="{{ route('dashboard.users.index') }}"><i class="icon-people"></i>{{ __('words.Users List') }}</a>
            </li>

            <li class="nav-title">
                 {{ __('words.Categories') }}
            </li>
             <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.categories.index') }}"><i class="icon-docs"></i>{{ __('words.Category List') }}</a>
                <a class="nav-link" href="{{ route('dashboard.categories.create') }}"><i class="icon-docs"></i>{{ __('words.Create New Category') }}</a>
            </li>

            <li class="nav-title">
                 {{ __('words.Posts') }}
            </li>
             <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.categories.index') }}"><i class="icon-docs"></i>{{ __('words.Post List') }}</a>
                <a class="nav-link" href="{{ route('dashboard.categories.create') }}"><i class="icon-docs"></i>{{ __('words.Create New Post') }} </a>
            </li>

            <li class="nav-title">
               {{ __('words.Dashboard Settings') }}
            </li>
             <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.settings') }}"><i class="fa fa-cog"></i>{{ __('words.settings') }}</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                <button  class="nav-link"
                style="background-color: transparent; margin-right:10px;border:0;color:white" >
                <i class="fa fa-sign-out" style="margin-left: 10px"></i>{{ __('words.logout') }}</button>
                </form>
            </li>


        </ul>
    </nav>
</div>
