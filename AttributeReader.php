<?php
/**
*	Class for easily read all attributes into comments header.
*
*	@namespace Reflection
*	@filesource AttributeReader.php
*
*	@author Copyright (c) 2013 Alejandro D. Carraretto <ceo@consultora54.com>
*	@license GPLv3 (http://www.gnu.org/licenses/agpl-3.0.html)
*
********************************************************************/

namespace Reflection ;

/**
*	@name AttributeReader class.
*	@version 0.1.1
*/
class AttributeReader extends Core\ObjectBase
{
	/**
	*	@var String attribute prefix.
	*/
	protected $prefix = '' ;

	/**
	*	Constructor.
	*
	*	@param Optional string attribute prefix.
	*/
	public function __construct( $prefix = '@' )
	{
		$this->prefix = $prefix ;
	}

	/**
	*	Sets the attribute prefix.
	*
	*	@param String prefix.
	*/
	public function setPrefix( $prefix )
	{
		$this->prefix = $prefix ;
	}

	/**
	*	Extract metadata from a source file.
	*
	*	@param String class name or an object instance.
	*	@return Array value.
	*/
	public function getFileAttributes( $class )
	{
		$ref = new ClassReflection( $class ) ;

		return $ref->getFileAttributes( $this->prefix ) ;
	}

	/**
	*	Extract metadata from a class.
	*
	*	@param String class name or an object instance.
	*	@return Array value.
	*/
	public function getClassAttributes( $class )
	{
		$ref = new ClassReflection( $class ) ;

		return $ref->getAttributes( $this->prefix ) ;
	}

	/**
	*	Extract metadata from a class method.
	*
	*	@param String class name or an object instance.
	*	@param String method name.
	*	@return Array value.
	*/
	public function getMethodAttributes( $class, $method )
	{
		$ref = new MethodReflection( $class, $method ) ;

		return $ref->getAttributes( $this->prefix ) ;
	}

	/**
	*	Extract metadata from a class property.
	*
	*	@param String class name or an object instance.
	*	@param String property name.
	*	@return Array value.
	*/
	public function getPropertyAttributes( $class, $property )
	{
		$ref = new PropertyReflection( $class, $property ) ;

		return $ref->getAttributes( $this->prefix ) ;
	}

	/**
	*	Extract metadata from a function.
	*
	*	@param String function name.
	*	@return Array value.
	*/
	public function getFunctionAttributes( $name )
	{
		$ref = new FunctionReflection( $name ) ;

		return $ref->getAttributes( $this->prefix ) ;
	}
}

/*******************************************************************/
