<?php
namespace League\MahanaBitfield\Test\TestClasses;

require __DIR__ . '/../../src/MahanaBitfield.php';

use League\MahanaBitfield\MahanaBitfield;

class UserSettings extends MahanaBitfield {

	public $flags = [
		'flag1' => 0,
		'flag2' => 1,
		'flag3' => 2,
	];

}