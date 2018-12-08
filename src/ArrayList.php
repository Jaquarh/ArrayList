<?php

namespace Jaquarh\ArrayList;

use \Exception;

require_once 'ArrayListResult.php';

final class ArrayList
{
	private $array;

	public function __construct( $array )
	{
		if( !is_array( $array ) )
			throw new Exception('Parameter one expects an array datatype.');
		$this->array = $array;
	}
	
	public function add($value, $key = "") {
		if( empty( $key ) ) {
			$this->array[] = $value;
			return $this;
		}
		$this->array[$key] = $value;
		return $this;
	}

	public function where( $closure )
	{
		if( !is_callable( $closure ) )
			throw new Exception('Parameter one expects a closure datatype.');

		return new ArrayListResult( array_filter($this->array, $closure) );
	}

	public function whereKeys( $closure )
	{
		if( !is_callable( $closure ) )
			throw new Exception('Parameter one expects a closure datatype.');

		return new ArrayListResult( array_filter( array_keys( $this->array ), $closure ) );
	}
	
	public function get() {
		return $this->array;
	}
	
	public function isPresent()
	{
		return !empty( $this->array );
	}

	public function ifPresent( $closure )
	{
		if( !is_callable( $closure ) )
			throw new Exception('Parameter one expects a closure datatype.');

		if( $this->isPresent() )
		{
			call_user_func( $closure, $this->array );
		}
	}
}
