<?php
/**
 * Created by PhpStorm.
 * User: macdavid
 * Date: 23/07/2018
 * Time: 19:47
 */

namespace Dlaweb\Map\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\UrlInterface;

class Dropdown extends \Magento\Framework\View\Element\Template
{

    /**
     * @var Magento\Framework\UrlInterface
     */
    protected $_urlInterface;

	public function __construct(
        Template\Context $context,
        UrlInterface $urlInterface,
        array $data = [])
	{
        parent::__construct($context, $data);
        $this->_urlInterface = $urlInterface;

        $test = array(
            'France',
            'Italie',
            'Angleterre'
        );
        
        // Data accessible dans le template
		$this->setData('countries', $test);
    }
    
    /**
     * Return string url with under folder
     */
    public function getAjaxUrl()
    {
        return $this->escapeUrl( $this->_urlInterface->getCurrentUrl() );
        
    }

    /**
     * Return domain url
     */
    public function getSimpleUrl()
    {
        return $this->escapeUrl($this->getUrl());
    }
}