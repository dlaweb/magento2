<?php

namespace Dlaweb\SampleModule\Model\ResourceModel\Item;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

use Dlaweb\SampleModule\Model\ResourceModel\Item;
use Dlaweb\SampleModule\Model\ResourceModel\Item as ItemResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function __construct()
    {
        $this->init(Item::class, ItemResource::class);
    }
}