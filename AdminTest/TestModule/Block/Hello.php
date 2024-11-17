<?php

namespace AdminTest\TestModule\Block;

use Magento\Framework\View\Element\Template;
use AdminTest\TestModule\Model\ResourceModel\Item\Collection;
use AdminTest\TestModule\Model\ResourceModel\Item\CollectionFactory;

class Hello extends Template{
	
	private $collectionFactory;
	
	public function __construct(
		Template\Context $context,
		CollectionFactory $collectionFactory,
		array $data = []){
		
		$this->collectionFactory = $collectionFactory;
		parent::__construct($context, $data);
	}
	
	public function getItems()
	{
		return $this->collectionFactory->create()->getItems();
	}
}
