<div id="header" class="mdk-header js-mdk-header bg-white m-0" data-fixed data-effects="waterfall">
    <div class="mdk-header__content">

        <div class="navbar navbar-expand-sm navbar-main navbar-light pl-md-0 pr-0" id="navbar" data-primary>
            <div class="container">

                <!-- Navbar toggler -->
                <button class="navbar-toggler navbar-toggler-custom d-lg-none d-flex mr-navbar" type="button" data-toggle="sidebar">
                    <span class="material-icons">menu</span>
                </button>


                <div class="d-flex sidebar-account flex-shrink-0 mr-auto mr-lg-0">
                    <a href="{{ route('home') }}" class="flex d-flex align-items-center text-underline-0">
                        <img src="{{asset('learningAssets/images/logo.png')}}" width="60px"/>
                        <span class="flex d-flex flex-column text-black">
                            <strong class="sidebar-brand">eLearning</strong>
                        </span>                                
                    </a>
                </div>

               
                <form class="search-form search-form--light d-none d-sm-flex flex ml-3" action="#">
                    <input type="text" class="form-control" placeholder="Search your dream course">
                    <button class="btn" type="submit"><i class="material-icons">search</i></button>
                </form>

                <div class="mr-auto mr-lg-0">
                @if(Auth::user())
                    <div class="btn-group" role="group">
                        <button type="button" style="color: #00ced1;" class="btn btn-light" title="Verified Account"><i class="material-icons">
                        @if(Auth::user()->email_verified_at != null)
                            verified_user
                        @else
                            account_box
                        @endif
                        </i></button>
                        <button type="button" class="btn btn-light" title="{{ Auth::user()->name() }}">{{ Auth::user()->name() }}</button>
                    </div>
                    &nbsp;
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            
                        <button type="button" title="Logout" class="btn btn-outline-danger"><i class="material-icons">power_settings_new</i></button>
                        
                    </a>    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    
                @else
                    <a href="{{ route('login') }}"><button type="button" class="btn btn-light btn-outline-dark" {{-- data-toggle="modal" data-target="#modal-login" --}}>Log in</button></a>
                     
                    <a href="{{ route('register') }}"><button type="button" class="btn btn-outline-info">Join for free</button></a>
                @endif

                </div>
            </div>
        </div>

    </div>
</div> 