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

    public function testHomeVisitorStayVisitor() {
        $this->visit(action(config("myjob.routes.home")))->visitorStaysVisitor();
    }

    public function testNewJobVisitorStayVisitor() {
        $this->visit(action(config("myjob.routes.newjob")))->visitorStaysVisitor();
    }

    public function testHelpVisitorStayVisitor() {
        $this->visit(action(config("myjob.routes.help")))->visitorStaysVisitor();
    }

    private function visitorStaysVisitor() {
        foreach ($this->extractAllLinks() as $link) {
            try {
                $this->visit($link);
                $this->hasVisitorMenu();
            } catch (Exception $ignored) {} // does want to connect through Tequila (give 404)
        }
    }

    private function hasVisitorMenu() {
        $contains = self::navTrans(["home", "newjob", "help", "connect"]);
        $notContains = self::navTrans(["myjobs", "moderation", "options", "disconnect"]);
        $this->checkIn(".computer.tablet.only.menu", $contains, $notContains);
        return $this;
    }

    private function hasPublisherMenu() {
        $contains = self::navTrans(["home", "newjob", "myjobs", "help", "connect"]);
        $notContains = self::navTrans(["moderation", "options", "disconnect"]);
        $this->checkIn(".computer.tablet.only.menu", $contains, $notContains);
        return $this;
    }

    private function hasUserMenu() {
        $contains = self::navTrans(["home", "newjob", "myjobs", "options", "help", "disconnect"]);
        $notContains = self::navTrans(["moderation", "connect"]);
        $this->checkIn(".computer.tablet.only.menu", $contains, $notContains);
        return $this;
    }

    private function hasAdminMenu() {
        $contains = self::navTrans(["home", "newjob", "myjobs", "moderation", "options", "help", "disconnect"]);
        $notContains = self::navTrans(["connect"]);
        $this->checkIn(".computer.tablet.only.menu", $contains, $notContains);
        return $this;
    }

    private static function navTrans(array $navs) {
        return array_map(function($nav) {
            return trans('general.nav.' . $nav);
        }, $navs);
    }

}
