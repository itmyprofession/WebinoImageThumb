<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2013 Webino, s. r. o. (http://webino.sk/)
 * @license   New BSD License
 */
    
namespace WebinoImageThumb\View\Model;
    
use Zend\View\Model\ViewModel;

class ImageModel extends ViewModel
{
    /**
     * Image probably won't need to be captured into a 
     * a parent container by default.
     * 
     * @var string
     */
    protected $captureTo = null;

    /**
     * Csv is terminal
     * 
     * @var bool
     */
    protected $terminate = true;  
    
    /**
     * Template to use when rendering this model
     *
     * @var string
     */
    protected $template = null;

    /**
     * Path of image to show
     *
     * @var string
     */
    protected $fileName;

    /**
     * @var \PHPThumb\GD
     */
    protected $phpThumb;

    /**
     * Sets path of image to show
     *
     * @param string $fileName
     * @return self
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
        
    }

    /**
     * Gets path of image to show
     *
     * @return string $fileName
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * sets PhpThumb instance
     *
     * @param \PHPThumb\GD $phpThumb
     * @return self
     */    
    public function setPhpThumb(\PHPThumb\GD $phpThumb)
    {
        $this->phpThumb = $phpThumb;
        $this->setVariable('phpThumb', $phpThumb);

        return $this;
    }

    /**
     * Gets PhpThumb instance
     *
     * @return \PHPThumb\GD $phpThumb
     */   
    public function getPhpThumb()
    {
        return $this->phpThumb;
    }
       
}
