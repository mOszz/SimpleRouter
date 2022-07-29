<?php

namespace mOsz\Router;

use mOsz\Router\Route;

class Router 
{

	/**
	 * @var string
	 **/
	protected $url;

	/**
	 * @var array<object>
	 **/
	protected $routes = [];

	public function __construct($url) {
		if ($_SERVER['REQUEST_METHOD'] === '') {
			throw new \Exception('No method found');
		}
		$this->url = $url;
	}

	public function get($path, $callback) {
		$route = new Route($path, $callback);
		$this->routes[] = $route;
		return $route;
	}

	public function post($path, $callback){
		$route = new Route($path, $callback);
		$this->routes[] = $route;
		return $route;
	}

	public function run() {
		foreach ($this->routes as $route) {
			if ($route->match($this->url)) {
				return $route->callback();
			}
		}
	}
}
