<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo">
                    <a href="{{ route('backend.index') }}">
                        {{-- <img style="width:80%;" src="{{ url('/uploads/settings/',settings()->logo) }}"
                            alt="{{ settings()->name }}" srcset=""> --}}
                        <span class="font-weight-bold"> {{ settings()->name }}</span>
                    </a>
                </div>
                <li>
                    <a href="{{ route('backend.index') }}"><i class="ti-home"></i> Dashboard </a>
                </li>
                @permission('backend.role-permission.index')
                <li>
                    <a href="{{ route('backend.role-permission.index') }}"><i class="fa-solid fa-user-secret"></i></i>
                        Access Control </a>
                </li>
                @endpermission
                {{-- @if (hasAnyPermissions('backend.user.index')) --}}
                @permission('backend.user.index')
                <li>
                    <a href="{{ route('backend.user.index') }}"><i class="fa-solid fa-user"></i></i>
                        User </a>
                </li>
                @endpermission
                @permission('backend.settings.index')
                <li>
                    <a href="{{ route('backend.settings.index') }}"><i class="fa-solid fa-gear"></i></i>
                        Settings </a>
                </li>
                @endpermission
            </ul>
        </div>
    </div>
</div>
<!-- /# sidebar -->
