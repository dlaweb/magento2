<?php

namespace Dlaweb\Map\Controller\Map;

/**
 * On veut juste tester du ajax les gars
 * Dans le controlleur on fait appel au layout via la méthode execute
 */
use Magento\Framework\App\Action\Context as Context;


class Dropdown extends \Magento\Framework\App\Action\Action 
{
	/**
	 * Dropdown action
	 *
	 * @return $this
	 */

    protected $_resultJsonFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\Controller\Result\JsonFactory  $resultJsonFactory
        )
    {
        parent::__construct($context);
        $this->_resultJsonFactory = $resultJsonFactory;
    }
    
	public function execute($message = "lol")
	{

		$this->_view->loadLayout();
        $this->_view->renderLayout();

        $result = $this->_resultJsonFactory->create();

        if (!$this->getRequest()->isAjax())
        {
            $result->setData(['message' => $message]);
        }else{
            
            $result->setData(['message' => $message]);
        }
	}
}




