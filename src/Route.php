<?php

namespace mOsz\Router;

class Route
{
	/**
	 *	@var string 
	 **/
	private $path;

	/**
	 *  @var callable
	 **/
	private $callback;

	/**
	 * @var array<type>
	 **/
	private $matches = [];

	/**
	 * @var array<string>
	 **/
	private $params = [];

	public function __construct($path, $callback) {
		$this->path = trim($path, '/');
		$this->callback = $callback;
	}

	public function match($url) {
		$url = trim($url, '/');
		$path = preg_replace("#{([\w]+)}#", "([^/]+)", $this->path);
		$regex = "#^$path$#i";
		if (!preg_match($regex, $url, $matches)) {
			return false;
		}
		$this->matches = $matches;
		return true;
	}

	public function setPath($path) {
		$this->path = $path;
	}

	public function getPath() {
		return $this->path;
	}

	public function callback() {
		call_user_func_array($this->callback, $this->matches);
	}
}
