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
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_workstream_access')): ?>
                <li class="c-sidebar-nav-item">
                    <a href="<?php echo e(route("admin.user-workstream.index")); ?>" class="c-sidebar-nav-link <?php echo e(request()->is("admin/user-workstream") || request()->is("admin/user-workstream/*") ? "c-active" : ""); ?>">
                        <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                        </i>
                        <?php echo e(trans('cruds.user_workstream.title')); ?>

                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('asset_management_access')): ?>
        <li class="c-sidebar-nav-dropdown <?php echo e(request()->is("admin/am-project-approvals*") ? "c-show" : ""); ?>">
        <li class="c-sidebar-nav-dropdown <?php echo e(request()->is("admin/project-approvals*") ? "c-show" : ""); ?>">

            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                </i>
                RE
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('am_project_approval_access')): ?>
                <li class="c-sidebar-nav-item">
                    <a href="<?php echo e(route("admin.am-project-approvals.index")); ?>" class="c-sidebar-nav-link <?php echo e(request()->is("admin/am-project-approvals") || request()->is("admin/am-project-approvals/*") ? "c-active" : ""); ?>">
                        <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                        </i>
                        <?php echo e(trans('cruds.amProjectApproval.title')); ?>

                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('am_project_deletion_access')): ?>
                <li class="c-sidebar-nav-item">
                    <a href="<?php echo e(route("admin.am-project-deletion.index")); ?>" class="c-sidebar-nav-link <?php echo e(request()->is("admin/am-project-deletion") || request()->is("admin/am-project-deletion/*") ? "c-active" : ""); ?>">
                        <i class="	far fa-trash-alt c-sidebar-nav-icon">

                        </i>
                        AM Project Deletion
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>


        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('re_sdf_menu_access')): ?>
        <li class="c-sidebar-nav-dropdown <?php echo e(request()->is("admin/am-project-approvals-sdf*") ? "c-show" : ""); ?>">
        <li class="c-sidebar-nav-dropdown <?php echo e(request()->is("admin/project-approvals-sdf*") ? "c-show" : ""); ?>">

            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                </i>
                RE - SDF
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('am_project_approvals_sdf_access')): ?>
                <li class="c-sidebar-nav-item">
                    <a href="<?php echo e(route('admin.am-project-approvals-sdf.index')); ?>" class="c-sidebar-nav-link">
                        <i class="	fas fa-check c-sidebar-nav-icon">
                        </i>
                        AM Project Approval SDF
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('am_project_deletion_sdf_access')): ?>
                <li class="c-sidebar-nav-item">
                    <a href="<?php echo e(route('admin.am-project-deletion-sdf.index')); ?>" class="c-sidebar-nav-link">
                        <i class=" fa fa-times-rectangle c-sidebar-nav-icon">
                        </i>
                        AM Project Deletion SDF
                    </a>
                </li>
                <?php endif; ?>

            </ul>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('treasury_access')): ?>
        <li class="c-sidebar-nav-dropdown <?php echo e(request()->is("admin/fact*") ? "c-show" : ""); ?> <?php echo e(request()->is("admin/sap-master*") ? "c-show" : ""); ?> <?php echo e(request()->is("admin/benpos-dump*") ? "c-show" : ""); ?>">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i style="font-size:18px" class="fa-fw fa fa-bank c-sidebar-nav-icon">
                </i>
                Treasury
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('benpos_access')): ?>
                <li class="c-sidebar-nav-dropdown <?php echo e(request()->is("admin/fact-category*") ? "c-show" : ""); ?> <?php echo e(request()->is("admin/fact*") ? "c-show" : ""); ?> <?php echo e(request()->is("admin/benpos-dump*") ? "c-show" : ""); ?>">
                    <a class="c-sidebar-nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-sitemap c-sidebar-nav-icon">
                        </i>
                        Benpos
                    </a>
                    <ul class="c-sidebar-nav-dropdown-items">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('benpos_dump_access')): ?>
                        <li class="c-sidebar-nav-item">
                            <a id="benpos_data" href="<?php echo e(url("admin/benpos-dump")); ?>" class="c-sidebar-nav-link <?php echo e(request()->is("admin/benpos-dump") || request()->is("admin/benpos-dump/create*")? "c-active" : ""); ?>">
                                <i class="fa-fw fas fa-window-restore c-sidebar-nav-icon"> </i>
                                Benpos Data Dump
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('eod_balances_access')): ?>
                <li class="c-sidebar-nav-dropdown <?php echo e(request()->is("admin/sap-master") ? "c-show" : ""); ?> <?php echo e(request()->is("admin/sap-master*") ? "c-show" : ""); ?> <?php echo e(request()->is("admin/sap-master/create") ? "c-show" : ""); ?>">
                    <a class="c-sidebar-nav-dropdown-toggle" href="#">
                        <i class="fa-fw		fa fa-bar-chart c-sidebar-nav-icon">
                        </i>
                        EOD Balances
                    </a>
                    <ul class="c-sidebar-nav-dropdown-items">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sap_master_access')): ?>
                        <li class="c-sidebar-nav-item">
                            <a href="<?php echo e(url("admin/sap-master")); ?>" class="c-sidebar-nav-link <?php echo e(request()->is("admin/sap-master*") || request()->is("admin/sap-master/*") ? "c-active" : ""); ?>">
                                <i class="fas fa-receipt c-sidebar-nav-icon">
                                </i>
                                SAP GL Master
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('arp_menu')): ?>
        <li class="c-sidebar-nav-dropdown <?php echo e(request()->is("admin/arp*") ? "c-show" : ""); ?>">
        <li class="c-sidebar-nav-dropdown <?php echo e(request()->is("admin/arp/*")|| request()->is("admin/facilities*") ? "c-show" : ""); ?>">

            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="fa fa-fast-forward c-sidebar-nav-icon">

                </i>
                ASMITA
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('arp_facility_menu')): ?>
                <li class="c-sidebar-nav-item">
                    <a href="<?php echo e(url("admin/facilities")); ?>" class="c-sidebar-nav-link <?php echo e(request()->is("admin/facilities") || request()->is("admin/facilities/*") ? "c-active" : ""); ?>">
                        <i class="fa fa-money c-sidebar-nav-icon">
                        </i>
                        Facility Master
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('arp_upload_menu')): ?>
                <li class="c-sidebar-nav-item">
                    <a href="<?php echo e(url("admin/arp-download")); ?>" class="c-sidebar-nav-link <?php echo e(request()->is("admin/arp-download") || request()->is("admin/arp-download/*") ? "c-active" : ""); ?>">
                        <i class="fa fa-cloud-upload c-sidebar-nav-icon">
                        </i>
                        ARP Upload
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('arp_approval_menu')): ?>
                <li class="c-sidebar-nav-item">
                    <a href="<?php echo e(url("admin/arp-approval")); ?>" class="c-sidebar-nav-link <?php echo e(request()->is("admin/arp-approval") || request()->is("admin/arp-approval/*") ? "c-active" : ""); ?>">
                        <i class="fa fa-thumbs-up c-sidebar-nav-icon">
                        </i>
                        ARP Approval
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('asmita_key_updates_menu')): ?>
                <li class="c-sidebar-nav-item">
                    <a href="<?php echo e(url("admin/key-updates/create")); ?>" class="c-sidebar-nav-link <?php echo e(request()->is("admin/key-updates") || request()->is("admin/key-updates/*") ? "c-active" : ""); ?>">
                        <i class="fa fa-key c-sidebar-nav-icon">
                        </i>
                        Key Updates
                    </a>
                </li>
                <?php endif; ?>

            </ul>
        </li>
        <?php endif; ?>

        <li class="c-sidebar-nav-dropdown">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crismac_access')): ?>
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i style="font-size:18px" class="fa-fw fas fa-spa c-sidebar-nav-icon">
                </i>
                CRISMAC
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crismac_s3_download_access')): ?>
                <li class="c-sidebar-nav-dropdown ">
                    <a class="c-sidebar-nav-dropdown-toggle" href="#">
                        <i class="fa-fw	fa fa-caret-square-o-down c-sidebar-nav-icon">
                        </i>
                        S3 Download
                    </a>
                    <ul class="c-sidebar-nav-dropdown-items">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reverse_feed_access')): ?>
                        <li class="c-sidebar-nav-item">
                            <a href="<?php echo e(url('admin/reverse-feed')); ?>" class="c-sidebar-nav-link ">
                                <i class="fas fa-history c-sidebar-nav-icon">
                                </i>
                                Reverse Feed
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reverse_feed_odv_access')): ?>
                        <li class="c-sidebar-nav-item">
                            <a href="<?php echo e(url('admin/reverse-feed-odv')); ?>" class="c-sidebar-nav-link ">
                                <i class="fas fa-sync-alt c-sidebar-nav-icon">
                                </i>
                                Reverse Feed ODV
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reverse_feed_table_access')): ?>
                <li class="c-sidebar-nav-item">
                    <a href="<?php echo e(url('admin/ods-reverse-feed')); ?>" class="c-sidebar-nav-link ">
                        <i class="fa fa-cube c-sidebar-nav-icon">
                        </i>
                        Reverse Feed Table
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reverse_feed_odv_table_access')): ?>
                <li class="c-sidebar-nav-item">
                    <a href="<?php echo e(url('admin/ods-odv-reverse-feed')); ?>" class="c-sidebar-nav-link ">
                        <i class="fa fa-cubes c-sidebar-nav-icon"></i>
                        Reverse Feed ODV Table
                    </a>
                </li>
                <?php endif; ?>

            </ul>
            <?php endif; ?>
        </li>
        <li class="c-sidebar-nav-dropdown <?php echo e(request()->is('admin/mis-report/*') || request()->is('admin/mis-report-master*') ? 'c-show' : ''); ?>">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i style="font-size:18px" class="fa-fw fas fa-file-text c-sidebar-nav-icon"></i>
                MIS Report
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('mis_report_master')): ?>
                <li class="c-sidebar-nav-dropdown">
                    <a class="c-sidebar-nav-dropdown-toggle" href="#">
                        <i class="fa-fw fa fa-sticky-note-o c-sidebar-nav-icon <?php echo e(request()->is('admin/mis-report-master/*') || request()->is('admin/mis-report-master') ? 'c-show' : ''); ?>"></i>
                        Report Master
                    </a>
                    <ul class="c-sidebar-nav-dropdown-items">
                        <li class="c-sidebar-nav-item">
                            <a href="<?php echo e(route('admin.mis-report-master.index')); ?>" class="c-sidebar-nav-link <?php echo e(request()->is('admin/mis-report-master') || request()->is('admin/mis-report-master/create') ? 'c-active' : ''); ?>">
                                <i class="fas fa-list c-sidebar-nav-icon"></i>
                                Listing
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('mis_report_dashboard')): ?>
                <li class="c-sidebar-nav-item">
                    <a href="<?php echo e(route('admin.mis-report/dashboard')); ?>" class="c-sidebar-nav-link">
                        <i class="fa fa-list-alt c-sidebar-nav-icon"></i>
                        Dashboard
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('mis_report_list_view')): ?>
                <li class="c-sidebar-nav-item">
                    <a href="<?php echo e(route('admin.mis-report/details')); ?>" class="c-sidebar-nav-link">
                        <i class="fa fa-info c-sidebar-nav-icon"></i>
                        List View
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </li>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fmr_menu')): ?>
        <li class="c-sidebar-nav-dropdown <?php echo e(request()->is('admin/fmr/*') || request()->is('admin/fmr*') ? 'c-show' : ''); ?> || <?php echo e(request()->is('admin/case-closed/*')|| request()->is('admin/case-closed*') ? 'c-show' : ''); ?>">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i style="font-size:18px" class="fa-fw fas fa fa-th-list c-sidebar-nav-icon ">
                </i>
                FMR
            </a>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fmr_dashboard')): ?>
            <ul class="c-sidebar-nav-dropdown-items ">
                <li class="c-sidebar-nav-item ">
                    <a href="<?php echo e(route('admin.fmr.index')); ?>" class="c-sidebar-nav-link ">
                        <i class=" c-sidebar-nav-icon fa fa-th-list s" aria-hidden="true">
                        </i>
                        Dashboard
                    </a>
                </li>
            </ul>
            <?php endif; ?>
            <?php endif; ?>
        </li>


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

</div><?php /**PATH D:\Laravel_Project_Azure\pel_am\pel_am\resources\views/partials/menu.blade.php ENDPATH**/ ?>