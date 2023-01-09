{{-- Side Navbar --}}
<div class="side__wrapper nav__wrapper">
    {{-- Sidebar Navbar --}}
    <div class="side__nav">
        {{-- Logo --}}
        <div class="side__navlogo nav__logo">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('asset/logo/bagian-logo.png') }}"
                     alt="">
            </a>
        </div>
        <div class="nav__container">
            <div class="dashboard__links">
                <a href="{{ route('dashboard') }}"
                   class="link__active active">
                    <ion-icon name="file-tray-stacked-sharp"
                              class="ion-icon__setting"
                              style="margin-right:10px; display:inline-block; justify-content:center;align-items:center; bottom:20px">
                    </ion-icon>
                    Dashboard
                </a>
            </div>
            <div class="program__links">
                <a href="{{ route('penjelasan-aplikasi') }}">
                    <ion-icon name="rocket-sharp"
                              class="ion-icon__setting"
                              style="margin-right:10px; display:inline-block; justify-content:center;align-items:center; bottom:20px">
                    </ion-icon>
                    Sistem Monitoring
                </a>
            </div>
            <div class="nav__title">
                <h1>Data Master</h1>
            </div>
            <div class="nav__item">
                <div class="nav__list__datalog btn-group">
                    <div class="log__maps__data">
                        <ion-icon name="server-sharp"
                                  class="ion-icon__setting"
                                  style="margin-right:10px; display:inline-block; justify-content:center;align-items:center; bottom:20px">
                        </ion-icon>
                        <a href="{{ route('logdata-maps') }}">Log Data Maps</a>
                    </div>
                    {{--  <button type="button"
                            class="btn  nav__dropdown"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">  --}}

                    {{--  Log Data  --}}
                    {{--  </button>  --}}
                    {{--  <ul class="dropdown-menu nav__dropdown--menu">
                        <li><a class="dropdown-item"
                               href="{{ route('logdata-maps') }}">Log Data Aplikasi</a></li>
                    </ul>  --}}
                </div>
            </div>
        </div>
        {{-- End Logo --}}
    </div>
    {{-- End Sidebar Navbar --}}
    {{-- Top Nav --}}
    @include('topbar.top-bar')
    {{-- End Top Nav --}}
</div>
