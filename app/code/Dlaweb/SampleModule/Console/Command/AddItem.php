<?php

namespace Dlaweb\SampleModule\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Dlaweb\SampleModule\Model\ItemFactory;
use Magento\Framework\Console\Cli;

class AddItem extends Command
{
    const INPUT_KEY_NAME = 'name';
    const INTPUT_KEY_DESCRIPTION = 'description';

    protected $itemFactory;

    public function __construct(ItemFactory $itemFactory)
    {
        $this->itemFactory = $itemFactory;
        parent::__construct();
    }

    /**
     * Configuration
     */
    protected function configure()
    {
        $this->setName('mastering:item:add')
        ->addArgument(
            self::INPUT_KEY_NAME,
            InputArgument::REQUIRED,
            'Item name'
        )
        ->addArgument(
            self::INTPUT_KEY_DESCRIPTION,
            InputArgument::OPTIONAL,
            'Item description'
        );
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $item = $this->itemFactory->create();
        $item->setName($input->getArgument(self::INPUT_KEY_NAME));
        $item->setDescription($input->getArgument(self::INTPUT_KEY_DESCRIPTION));
        $item->setIsObjectNew(true);
        $item->save();
        return Cli::RETURN_SUCCESS;
    }


}