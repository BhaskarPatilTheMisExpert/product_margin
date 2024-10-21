<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="<?php echo e(url('/')); ?>">
            <img src="<?php echo e(asset('images\p-logo.svg')); ?>">
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="<?php echo e(route("admin.home")); ?>" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                <?php echo e(trans('global.dashboard')); ?>

            </a>
        </li>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_management_access')): ?>
        <li class="c-sidebar-nav-dropdown <?php echo e(request()->is("admin/users*") ? "c-show" : ""); ?> <?php echo e(request()->is("admin/permissions*") ? "c-show" : ""); ?> <?php echo e(request()->is("admin/roles*") ? "c-show" : ""); ?> <?php echo e(request()->is("admin/user-workstream*") ? "c-show" : ""); ?>">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                </i>
                <?php echo e(trans('cruds.userManagement.title')); ?>

            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_access')): ?>
                <li class="c-sidebar-nav-item">
                    <a href="<?php echo e(route("admin.users.index")); ?>" class="c-sidebar-nav-link <?php echo e(request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : ""); ?>">
                        <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                        </i>
                        <?php echo e(trans('cruds.user.title')); ?>

                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_access')): ?>
                <li class="c-sidebar-nav-item">
                    <a href="<?php echo e(route("admin.permissions.index")); ?>" class="c-sidebar-nav-link <?php echo e(request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : ""); ?>">
                        <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                        </i>
                        <?php echo e(trans('cruds.permission.title')); ?>

                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_access')): ?>
                <li class="c-sidebar-nav-item">
                    <a href="<?php echo e(route("admin.roles.index")); ?>" class="c-sidebar-nav-link <?php echo e(request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : ""); ?>">
                        <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                        </i>
                        <?php echo e(trans('cruds.role.title')); ?>

                    </a>
                </li>
                <?php endif; ?>
              
            </ul>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('asset_management_access')): ?>
        <li class="c-sidebar-nav-dropdown <?php echo e(request()->is("admin/am-tower*") ? "c-show" : ""); ?>">
        <li class="c-sidebar-nav-dropdown <?php echo e(request()->is("admin/am-tower*") || request()->is("admin/am-project*") ? "c-show" : ""); ?>">

            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                </i>
                Product Margin
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('am_tower_access')): ?>
                <li class="c-sidebar-nav-item">
                    <a href="<?php echo e(route("admin.dashboardReport-product")); ?>" class="c-sidebar-nav-link ">
                        <i class="far fa-building c-sidebar-nav-icon">
                        </i>
                        Product 
                    </a>
                </li>
                <?php endif; ?>
               
                
            </ul>
        </li>
        <?php endif; ?>
         
        <?php if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))): ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('profile_password_edit')): ?>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link <?php echo e(request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : ''); ?>" href="<?php echo e(route('profile.password.edit')); ?>">
                <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                </i>
                <?php echo e(trans('global.change_password')); ?>

            </a>
        </li>
        <?php endif; ?>
        <?php endif; ?>
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                <?php echo e(trans('global.logout')); ?>

            </a>
        </li>
    </ul>

</div><?php /**PATH D:\Product Margin\pel_am\resources\views/partials/menu.blade.php ENDPATH**/ ?>