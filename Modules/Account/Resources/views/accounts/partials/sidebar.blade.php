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
                    <a href="{{ route('account.index') }}"><i class="fa-solid fa-gear"></i></i>
                        Account </a>
                </li>
                {{-- @endpermission --}}
                @permission('account.type.index')
                <li>
                    <a href="{{ route('account.type.index') }}"><i class="fa-solid fa-gear"></i></i>
                        Account Type </a>
                </li>
                @endpermission
                @permission('account.setup.index')
                <li>
                    <a href="{{ route('account.setup.index') }}"><i class="fa-solid fa-gear"></i></i>
                        Account Setup </a>
                </li>
                @endpermission
                @permission('account.transaction.index')
                <li>
                    <a href="{{ route('account.transaction.index') }}"><i class="fa-solid fa-gear"></i></i>
                        Transaction </a>
                </li>
                @endpermission
            </ul>
        </div>
    </div>
</div>
<!-- /# sidebar -->