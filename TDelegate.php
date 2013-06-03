<?php
/**
*	Trait with common more features for use in some Reflection classes.
*
*	@namespace Reflection
*	@filesource TDelegate.php
*
*	@author Copyright (c) 2013 Alejandro D. Carraretto <ceo@consultora54.com>
*	@license GPLv3 (http://www.gnu.org/licenses/agpl-3.0.html)
*
********************************************************************/

namespace Reflection ;

/**
*	@name TDelegate trait.
*	@version 0.1.0
*/
trait TDelegate
{
	/**
	*	Gets the ancestors from a class.
	*
	*	@return Array of ClassReflection objects.
	*/
	public function getAncestors()
	{
		$ancestors = [] ;
		$parent = $this->getParentClass() ;

		while ( $parent )
		{
			$ancestors[] = new ClassReflection( $parent->getName() ) ;
			$parent = $parent->getParentClass() ;
		}

		return $ancestors ;
	}

	/**
	*	Gets a interface reflection.
	*
	*	@param String name.
	*	@return InterfaceReflection object.
	*/
	public function getInterface( $name )
	{
		return new InterfaceReflection( $name ) ;
	}

	/**
	*	Gets all interfaces implemented in ancestors.
	*
	*	@return Array of ClassReflection objects.
	*/
	public function getInterfaces()
	{
		$interfaces = [] ;

		foreach ( parent::getInterfaceNames() as $interface )
		{
			$interfaces[] = $this->getInterface( $interface ) ;
		}

		return $interfaces ;
	}

	/**
	*	Gets a method reflection.
	*
	*	@param String name.
	*	@return MethodReflection object.
	*/
	public function getMethod( $name )
	{
		return new MethodReflection( $this->getName(), $name ) ;
	}

	/**
	*	Gets all method implemented in ancestors.
	*
	*	@return Array value.
	*/
	public function getMethods()
	{
		$methods = [] ;

		foreach ( parent::getMethods() as $method )
		{
			$methods[] = $this->getMethod( $method->getName() ) ;
		}

		return $methods ;
	}

	/**
	*	Gets a property reflection.
	*
	*	@param String name.
	*	@return PropertyReflection object.
	*/
	public function getProperty( $name )
	{
		return new PropertyReflection( $this->getName(), $name ) ;
	}

	/**
	*	Gets all properties in ancestors.
	*
	*	@param Optional constant for filter by type.
	*	@return Array of PropertyReflection objects.
	*/
	public function getProperties( $filter = 9999 )
	{
		$properties = [] ;

		foreach ( parent::getProperties( $filter ) as $property )
		{
			$properties[] = $this->getProperty( $property->getName() ) ;
		}

		return $properties ;
	}

	/**
	*	Gets a trait reflection.
	*
	*	@param String name.
	*	@return TraitReflection object.
	*/
	public function getTrait( $name )
	{
		return new TraitReflection( $name ) ;
	}

	/**
	*	Gets all traits used in ancestors.
	*
	*	@param Optional boolean if also included the ancestors.
	*	@return Array of ClassReflection objects.
	*/
	public function getTraits()
	{
		$traits  = [] ;
		$classes = array_merge( $this->getAncestors(), [ $this ] ) ;

		foreach ( $classes as $class )
		{
			foreach ( $class->getTraitNames() as $name )
			{
				$traits[] = $this->getTrait( $name ) ;
			}
		}

		return $traits ;
	}
}

/*******************************************************************/
