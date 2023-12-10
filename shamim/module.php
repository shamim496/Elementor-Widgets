<?php
namespace ElementPack\Modules\Shamim;

use ElementPack\Base\Element_Pack_Module_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Module extends Element_Pack_Module_Base {

	public function get_name() {
		return 'shamim';
	}

	public function get_widgets() {

		$widgets = [
			'Shamim',
		];

		return $widgets;
	}
}
