<div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link mt-3 " href="{{ url('/') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-pie-chart"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link mt-1 " href="{{ url('/user') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Users
                        </a>
                        <a class="nav-link mt-1 " href="{{ url('/template') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-file"></i></div>
                            Templates
                        </a>
                        <a class="nav-link mt-1 " href="{{ url('/campaign') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Campaigns
                        </a>
                        <a class="nav-link mt-1 " href="{{ url('/mail-log') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-area-chart"></i></div>
                            Mail Logs
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>

                </div>
            </nav>
        </div>
