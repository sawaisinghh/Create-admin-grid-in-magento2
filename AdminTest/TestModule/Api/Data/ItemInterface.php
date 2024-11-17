<?php 

namespace AdminTest\TestModule\Api\Data;

interface ItemInterface
{
	/**
	* @return string
	*/
	public function getName();
	
	/**
	* @return string|null
	*/
	public function getDescription();
}