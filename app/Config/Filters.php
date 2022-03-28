<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'authFilter' => \App\Filters\AuthFilter::class,
        'authFilter_petugas' => \App\Filters\AuthFilterPetugas::class
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            'authFilter' => ['except' => ['/', '/AuthCust/*', '/AuthPetugas/*', 'frontend/*', '/register_cust', '/pages/*', '/login_cust', '/register_petugas', '/login_petugas', '/admin', '/admin/*']],
            // 'authFilter_petugas' => ['except' => ['/', '/login_petugas', '/AuthPetugas/*', '/register_petugas']],
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
        'after' => [
            'authFilter' => ['except' => ['/Pengaduan_online', '/Pengaduan_online/*']],
            // 'authFilter_petugas' => ['except' => ['/backend', '/backend/*', '/dashboard_petugas', '/dashboard_petugas']],
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [
        // 'authFilter' => ['before' => ['/backend/*']],
    ];
}
