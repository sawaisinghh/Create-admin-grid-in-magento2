<?php

namespace AdminTest\TestModule\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Registry;
use AdminTest\TestModule\Model\ItemFactory;

class Edit extends Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var \AdminTest\TestModule\Model\ItemFactory
     */
    protected $itemFactory;

    /**
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * @param Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \AdminTest\TestModule\Model\ItemFactory $itemFactory
     * @param \Magento\Framework\Registry $registry
     */
    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory,
        ItemFactory $itemFactory,
        Registry $registry
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->itemFactory = $itemFactory;
        $this->_coreRegistry = $registry;  // Initialize the registry
        parent::__construct($context);
    }

    /**
     * Init actions
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected function _initAction()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('AdminTest_TestModule::practice')
            ->addBreadcrumb(__('Practice'), __('Practice'));
        return $resultPage;
    }

    /**
     * Edit Blog post
     *
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Backend\Model\View\Result\Redirect
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');        

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $id ? __('Edit ') : __('New '),
            $id ? __('Edit ') : __('New ')
        );

        $resultPage->getConfig()->getTitle()->prepend(__('Practice'));
        $resultPage->getConfig()->getTitle()
            ->prepend($id ? __('Edit ') : __('New '));

        return $resultPage;
    }
}
