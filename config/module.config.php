<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2013 Webino, s. r. o. (http://webino.sk/)
 * @license   New BSD License
 */

/**
 * Do not write your custom settings into this file
 */
return array(
    'di' => array(
        'definition' => array(
            'compiler' => array(
                __DIR__ . '/../data/di/definition.php',
            ),
        ),
        'instance' => array(
            'alias' => array(
               'WebinoImageThumb' => 'WebinoImageThumb\WebinoImageThumb',
           ),
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'webino-image-thumb/image/png' => __DIR__ . '/../view/webino-image-thumb/image/png.phtml',
        ),
        'strategies' => array(
            'WebinoImageThumb\View\ImageStrategy'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'WebinoImageThumb\View\ImageStrategy' => 'WebinoImageThumb\Factory\ImageStrategyFactory',
        )
    )
);
