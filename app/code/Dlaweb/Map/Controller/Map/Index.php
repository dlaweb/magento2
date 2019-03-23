<?php
/**
 * Created by PhpStorm.
 * User: macdavid
 * Date: 21/07/2018
 * Time: 12:57
 */

namespace Dlaweb\Map\Controller\Map;


class Index extends \Magento\Framework\App\Action\Action
{
	/**
	 * Index action
	 *
	 * @return $this
	 */
	public function execute()
	{
		$this->_view->loadLayout();
		$this->_view->renderLayout();
	}
}