<?php
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
