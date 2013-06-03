<?php
/**
*	A simple wrapper class for easily hack any security restriction of an object.
*
*	@namespace Hacking
*	@filesource AllowAccessWrapper.php
*
*	@author Copyright (c) 2013 Alejandro D. Carraretto <ceo@consultora54.com>
*	@license GPLv3 (http://www.gnu.org/licenses/agpl-3.0.html)
*
********************************************************************/

namespace Hacking ;

use ReflectionObject ;

/**
*	@name AllowAccessWrapper class.
*	@version 0.1.0
*/
class AllowAccessWrapper
{
	/**
	*	@var Object to wrap.
	*/
	protected $wrapped ;

	/**
	*	@var ReflectionClass object.
	*/
	protected $reflect ;

	/**
	*	Constructor.
	*
	*	@param An object instance.
	*/
	public function __construct( $object )
	{
		$this->wrapped = $object ;
		$this->reflect = new ReflectionObject( $object ) ;
	}

	/**
	*	Sets a value to inaccessible members. (using php setter method)
	*	Do not call this method. This is a PHP magic method that we override.
	*/
	public function __set( $name, $value )
	{
		$property = $this->reflect->getProperty( $name ) ;

		$property->setAccessible( true ) ;
		$property->setValue( $this->wrapped, $value ) ;
	}

	/**
	*	Gets a value from a inaccessible members. (using php getter method)
	*	Do not call this method. This is a PHP magic method that we override.
	*
	*	@return Mixed value.
	*/
	public function __get( $name )
	{
		$property = $this->reflect->getProperty( $name ) ;
		$property->setAccessible( true ) ;

		return $property->getValue( $this->wrapped ) ;
	}

	/**
	*	Check if set a inaccessible member.
	*	Do not call this method. This is a PHP magic method that we override.
	*/
	public function __isset( $name )
	{
		if ( $this->reflect->hasProperty( $name ) )
		{
			return ( $this->__get( $name ) !== null ) ;
		}

		return false ;
	}

	/**
	*	Invoke all inaccessible methods in wrapped object.
	*	Do not call this method. This is a PHP magic method that we override.
	*/
	public function __call( $name, $args )
	{
		$method = $this->reflect->getMethod( $name ) ;
		$method->setAccessible( true ) ;

		return $method->invokeArgs( $this->wrapped, $args ) ;
	}
}

/*******************************************************************/
