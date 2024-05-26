<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link mt-3 {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-pie-chart"></i></div>
                    Dashboard
                </a>
                <a class="nav-link mt-1 {{ Route::is('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Users
                </a>
                <a class="nav-link mt-1 {{ Route::is('mailTemplates.*') ? 'active' : '' }}" href="{{ route('mailTemplates.index') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-file"></i></div>
                    Templates
                </a>
                <a class="nav-link mt-1 {{ Route::is('mailCampaigns.*') ? 'active' : '' }}" href="{{ route('mailCampaigns.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Campaigns
                </a>
                <a class="nav-link mt-1 {{ Route::is('mailLogs.*') ? 'active' : '' }}" href="{{ route('mailLogs.index') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-area-chart"></i></div>
                    Mail Logs
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ auth()->user()->name }}
        </div>
    </nav>
</div>
