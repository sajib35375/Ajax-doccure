<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="active">
                    <a href="index.html"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>

                <li>
                    <a href="doctor-list.html"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
                </li>

                <li>
                    <a href="settings.html"><i class="fe fe-vector"></i> <span>Settings</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Users</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('user.index') }}">User</a></li>
                        <li><a href="{{ route('role.index') }}">Role</a></li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>Pages</span>
                </li>
                <li>
                    <a href="profile.html"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
