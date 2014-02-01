<?php
    
namespace WebinoImageThumb\View\Model;
    
use Zend\View\Model\ViewModel;

class ImageModel extends ViewModel
{
    /**
     * Csv probably won't need to be captured into a 
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
    protected $template = 'webino-image-thumb/image/png';

    protected $fileName;

    protected $phpThumb;

    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
        
    }

    public function getFileName()
    {
        return $this->fileName;
    }
    
    public function setPhpThumb(\PHPThumb\GD $phpThumb)
    {
        $this->phpThumb = $phpThumb;
        $this->setVariable('phpThumb', $phpThumb);
    }

    public function getPhpThumb()
    {
        return $this->phpThumb;
    }
       
}