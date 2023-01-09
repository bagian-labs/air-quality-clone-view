{{-- Top Nav --}}
@auth
{{-- @endauth (auth())  --}}
<div class="top__nav">
    <div class="dropdown nav__dropdown--top">
        <a class="btn dropdown-toggle dropdown__toggle--custome" href="#" role="button" id="dropdownTopMenu" data-bs-toggle="dropdown" aria-expanded="false">
            Hello, {{ !empty(Auth::user()->full_name) ? Auth::user()->full_name:Auth::user()->email }}
        </a>
        <ul class="dropdown-menu dropdown__menu--top" aria-labelledby="dropdownTopMenu">
            <li>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        <i class="fa-sharp fa-solid fa-user user__icon"></i>
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
@else
{{-- Top Nav --}}
<div class="top__nav">
    <div class="dropdown nav__dropdown--top">
        <a class="btn dropdown-toggle dropdown__toggle--custome" role="button" id="dropdownTopMenu" data-bs-toggle="dropdown" aria-expanded="false">
            Account
        </a>
        <ul class="dropdown-menu dropdown__menu--top" aria-labelledby="dropdownTopMenu">
            <li>
                <a class="dropdown-item" href="{{ route('login-pages') }}">
                    <i class="fa-sharp fa-solid fa-user user__icon"></i>
                    Login
                </a>
            </li>
        </ul>
    </div>
</div>
@endauth
{{-- End Top Nav --}}
{{-- End Top Nav --}}
