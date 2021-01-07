<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dashboard_files/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alkhair</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
             <li><a href="{{-- route('dashboard.welcome') --}}"><i class="fa fa-th"></i><span>@lang('site.dashboard')</span></a></li>

            {{-- <li><a href="{{ route('dashboard.categories.index') }}"><i class="fa fa-th"></i><span>@lang('site.categories')</span></a></li>

            <li><a href="{{ route('dashboard.products.index') }}"><i class="fa fa-th"></i><span>@lang('site.products')</span></a></li>

            <li><a href="{{ route('dashboard.clients.index') }}"><i class="fa fa-th"></i><span>@lang('site.clients')</span></a></li>
            
            <li><a href="{{ route('dashboard.sliders.index') }}"><i class="fa fa-th"></i><span>@lang('site.sliders')</span></a></li>
            
            <li><a href="{{ route('dashboard.contact.index') }}"><i class="fa fa-th"></i><span>@lang('site.contact')</span></a></li>
            
            <li><a href="{{ route('dashboard.about_us.index') }}"><i class="fa fa-th"></i><span>@lang('site.about_us')</span></a></li> --}}
            
 {{--
            @if (auth()->user()->hasPermission('users_read'))
            <li><a href="{{ route('dashboard.users.index') }}"><i class="fa fa-th"></i><span>@lang('site.users')</span></a></li>
            @endif  --}}

        </ul>

    </section>

</aside>

