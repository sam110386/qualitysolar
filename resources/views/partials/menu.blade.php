<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            @can('dashboard_access')
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @endcan
            @can('user_access')
            <li class="nav-item">
                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-user nav-icon">

                    </i>
                    Vendors
                </a>
            </li>
            @endcan
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users nav-icon">

                    </i>
                    Leads
                </a>
                <ul class="nav-dropdown-items">

                    <li class="nav-item">
                        <a href="{{ route("admin.leads.index") }}" class="nav-link {{request()->is('admin/leads/index') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-question-circle nav-icon">

                            </i>
                            New
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.leads.assigned") }}" class="nav-link {{ request()->is('admin/leads/assigned') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-question-circle nav-icon">

                            </i>
                            Assigned
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.leads.accepted") }}" class="nav-link {{  request()->is('admin/leads/accepted') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-question-circle nav-icon">

                            </i>
                            Accepted
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.leads.rejected") }}" class="nav-link {{ request()->is('admin/leads/rejected') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-question-circle nav-icon">

                            </i>
                            Rejected
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.leads.active") }}" class="nav-link {{ request()->is('admin/leads/active') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-question-circle nav-icon">

                            </i>
                            Active
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.leads.completed") }}" class="nav-link {{ request()->is('admin/leads/completed') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-question-circle nav-icon">

                            </i>
                            Completed
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.leads.canceled") }}" class="nav-link {{ request()->is('admin/leads/canceled') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-question-circle nav-icon">

                            </i>
                            Canceled
                        </a>
                    </li>

                </ul>
            </li>
            <?php /*
            @can('user_management_access')
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="nav-dropdown-items">
                    @can('user_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-user nav-icon">

                            </i>
                            {{ trans('cruds.user.title') }}
                        </a>
                    </li>
                    @endcan
                     
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        
                        @can('audit_log_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-file-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.auditLog.title') }}
                                </a>
                            </li>
                        @endcan
                    
                    </ul>
                </li>
            @endcan 
        */ ?>
            <?php /*
            @can('status_access')
                <li class="nav-item">
                    <a href="{{ route("admin.statuses.index") }}" class="nav-link {{ request()->is('admin/statuses') || request()->is('admin/statuses/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.status.title') }}
                    </a>
                </li>
            @endcan
            @can('priority_access')
                <li class="nav-item">
                    <a href="{{ route("admin.priorities.index") }}" class="nav-link {{ request()->is('admin/priorities') || request()->is('admin/priorities/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.priority.title') }}
                    </a>
                </li>
            @endcan
            @can('category_access')
                <li class="nav-item">
                    <a href="{{ route("admin.categories.index") }}" class="nav-link {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-tags nav-icon">

                        </i>
                        {{ trans('cruds.category.title') }}
                    </a>
                </li>
            @endcan */ ?>

            @can('dealer_access')
            <li class="nav-item">
                <a href="{{ route("admin.dealers.index") }}" class="nav-link {{ request()->is('admin/dealers') || request()->is('admin/dealers/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-question-circle nav-icon">

                    </i>
                    Dealers
                </a>
            </li>
            @endcan
            <?php /* @can('comment_access')
                <li class="nav-item">
                    <a href="{{ route("admin.comments.index") }}" class="nav-link {{ request()->is('admin/comments') || request()->is('admin/comments/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-comment nav-icon">

                        </i>
                        {{ trans('cruds.comment.title') }}
                    </a>
                </li>
            @endcan */ ?>

            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>