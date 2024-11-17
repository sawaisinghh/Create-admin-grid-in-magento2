<?php

namespace AdminTest\TestModule\Controller\Adminhtml\Item;

use AdminTest\TestModule\Model\ItemFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Redirect;

class Save extends Action
{
    private $itemFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        ItemFactory $itemFactory
    ) {
        $this->itemFactory = $itemFactory;
        parent::__construct($context);
    }

    public function execute()
    {   
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        
        // Get the POST data
        $data = $this->getRequest()->getPostValue();

        // Ensure 'general' is set in the post data
        if (!isset($data['general']) || empty($data['general'])) {
            $this->messageManager->addErrorMessage(__('Invalid form data.'));
            return $resultRedirect->setPath('*/*/');
        }

        $data = $data['general'];

        // Create the model instance
        $model = $this->itemFactory->create();
        
        // Check if entity_id is set for editing
        if (isset($data['entity_id']) && $data['entity_id']) {
            try {
                $id = $data['entity_id'];
                $model = $model->load($id);

                if (!$model->getId()) {
                    // If model doesn't exist, show an error
                    $this->messageManager->addErrorMessage(__('This item no longer exists.'));
                    return $resultRedirect->setPath('*/*/');
                }
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage(__('This item no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
        }

        // Sanitize or handle the data to avoid array-to-string conversion
        foreach ($data as $key => $value) {
            // Check if a value is an array, and handle it appropriately (e.g., convert to JSON or serialize)
            if (is_array($value)) {
                // Convert array to a JSON string (or other appropriate serialization method)
                $data[$key] = json_encode($value);
            }
        }

        // Set the sanitized data to the model
        $model->setData($data);

        // Save the model
        try {
            $model->save();
            $this->messageManager->addSuccessMessage(__('Item saved successfully.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('An error occurred while saving the item.'));
            $this->_logger->critical($e); // Log the error for debugging
            return $resultRedirect->setPath('*/*/edit', ['id' => $data['entity_id']]);
        }
        
        // Redirect to the item listing page
        return $resultRedirect->setPath('practice/index/index');
    }
}
