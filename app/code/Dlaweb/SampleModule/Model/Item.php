<?php
namespace Dlaweb\SampleModule\Model;

use Magento\Framework\Model\AbstractModel;

class Item extends AbstractModel
{
    protected function __construct()
    {
        $this->_init(Dlaweb\SampleModule\Model\ResourceModel\Item::class);
    }
}