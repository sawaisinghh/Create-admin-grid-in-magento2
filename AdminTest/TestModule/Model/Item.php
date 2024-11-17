<?php 

namespace AdminTest\TestModule\Model;

use Magento\Framework\Model\AbstractModel;

class Item extends AbstractModel{
	
	protected $_eventPrefix = 'add_sample_item';
	
	protected function _construct()
	{
		$this->_init(\AdminTest\TestModule\Model\ResourceModel\Item::class);
	}
}
