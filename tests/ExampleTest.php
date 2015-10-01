<?php

class ExampleTest extends TestCase {

	public function testBasicExample() {
		$this->visit('/')
			->see('Myjob');
	}

}
