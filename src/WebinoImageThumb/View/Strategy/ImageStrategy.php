<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2013 Webino, s. r. o. (http://webino.sk/)
 * @license   New BSD License
 */
     
namespace WebinoImageThumb\View\Strategy;

use WebinoImageThumb\View\Model\ImageModel;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\View\ViewEvent;
use WebinoImageThumb\WebinoImageThumb;

class ImageStrategy implements ListenerAggregateInterface
{
    /**
     * @var \Zend\Stdlib\CallbackHandler[]
     */
    protected $listeners = array();

    /**
     * @var WebinoImageThumb
     */
    protected $webinoImageThumb;

    /**
     * Constructor
     *
     * @param  WebinoImageThumb $webinoImageThumb
     * @return void
     */
    public function __construct(WebinoImageThumb $webinoImageThumb)
    {
        $this->webinoImageThumb = $webinoImageThumb;
    }


    /**
     * Gets webinoImageThumb
     *
     * @return WebinoImageThumb
     */
    public function getWebinoImageThumb()
    {
        return $this->webinoImageThumb;
    }
    
    /**
     * Attach the aggregate to the specified event manager
     *
     * @param  EventManagerInterface $events
     * @param  int $priority
     * @return void
     */
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events->attach(ViewEvent::EVENT_RENDERER, array($this, 'render'), $priority);
    }

    /**
     * Detach aggregate listeners from the specified event manager
     *
     * @param  EventManagerInterface $events
     * @return void
     */
    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($this->listeners[$index]);
            }
        }
    }

    /**
     * If model is an instance of ImageModel, image is displayed using PHPThumb
     *
     * @param  ViewEvent $e
     * @return void
     */
    public function render(ViewEvent $e)
    {
        $model = $e->getModel();
        
        if (!$model instanceof ImageModel) {
            return ;
        }

        if ($model->getFileName()) {
            $phpThumb = $this->getWebinoImageThumb()->create($model->getFileName());     
        } elseif ($model->getPhpThumb()) {
            $phpThumb = $model->getPhpThumb();
        } else {
            throw new Exception\RunTimeException('Please path image path or instance of PHPThumb\GD');
        }

        $phpThumb->show();
    }
        
}
