<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">

            <li class="nav-item">
                <a href="{{ route("dealer.dashboard") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>



            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle {{ request()->is('dealer/leads/*')? 'active' : ''}}" href="#">
                    <i class="fa-fw fas fa-users nav-icon">

                    </i>
                    Leads
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ route("dealer.leads.index") }}" class="nav-link {{  request()->is('dealer/leads/index') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-question-circle nav-icon">

                            </i>
                            New
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("dealer.leads.rejected") }}" class="nav-link {{  request()->is('dealer/leads/rejected') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-question-circle nav-icon">

                            </i>
                            Rejected
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("dealer.leads.active") }}" class="nav-link {{  request()->is('dealer/leads/active') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-question-circle nav-icon">

                            </i>
                            Active
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("dealer.leads.complete") }}" class="nav-link {{ request()->is('dealer/leads/complete') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-question-circle nav-icon">

                            </i>
                            Complete
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route("dealer.agents.index") }}" class="nav-link {{ request()->is('dealer/agents') || request()->is('dealer/agents/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-cogs nav-icon">

                    </i>
                    Agents
                </a>
            </li>

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
            <?php /*
            

            @can('dealer_access')
            <li class="nav-item">
                <a href="{{ route("admin.dealers.index") }}" class="nav-link {{ request()->is('admin/dealers') || request()->is('admin/dealers/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-question-circle nav-icon">

                    </i>
                    Dealers
                </a>
            </li>
            @endcan
             @can('comment_access')
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