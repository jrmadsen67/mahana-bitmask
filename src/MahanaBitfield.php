<?php
namespace jrmadsen67\MahanaBitfield;

abstract class MahanaBitfield {

	private $value;

	protected $flags = [];

	public function __construct($value = 0) {

		if (count($this->flags) > 31) {
			throw new \Exception('Cannot use more than 31 flags');
		}

		$this->value = $value;
	}

	public function getValue() {
		return $this->value;
	}

	public function __get($n) {
		return ($this->value & (1 << $this->flags[$n])) != 0;
	}

	public function __set($n, $new = true) {
		$this->value = ($this->value & ~(1 << $this->flags[$n])) | ($new << $this->flags[$n]);
	}

	public function clear($n) {
		$this->$n = false;
	}

	public function getFlags() {
		$flags = [];
		foreach ($this->flags as $key => $flag) {
			$flags[$key] = $this->$key;
		}

		return $flags;
	}

	public function setFlags($flags) {
		foreach ($flags as $flag => $value) {
			$this->$flag = $value;
		}

		return $this->getValue();
	}
}