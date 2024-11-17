<?php

namespace AdminTest\TestModule\Api;

interface ItemRepositoryInterface
{
	/**
	* @return \AdminTest\TestModule\Api\Data\ItemInterface[]
	*/
	public function getList();
}