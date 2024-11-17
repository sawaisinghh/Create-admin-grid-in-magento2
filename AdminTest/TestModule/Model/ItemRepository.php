<?php

namespace AdminTest\TestModule\Model;

use AdminTest\TestModule\Api\ItemRepositoryInterface;
use AdminTest\TestModule\Model\ResourceModel\Item\CollectionFactory;

class ItemRepository implements ItemRepositoryInterface
{
	private $collectionFactory;
	
	public function __construct(CollectionFactory $collectionFactory)
	{
		$this->collectionFactory = $collectionFactory;
	}
	
	public function getList()
	{
		return $this->collectionFactory->create()->getItems();
	}
}