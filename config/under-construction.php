<?php

return [

    /*
     * Activate under construction mode.
     */
    'enabled' => env('UNDER_CONSTRUCTION_ENABLED', true),

    /*
     * Hash for the current pin code
     */
    'hash' => env('UNDER_CONSTRUCTION_HASH', null),

    /*
     * Under construction title.
     */
    'title' => 'Entrez le code pin',

    /*
     * Back button translation.
     */
    'back-button' => 'Retour',

    /*
    * Show button translation.
    */
    'show-button' => 'Montrer',

    /*
     * Hide button translation.
     */
    'hide-button' => 'Cacher',

    /*
     * Redirect url after a successful login.
     */
    'redirect-url' => '/gestion',

    /*
     * Enable throttle (max login attempts).
     */
    'throttle' => false,

        /*
        |--------------------------------------------------------------------------
        | Throttle settings (only when throttle is true)
        |--------------------------------------------------------------------------
        |

        */
        /*
         * Set the maximum number of attempts to allow.
         */
        'max_attempts' => 5,

        /*
         * Show attempts left.
         */
        'show_attempts_left' => true,

        /*
         * Attempts left message.
         */
        'attempts_message' => 'Tentatives restants: %i',

        /*
         * Too many attempts message.
         */
        'seconds_message' => 'Too many attempts please try again in %i seconds.',

        /*
         * Set the number of minutes to disable login.
         */
        'decay_minutes' => 5,
];
