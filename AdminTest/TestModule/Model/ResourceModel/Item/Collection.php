<?php 

namespace AdminTest\TestModule\Model\ResourceModel\Item;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use AdminTest\TestModule\Model\Item;
use AdminTest\TestModule\Model\ResourceModel\Item as ItemResource;

class Collection extends AbstractCollection{
	
	protected $_eventPrefix = 'add_sample_item';
	
	protected function _construct()
	{
		$this->_init(Item::class, ItemResource::class);
	}
}
