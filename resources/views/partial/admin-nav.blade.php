<nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">
    <ul class="navbar-nav navbar-nav-icons align-items-left">
        <span class="badge rounded-pill" style="background-color: #1e367b">Administrator Panel</span>
    </ul>
    <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
        <li class="nav-item dropdown">
           <a class="nav-link badge" style="background-color: #1e367b" id="navbarDropdownNotification" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="far fa-bell" data-fa-transform="shrink-6" style="font-size: 22px; float: left; color: white"></span><span class="card-header-title mb-0" data-fa-transform="shrink-6" style="font-size: 17px; color: white"><small>NOTIFICATIONS</small></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-card dropdown-menu-notification"
                 aria-labelledby="navbarDropdownNotification">
               <div class="card card-notification shadow-none" style="background-color: #1e367b">
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <h6 class="card-header-title mb-0 text-white">NOTIFICATIONS</h6>
                            </div>
                        </div>
                    </div>
                    <div class="scrollbar-overlay" style="max-height:19rem">
                        <div class="list-group list-group-flush fw-normal fs--1">
                            <div class="list-group-title border-bottom">NEW</div>
                            <div class="list-group-item">
                                <a class="notification notification-flush notification-unread" href="#!">
                                    <div class="notification-avatar"></div>
                                    <div class="notification-body">
                                        <p class="mb-1">Your Request List with Number<br><strong>RL0001001</strong>&nbsp;has been approved</p>
                                        <span class="notification-time">
                                            <span class="fas fa-clock"></span>&nbsp;Just now
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                   <div class="card-footer text-center border-top">
                        <a class="card-link d-block text-white" href="#">VIEW ALL</a>
                    </div>
                </div>
            </div>
        </li>
        &nbsp;
        <li class="nav-item dropdown">
            <a class="nav-link badge" style="background-color: #1e367b" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <span class="far fa-address-card" data-fa-transform="shrink-6" style="font-size: 22px; float: left; color: white"></span><span class="card-header-title mb-0" data-fa-transform="shrink-6" style="font-size: 17px; color: white"><small>PREFERENCES</small></span>

            </a>
            <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                <div class="bg-white dark__bg-1000 rounded-2 py-2">
                    <a class="dropdown-item" href="{{ route('profile.setting') }}">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </li>
    </ul>
</nav>