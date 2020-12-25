<?php

namespace OCA\SqreenSDK\Tests\Integration\Controller;

use OCP\AppFramework\App;
use Test\TestCase;


class AppTest extends TestCase {

    private $container;

    public function setUp(): void {
        parent::setUp();
        $app = new App('sqreen_sdk');
        $this->container = $app->getContainer();
    }

    public function testAppInstalled(): void {
        $appManager = $this->container->query('OCP\App\IAppManager');
        $this->assertTrue($appManager->isInstalled('sqreen_sdk'));
    }

}
