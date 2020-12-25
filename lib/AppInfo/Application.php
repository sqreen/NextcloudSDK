<?php

declare(strict_types=1);

namespace OCA\SqreenSDK\AppInfo;

use OCP\AppFramework\App;
use OCP\EventDispatcher\IEventDispatcher;
use OC\Authentication\Events\LoginFailed;
use OCP\User\Events\PostLoginEvent;
use OCP\User\Events\UserCreatedEvent;
use OCP\User\Events\PasswordUpdatedEvent;
use OCP\User\Events\UserLoggedInWithCookieEvent;


class Application extends App {

    public const APP_ID = 'sqreen_sdk';

    public function __construct(array $urlParams = []) {
        parent::__construct(self::APP_ID, $urlParams);
        $dispatcher = $this->getContainer()->query(IEventDispatcher::class);
        $dispatcher->addListener(LoginFailed::class, function(LoginFailed $event) {
            \sqreen\auth_track(false, ['uid' => $event->getLoginName()]);
        });
        $dispatcher->addListener(PostLoginEvent::class, function(PostLoginEvent $event) {
            \sqreen\auth_track(true, ['uid' => $event->getUser()->getUid()]);
        });

        $dispatcher->addListener(UserCreatedEvent::class, function(UserCreatedEvent $event) {
            \sqreen\signup_track(['uid' => $event->getUid()]);
        });
        $dispatcher->addListener(PasswordUpdatedEvent::class, function(PasswordUpdatedEvent $event) {
            \sqreen\track('users.password.updated', [
                'user_identifiers' => ['uid' => $event->getUser()->getUID()]
            ]);
        });
    }
}
