<?php

namespace Dlaweb\SampleModule\Setup;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

/**
 * @codeCoverageIgnore
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Zend_Db_Exception
     */

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '1.0.1', '<'))
        {
            $setup->getConnection()->update(
                $setup->getTable(
                    'mastering_sample_item'
                ),
                [
                    'description' => 'Do your dance'
                ],
                // condition, add the description where id == 1
                $setup->getConnection()->quoteInto('id = ?', 1)
            );
        }
        
        $setup->endSetup();
    }

}