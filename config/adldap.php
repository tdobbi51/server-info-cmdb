<?php

/// These setting are pulled from .env 

return [
    'domain_controllers' => array(env('AD_HOSTS')),
    'account_suffix' => env('AD_SUFFIX'),
    'base_dn' => env('AD_BASEDN'),
    'admin_username' => env('AD_USERNAME'),
    'admin_password' => env('AD_PASSWORD'),
    'real_primary_group' => env('AD_RETURN_PRIMARY_GROUP'), 
    'use_ssl' => env('AD_SSL'), 
    'use_tls' => env('AD_TLS'), 
    'recursive_groups' => env('AD_RECURSIVE_GROUPS'),
];

