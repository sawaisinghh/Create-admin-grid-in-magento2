<?php

namespace AdminTest\TestModule\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Backend\App\Action
{
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
	
	protected function _isAllowed()
	{
		return $this->_authorization->isAllowed('AdminTest_TestModule::practice');
	}
}
