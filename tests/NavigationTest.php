<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NavigationTest extends TestCase {

    public function testWelcomeScreen() {

        $contents = [
            "EPFL",
            "étudiant",
        ];

        $this->visit('/')->seeAll($contents);
        $this->hasVisitorMenu();

    }

    private function hasVisitorMenu() {
        $contains = self::navTrans(["home", "newjob", "help", "connect"]);
        $notContains = self::navTrans(["myjobs", "moderation", "options", "disconnect"]);
        $this->checkIn(".computer.tablet.only.menu", $contains, $notContains);
    }

    private function hasPublisherMenu() {
        $contains = self::navTrans(["home", "newjob", "myjobs", "help", "connect"]);
        $notContains = self::navTrans(["moderation", "options", "disconnect"]);
        $this->checkIn(".computer.tablet.only.menu", $contains, $notContains);
    }

    private function hasUserMenu() {
        $contains = self::navTrans(["home", "newjob", "myjobs", "options", "help", "disconnect"]);
        $notContains = self::navTrans(["moderation", "connect"]);
        $this->checkIn(".computer.tablet.only.menu", $contains, $notContains);
    }

    private function hasAdminMenu() {
        $contains = self::navTrans(["home", "newjob", "myjobs", "moderation", "options", "help", "disconnect"]);
        $notContains = self::navTrans(["connect"]);
        $this->checkIn(".computer.tablet.only.menu", $contains, $notContains);
    }

    private static function navTrans(array $navs) {
        return array_map(function($nav) {
            return trans('general.nav.' . $nav);
        }, $navs);
    }

}
