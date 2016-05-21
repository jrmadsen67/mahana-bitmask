<?php
namespace jrmadsen67\MahanaBitmap\Test;

use jrmadsen67\MahanaBitmap\Test\TestClasses\UserSettings;

class BitfieldTest extends \PHPUnit_Framework_TestCase {
	function test_assert_true_is_true() {
		$this->assertTrue(true);
	}

	function test_single_true_is_correct_value() {
		$userSettings = new UserSettings;
		$userSettings->flag1 = true;

		$value = $userSettings->getValue();

		$this->assertEquals(1, $value);
	}

}