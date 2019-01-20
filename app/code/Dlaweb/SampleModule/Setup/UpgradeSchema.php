<?php

namespace Dlaweb\SampleModule\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * @codeCoverageIgnore
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Zend_Db_Exception
     */

    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        /**
         * Check version
         */

        if (version_compare($context->getVersion(), '1.0.1', '<'))
        {
            /**
             * Add columns
             */

            $setup->getConnection()
            ->addColumn(
                $setup->getTable('mastering_sample_item'),
                'description', 
                [
                    'type' => Table::TYPE_TEXT,
                    'nullable' => true,
                    'comment' => 'Item description'
                ]
            );

        }

        $setup->endSetup();

    }
}