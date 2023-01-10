
<?php

class Contr { 

	protected $requestParams;

	public function __construct($requestParams = [])
	{
		$this->requestParams = $requestParams;
	}

}