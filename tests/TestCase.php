<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {
	/**
	 * The base URL to use while testing the application.
	 * @var string
	 */
	protected $baseUrl = 'http://localhost';

	/**
	 * Creates the application.
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication() {
		$app = require __DIR__ . '/../bootstrap/app.php';
		$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
		return $app;
	}

	/**
	 * Test that all contents are visible on the current view.
	 * @param array $contents
	 */
	protected function seeAll(array $contents) {
		foreach ($contents as $content) {
			$this->see($content);
		}
	}

	/**
	 * Test whether selected dom element contains or not the given list of elements.
	 * @param $selector
	 * @param array $contains
	 * @param array $notContains
	 */
	protected function checkIn($selector, array $contains, array $notContains) {
		$html = $this->crawler->filter($selector)->html();
		$this->containsIn($html, $contains);
		$this->notContainsIn($html, $notContains);
	}

	/**
	 * Test whether the raw text contains given list of elements.
	 * @param $html
	 * @param array $contents
	 */
	protected function containsIn ($html, array $contents) {
		foreach ($contents as $content) {
			$this->assertContains($content, $html);
		}
	}

	/**
	 * Test whether the raw text does not contain given list of elements.
	 * @param $html
	 * @param array $notContents
	 */
	protected function notContainsIn ($html, array $notContents) {
		foreach ($notContents as $notContent) {
			$this->assertNotContains($notContent, $html);
		}
	}
}
