<?php

namespace Dlaweb\SampleModule\Api;

interface ItemRepositoryInterface
{
    /**
     * @return \Dlaweb\SampleModule\Api\Data\ItemInterface[]
     */
    public function getList();
}
