<?php

use Illuminate\Contracts\Console\Kernel;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Foundation\Testing\TestCase as LaravelTestCase;

class TestCase extends LaravelTestCase {

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
		$app->make(Kernel::class)->bootstrap();
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
	 * @return $this
	 */
	protected function checkIn($selector, array $contains, array $notContains) {
		$html = $this->crawler->filter($selector)->html();
		$this->containsIn($html, $contains)->notContainsIn($html, $notContains);
		return $this;
	}

	/**
	 * Test whether the raw text contains given list of elements.
	 * @param $html
	 * @param array $contents
	 * @return $this
	 */
	protected function containsIn ($html, array $contents) {
		foreach ($contents as $content) {
			$this->assertContains($content, $html);
		}
		return $this;
	}

	/**
	 * Test whether the raw text does not contain given list of elements.
	 * @param $html
	 * @param array $notContents
	 * @return $this
	 */
	protected function notContainsIn ($html, array $notContents) {
		foreach ($notContents as $notContent) {
			$this->assertNotContains($notContent, $html);
		}
		return $this;
	}

    /**
     * Extract all elements from given crawler using specified closure selector.
     * @param $from
     * @param Closure $selector
     * @return array selection
     */
	protected function extractAllElements(Crawler $from, Closure $selector) {
		$selection = [];
		$from->each(function ($node) use (&$selector, &$selection) {
			$selection[] = $selector($node);
		});
		return $selection;
	}

    /**
     * Extract all string url from current page.
     */
    protected function extractAllLinks() {
        $linksCrawler = $this->crawler->filter('a');
        $links = self::extractAllElements($linksCrawler, function(Crawler $node) {
            return $node->attr("href");
        });
        $localLinks = array_filter($links, function($e) {
            return strpos($e, config('app.url')) !== false;
        });
        return array_unique($localLinks);
    }
}
