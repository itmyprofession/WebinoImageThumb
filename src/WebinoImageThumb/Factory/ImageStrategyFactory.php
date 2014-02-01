<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2013 Webino, s. r. o. (http://webino.sk/)
 * @license   New BSD License
 */

namespace WebinoImageThumb\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use WebinoImageThumb\View\Strategy\ImageStrategy;

class ImageStrategyFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $strategy = new ImageStrategy($serviceLocator->get('WebinoImageThumb'));

        return $strategy;
    }
}
