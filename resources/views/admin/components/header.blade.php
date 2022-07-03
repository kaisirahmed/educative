<div class="navbar-header">
  <div class="d-flex">
      <!-- LOGO -->
      <div class="navbar-brand-box">
          <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
              
              <span class="logo-lg">
                  <img src="{{ asset('learningAdminAssets/images/logo-dark.png') }}" alt="" height="17">
              </span>
          </a>

          <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
              <span class="logo-sm">
                  <img src="{{ asset('learningAdminAssets/images/logo-dark.png') }}" alt="" height="22">
              </span>
              <span class="logo-lg">
                  <img src="{{ asset('learningAdminAssets/images/logo-dark.png') }}" alt="" height="36">
              </span>
          </a>
      </div>

      <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
          <i class="mdi mdi-menu"></i>
      </button>

      <div class="d-none d-sm-block ml-2">
        <nav aria-label="breadcrumb">
            {{ Breadcrumbs::render() }}
        </nav>
      </div>
  </div>

  <!-- Search input -->
  <div class="search-wrap" id="search-wrap">
      <div class="search-bar">
          <input class="search-input form-control" placeholder="Search" />
          <a href="javascript:void(0);" class="close-search toggle-search" data-target="#search-wrap">
              <i class="mdi mdi-close-circle"></i>
          </a>
      </div>
  </div>

  <div class="d-flex">

      <div class="dropdown d-none d-lg-inline-block mr-2">
          <button type="button" class="btn header-item toggle-search noti-icon waves-effect" data-target="#search-wrap">
              <i class="mdi mdi-magnify"></i>
          </button>
      </div>

      <div class="dropdown d-none d-lg-inline-block mr-2">
          <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
              <i class="mdi mdi-fullscreen"></i>
          </button>
      </div>

      <div class="dropdown d-inline-block mr-2">
          <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="ion ion-md-notifications"></i>
              <span class="badge badge-danger badge-pill">3</span>
          </button>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-notifications-dropdown">
              <div class="p-3">
                  <div class="row align-items-center">
                      <div class="col">
                          <h5 class="m-0 font-size-16"> Notification (3) </h5>
                      </div>
                  </div>
              </div>
              <div data-simplebar style="max-height: 230px;">
                  <a href="" class="text-reset notification-item">
                      <div class="media">
                          <div class="avatar-xs mr-3">
                              <span class="avatar-title bg-success rounded-circle font-size-16">
                                  <i class="mdi mdi-cart-outline"></i>
                              </span>
                          </div>
                          <div class="media-body">
                              <h6 class="mt-0 font-size-15 mb-1">Your order is placed</h6>
                              <div class="font-size-12 text-muted">
                                  <p class="mb-1">Dummy text of the printing and typesetting industry.</p>
                              </div>
                          </div>
                      </div>
                  </a>

                  <a href="" class="text-reset notification-item">
                      <div class="media">
                          <div class="avatar-xs mr-3">
                              <span class="avatar-title bg-warning rounded-circle font-size-16">
                                  <i class="mdi mdi-message-text-outline"></i>
                              </span>
                          </div>
                          <div class="media-body">
                              <h6 class="mt-0 font-size-15 mb-1">New Message received</h6>
                              <div class="font-size-12 text-muted">
                                  <p class="mb-1">You have 87 unread messages</p>
                              </div>
                          </div>
                      </div>
                  </a>

                  <a href="" class="text-reset notification-item">
                      <div class="media">
                          <div class="avatar-xs mr-3">
                              <span class="avatar-title bg-info rounded-circle font-size-16">
                                  <i class="mdi mdi-glass-cocktail"></i>
                              </span>
                          </div>
                          <div class="media-body">
                              <h6 class="mt-0 font-size-15 mb-1">Your item is shipped</h6>
                              <div class="font-size-12 text-muted">
                                  <p class="mb-1">It is a long established fact that a reader will</p>
                              </div>
                          </div>
                      </div>
                  </a>

              </div>
              <div class="p-2 border-top">
                  <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                      View all
                  </a>
              </div>
          </div>
      </div>

      <div class="dropdown d-inline-block">
          <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="rounded-circle header-profile-user" src="{{asset('learningAdminAssets/images/users/logo-dark.png')}}" alt="Header Avatar">
          </button>
          <div class="dropdown-menu dropdown-menu-right">
              <!-- item-->
              <a class="dropdown-item" href="#"><i class="font-size-16 align-middle mr-1"></i>{{ Auth::user()->name }}</a>
              <div class="dropdown-divider"></div>
              
              <a class="dropdown-item" href="#"><i class="mdi mdi-account-badge-horizontal-outline font-size-16 align-middle mr-1"></i> Profile</a>

              <a class="dropdown-item" href="#"><i class="mdi mdi-wallet-outline font-size-16 align-middle mr-1"></i> My Wallet</a>

              <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right">11</span><i class="mdi mdi-settings-outline font-size-16 align-middle mr-1"></i> Settings</a>
             
              <div class="dropdown-divider"></div>

                @if(Auth::guard('admin'))

                  <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                     <i class="mdi mdi-power font-size-16 align-middle mr-1 text-danger">Logout</i>
                      
                  </a>    
                  <form id="frm-logout" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>

                @endif
              
          </div>
      </div>
 
  </div>
</div>