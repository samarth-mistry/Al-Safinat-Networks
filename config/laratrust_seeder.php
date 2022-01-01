<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'payments' => 'c,r,u,d',
            'vessels' => 'c,r,u,d',
            'vessel-routes' => 'c,r,u,d',
            'port-monitorings' => 'c,r,u,d',
            'global-traffics' => 'c,r,u,d',
            'delivered-batches' => 'c,r,u,d',
            'offices' => 'c,r,u,d',
            'resources' => 'c,r,u,d',
            'geography' => 'c,r,u,d',
            'pricings' => 'c,r,u,d',
            'admin-dashboard' => 'c,r,u,d'
        ],
        'portadministrator' => [
            'port-monitoring' => 'c,r,u,d',
            'delivered-batches' => 'c,r,u,d'
        ],
        'client' => [
            'profile' => 'r,u',
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
