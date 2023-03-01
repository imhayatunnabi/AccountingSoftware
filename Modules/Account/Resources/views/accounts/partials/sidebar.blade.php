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
                    <a href="{{ route('account.index') }}"><i class="fa-solid fa-file-invoice-dollar"></i>
                        Accounts </a>
                </li>
                <li>
                    <a href="{{ route('account.type.index') }}"><i class="fa-solid fa-square"></i>
                        Account Type </a>
                </li>
                <li>
                    <a href="{{ route('account.setup.index') }}"><i class="fa-solid fa-gear"></i></i>
                        Account Setup </a>
                </li>
                <li>
                    <a href="{{ route('account.transaction.index') }}"><i class="fa-solid fa-money-check-dollar"></i>
                        Transaction </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /# sidebar -->