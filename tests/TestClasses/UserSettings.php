<?php
namespace jrmadsen67\MahanaBitmap\Test\TestClasses;

require __DIR__ . '/../../src/MahanaBitfield.php';

// use jrmadsen67\MahanaBitfield\MahanaBitfield as MB;

class UserSettings extends \jrmadsen67\MahanaBitfield\MahanaBitfield {

	public $flags = [
		'flag1' => 0,
		'flag2' => 1,
		'flag3' => 2,
	];

}