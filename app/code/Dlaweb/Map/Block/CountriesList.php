<?php
/**
 * Created by PhpStorm.
 * User: macdavid
 * Date: 23/07/2018
 * Time: 19:47
 */

namespace Dlaweb\Map\Block;
use Magento\Framework\View\Element\Template;

class CountriesList extends \Magento\Framework\View\Element\Template
{
	public function __construct(Template\Context $context, array $data = [])
	{
		parent::__construct($context, $data);
		$this->setData('countries', array());
	}

	public function addCountries($count){

		$_countries = $this->getData('countries');
		$actualNumber = count($_countries);

		$names = array();

		for ($i = $actualNumber; $i <($actualNumber + $count); $i++){
			$_countries[] = 'nom' . ($i + 1);
		}

		$this->setData('countries', $_countries);
	}
}