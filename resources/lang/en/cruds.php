<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'assetManagement' => [
        'title'          => 'Asset Management',
        'title_singular' => 'Asset Management',
    ],
    'amProjectApproval' => [
        'title'          => 'AM Project Approval',
        'title_singular' => 'AM Project Approval',
        'fields'         => [
            'id'                                 => 'ID',
            'id_helper'                          => ' ',
            'pid'                                => 'Project ID',
            'pid_helper'                         => ' ',
            'pname'                              => 'Project',
            'pname_helper'                       => ' ',
            'busines_business_dates_date'        => 'Business Date',
            'busines_business_dates_date_helper' => 'Business Date',
            'approval_status'                    => 'Approval Status',
            'approval_status_helper'             => ' ',
            'updated_by'                         => 'Updated by User',
            'updated_by_helper'                  => ' ',
            'created_at'                         => 'Created at',
            'created_at_helper'                  => ' ',
            'updated_at'                         => 'Updated at',
            'updated_at_helper'                  => ' ',
            'deleted_at'                         => 'Deleted at',
            'deleted_at_helper'                  => ' ',
            'record_count'                       => 'Records',
            'region'                       => 'Region'
        ],
    ],
    'amProjectApprovalSdf' => [
        'title'          => 'AM Project Approval Sdf',
        'title_singular' => 'AM Project Approval Sdf',
        'fields'         => [
            'id'                                 => 'ID',
            'id_helper'                          => ' ',
            'pid'                                => 'Project ID',
            'pid_helper'                         => ' ',
            'pname'                              => 'Project',
            'pname_helper'                       => ' ',
            'busines_business_dates_date'        => 'Business Date',
            'busines_business_dates_date_helper' => 'Business Date',
            'approval_status'                    => 'Approval Status',
            'approval_status_helper'             => ' ',
            'updated_by'                         => 'Updated by User',
            'updated_by_helper'                  => ' ',
            'created_at'                         => 'Created at',
            'created_at_helper'                  => ' ',
            'updated_at'                         => 'Updated at',
            'updated_at_helper'                  => ' ',
            'deleted_at'                         => 'Deleted at',
            'deleted_at_helper'                  => ' ',
            'record_count'                       => 'Records',
            'region'                       => 'Region'
        ],
    ],
    'projectApproval' => [
        'title'          => 'Project Approval',
        'title_singular' => 'Project Approval',
    ],
    'user_workstream' => [
        'title'          => 'User Workstream',
        'title_singular' => 'User Workstream',
        'fields'         => [
            'title' => 'User',
            'title_helper' => '',
            'workstream' => 'Workstreams',
            'workstream_helper' => '',
            'id' => "ID",
            'user' => 'User',
            'workstream' => 'Workstreams',
        ],
    ],
];
