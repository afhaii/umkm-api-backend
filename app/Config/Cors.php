<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Cross-Origin Resource Sharing (CORS) Configuration
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
 */
class Cors extends BaseConfig
{
    /**
     * The default CORS configuration.
     *
     * @var array{
     *      allowedOrigins: list<string>,
     *      allowedOriginsPatterns: list<string>,
     *      supportsCredentials: bool,
     *      allowedHeaders: list<string>,
     *      exposedHeaders: list<string>,
     *      allowedMethods: list<string>,
     *      maxAge: int,
     *  }
     */
    
public array $default = [
    // Tidak menggunakan origin dengan port tetap
    'allowedOrigins' => [],

    // Mengizinkan port Flutter Web yang berubah-ubah
    'allowedOriginsPatterns' => [
        'http://localhost(:[0-9]+)?',
        'http://127\.0\.0\.1(:[0-9]+)?',
    ],

    'supportsCredentials' => false,

    'allowedHeaders' => [
        'Accept',
        'Content-Type',
        'Origin',
        'X-Requested-With',
    ],

    'exposedHeaders' => [],

    'allowedMethods' => [
        'GET',
        'POST',
        'PUT',
        'DELETE',
        'OPTIONS',
    ],

    'maxAge' => 86400,
    ];
}
