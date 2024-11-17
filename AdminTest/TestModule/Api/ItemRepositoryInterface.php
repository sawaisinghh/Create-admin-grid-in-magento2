<?php

namespace AdminTest\TestModule\Api;

interface ItemRepositoryInterface
{
	/**
	* @return \Practice\SampleModule\Api\Data\ItemInterface[]
	*/
	public function getList();
}