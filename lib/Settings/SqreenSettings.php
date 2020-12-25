<?php

namespace OCA\SqreenSDK\Settings;

use OCP\AppFramework\Http\TemplateResponse;
use OCP\Settings\ISettings;

class SqreenSettings implements ISettings {

	public function getForm() {
		return new TemplateResponse('sqreen_sdk', 'setting');
	}

	public function getSection() {
		return 'security';
	}

	public function getPriority() {
		return 50;
	}
}
