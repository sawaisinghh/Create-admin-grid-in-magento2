<?php

namespace AdminTest\TestModule\Controller\Index;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
		return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
