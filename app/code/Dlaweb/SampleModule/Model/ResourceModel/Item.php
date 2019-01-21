<?php
namespace Dlaweb\SampleModule\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Item extends AbstractDb
{
    protected function __construct()
    {
        $this->_init('mastering_sample_item', 'id');
    }
}