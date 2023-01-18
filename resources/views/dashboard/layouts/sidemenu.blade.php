<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="index.html"><i class="icon-speedometer"></i> {{ __('words.dashboard') }} <span class="tag tag-info">جدید</span></a>
            </li>

            <li class="nav-title">
                Users
            </li>
             <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.users.create') }}"><i class="icon-user-follow"></i> Add User</a>
                <a class="nav-link" href="{{ route('dashboard.users.index') }}"><i class="icon-people"></i> Users List</a>
            </li>

            <li class="nav-title">
                 Categories
            </li>
             <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.categories.index') }}"><i class="icon-docs"></i> Category List</a>
                <a class="nav-link" href="{{ route('dashboard.categories.create') }}"><i class="icon-docs"></i> Create New Category</a>
            </li>

            <li class="nav-title">
                 Posts
            </li>
             <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.categories.index') }}"><i class="icon-docs"></i> Post List</a>
                <a class="nav-link" href="{{ route('dashboard.categories.create') }}"><i class="icon-docs"></i> Create New Post</a>
            </li>

            <li class="nav-title">
               Dashboard Settings
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
