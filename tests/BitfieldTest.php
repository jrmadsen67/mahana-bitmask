<?php
namespace League\MahanaBitfield\Test;

use League\MahanaBitfield\Test\TestClasses\UserSettings;

class BitfieldTest extends \PHPUnit_Framework_TestCase {

	function test_assert_true_is_true()
    {
		$this->assertTrue(true);
	}

	function test_single_value_set_true_is_correct_setting()
    {
		$userSettings = new UserSettings;
		$userSettings->flag1 = true;

		$setting = $userSettings->getValue();

		$this->assertEquals(1, $setting);
	}

	function test_all_flags_set_is_correct_value()
    {
		$userSettings = new UserSettings;

		$userSettings->flag1 = true;
		$userSettings->flag2 = false;
		$userSettings->flag3 = true;

		$setting = $userSettings->getValue();

		$this->assertEquals(5, $setting);
	}

	function test_set_flags_works_on_whole_array()
    {
		$userSettings = new UserSettings;

		$userSettings->setFlags([
			'flag1' => false,
			'flag2' => true,
			'flag3' => false,
		]);

		$setting = $userSettings->getValue();

		$this->assertEquals(2, $setting);
	}

	function test_set_flags_works_on_partial_array()
    {
		$userSettings = new UserSettings;

		$userSettings->setFlags([
			'flag2' => true,
			'flag3' => true,
		]);

		$setting = $userSettings->getValue();

		$this->assertEquals(6, $setting);
	}

	function test_get_flags_works_on_array()
    {
		$userSettings = new UserSettings;

		$userSettings->setFlags([
			'flag2' => true,
			'flag3' => true,
		]);

		$setting_array = $userSettings->getFlags();

		$expected = [
			'flag1' => false,
			'flag2' => true,
			'flag3' => true,
		];

		$this->assertEquals($expected, $setting_array);
	}

	function test_set_flags_twice_preserves_array()
    {
		$userSettings = new UserSettings;

		$userSettings->setFlags([
			'flag2' => true,
			'flag3' => true,
		]);

		$userSettings->setFlags([
			'flag1' => true,
			'flag2' => false,
		]);

		$setting_array = $userSettings->getFlags();

		$expected = [
			'flag1' => true,
			'flag2' => false,
			'flag3' => true,
		];

		$this->assertEquals($expected, $setting_array);
	}
}