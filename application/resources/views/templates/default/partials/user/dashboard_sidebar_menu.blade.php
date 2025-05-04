<div class="sidebar-menu radius--24">
    <span class="sidebar-menu__close"><i class="las la-times"></i></span>
    <div class="logo-wrapper px-3">
        <a href="{{ route('home') }}" class="normal-logo" id="normal-logo">

            <img src="{{ getImage('assets/images/logoIcon/default_logo_white.png') }}" alt="" />
        </a>
    </div>

    <ul class="sidebar-menu-list">
        <li class="sidebar-menu-list__item">
            <a href="{{route('user.home')}}" class="sidebar-menu-list__link {{ Route::is('user.home') ? 'active' : '' }}">
                <span class="icon"><i class="fa-solid fa-border-all"></i></span>
                <span class="text">@lang('Dashboard')</span>
            </a>
        </li>

        <li class="sidebar-menu-list__item has-dropdown {{ Route::is('user.escrow.new') || Route::is('user.escrow.list') || Route::is('user.escrow.get.offer.list') ? 'active': '' }}">
            <a href="javascript:void(0)" class="sidebar-menu-list__link">
                <span class="icon"><i class="fas fa-code-branch"></i></span>
                <span class="text">@lang('Escrow')</span>
            </a>
            <div class="sidebar-submenu {{ Route::is('user.escrow.new') || Route::is('user.escrow.list') || Route::is('user.escrow.get.offer.list') ? 'd-block' : '' }}">
                <ul class="sidebar-submenu-list">
                    <li class="sidebar-submenu-list__item {{ Route::is('user.escrow.new')  ? 'active' : '' }}">
                        <a href="{{route('user.escrow.new')}}" class="sidebar-submenu-list__link">@lang("Create New")</a>
                    </li>
                    <li class="sidebar-submenu-list__item {{ Route::is('user.escrow.list') ? 'active' : '' }}">
                        <a href="{{route('user.escrow.list')}}" class="sidebar-submenu-list__link">@lang('My Escrow List')</a>
                    </li>
                    <li class="sidebar-submenu-list__item {{ Route::is('user.escrow.get.offer.list') ? 'active' : '' }}">
                        <a href="{{route('user.escrow.get.offer.list')}}" class="sidebar-submenu-list__link">@lang('Invited Escrow List')</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="sidebar-menu-list__item has-dropdown {{ Route::is('user.deposit') || Route::is('user.deposit.history') ? 'active' : '' }}">
            <a href="javascript:void(0)" class="sidebar-menu-list__link">
                <span class="icon"><i class="fa-solid fa-circle-dollar-to-slot"></i></span>
                <span class="text">@lang('Deposit')</span>
            </a>
            <div class="sidebar-submenu {{ Route::is('user.deposit') || Route::is('user.deposit.history') ? 'd-block' : '' }}">
                <ul class="sidebar-submenu-list">
                    <li class="sidebar-submenu-list__item {{ Route::is('user.deposit')  ? 'active' : '' }}">
                        <a href="{{route('user.deposit')}}" class="sidebar-submenu-list__link">@lang("Deposit Now")</a>
                    </li>
                    <li class="sidebar-submenu-list__item {{ Route::is('user.deposit.history') ? 'active' : '' }}">
                        <a href="{{route('user.deposit.history')}}" class="sidebar-submenu-list__link">@lang('Deposit Log')</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="sidebar-menu-list__item has-dropdown {{ Route::is('user.withdraw') || Route::is('user.withdraw.history') ? 'active' : '' }}">
            <a href="javascript:void(0)" class="sidebar-menu-list__link">
                <span class="icon"><i class="fas fa-money-bill-alt"></i></span>
                <span class="text">@lang('Withdraw')</span>
            </a>
            <div class="sidebar-submenu {{ Route::is('user.withdraw') || Route::is('user.withdraw.history') ? 'd-block' : '' }}">
                <ul class="sidebar-submenu-list">
                    <li class="sidebar-submenu-list__item {{ Route::is('user.withdraw')  ? 'active' : '' }}">
                        <a href="{{route('user.withdraw')}}" class="sidebar-submenu-list__link">@lang("Withdraw Now")</a>
                    </li>
                    <li class="sidebar-submenu-list__item {{ Route::is('user.withdraw.history') ? 'active' : '' }}">
                        <a href="{{route('user.withdraw.history')}}" class="sidebar-submenu-list__link">@lang("Withdraw Log")</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="sidebar-menu-list__item {{ Route::is('user.transactions') ? 'active' : '' }}">
            <a href="{{ route('user.transactions')}}" class="sidebar-menu-list__link">
                <span class="icon"><i class="fa-solid fa-arrow-right-arrow-left"></i></span>
                <span class="text">@lang("Transactions")</span>
            </a>
        </li>

    
        <li class="sidebar-menu-list__item has-dropdown {{ Route::is('ticket') || Route::is('ticket.open') || Route::is('ticket.view') ? 'active' : '' }}">
            <a href="javascript:void(0)" class="sidebar-menu-list__link">
                <span class="icon"><i class="fas fa-headset"></i></span>
                <span class="text">@lang('Support Ticket')</span>
            </a>
            <div class="sidebar-submenu {{ Route::is('ticket') || Route::is('ticket.open') || Route::is('ticket.view') ? 'd-block' : '' }}">
                <ul class="sidebar-submenu-list">
                    <li class="sidebar-submenu-list__item">
                        <a href="{{route('ticket')}}" class="sidebar-submenu-list__link">@lang("Ticket")</a>
                    </li>
                    <li class="sidebar-submenu-list__item">
                        <a href="{{route('ticket.open')}}" class="sidebar-submenu-list__link">@lang("New Ticket")</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="sidebar-menu-list__item has-dropdown {{ Route::is('user.profile.setting') || Route::is('user.change.password') || Route::is('user.twofactor') ? 'active' : '' }}">
            <a href="javascript:void(0)" class="sidebar-menu-list__link">
                <span class="icon"><i class="fa-solid fa-gears"></i></span>
                <span class="text">@lang('Setting')</span>
            </a>
            <div class="sidebar-submenu {{ Route::is('user.profile.setting') || Route::is('user.change.password') || Route::is('user.twofactor') ? 'd-block' : '' }}">
                <ul class="sidebar-submenu-list">
                    <li class="sidebar-submenu-list__item">
                        <a href="{{ route('user.profile.setting') }}" class="sidebar-submenu-list__link">@lang("Profile Setting")</a>
                    </li>
                    <li class="sidebar-submenu-list__item">
                        <a href="{{ route('user.change.password') }}" class="sidebar-submenu-list__link">@lang("Change Password")
                        </a>
                    </li>
                    <li class="sidebar-submenu-list__item">
                        <a href="{{ route('user.twofactor') }}" class="sidebar-submenu-list__link">@lang("2Fa Security")
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>
