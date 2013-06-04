<?php
/**
*	Class for easily read all attributes into comments header.
*
*	@namespace Reflection
*	@filesource AnnotationReader.php
*
*	@author Copyright (c) 2013 Alejandro D. Carraretto <ceo@consultora54.com>
*	@license GPLv3 (http://www.gnu.org/licenses/agpl-3.0.html)
*
********************************************************************/

namespace Reflection ;

/**
*	@name AnnotationReader class.
*	@version 0.1.0
*/
class AnnotationReader
{
	/**
	*	@var String attribute prefix.
	*/
	protected $prefix = '' ;

	/**
	*	Constructor.
	*
	*	@param Optional string annotation prefix.
	*/
	public function __construct( $prefix = '@@' )
	{
		$this->prefix = $prefix ;
	}

	/**
	*	Sets the annotation prefix.
	*
	*	@param String prefix.
	*/
	public function setPrefix( $prefix )
	{
		$this->prefix = $prefix ;
	}

	/**
	*	Extract metadata from a class.
	*
	*	@param String class name or an object instance.
	*	@return Array value.
	*/
	public function getClassAnnotations( $class )
	{
		$ref = new ClassReflection( $class ) ;

		return $ref->getAnnotations( $this->prefix ) ;
	}

	/**
	*	Extract metadata from a class method.
	*
	*	@param String class name or an object instance.
	*	@param String method name.
	*	@return Array value.
	*/
	public function getMethodAnnotations( $class, $method )
	{
		$ref = new MethodReflection( $class, $method ) ;

		return $ref->getAnnotations( $this->prefix ) ;
	}

	/**
	*	Extract metadata from a class property.
	*
	*	@param String class name or an object instance.
	*	@param String property name.
	*	@return Array value.
	*/
	public function getPropertyAnnotations( $class, $property )
	{
		$ref = new PropertyReflection( $class, $property ) ;

		return $ref->getAnnotations( $this->prefix ) ;
	}

	/**
	*	Extract metadata from a function.
	*
	*	@param String function name.
	*	@return Array value.
	*/
	public function getFunctionAnnotations( $name )
	{
		$ref = new FunctionReflection( $name ) ;

		return $ref->getAnnotations( $this->prefix ) ;
	}
}

/*******************************************************************/
