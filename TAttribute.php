<?php
/**
*	More features for use as plugin for any other reflection classes.
*
*	@namespace Reflection
*	@filesource TAttribute.php
*
*	@author Copyright (c) 2013 Alejandro D. Carraretto <ceo@consultora54.com>
*	@license GPLv3 (http://www.gnu.org/licenses/agpl-3.0.html)
*
********************************************************************/

namespace Reflection ;

/**
*	@name TAttribute trait.
*	@version 0.1.1
*/
trait TAttribute
{
	/**
	*	Extract @attributes from the documentation header.
	*
	*	@param Optional string attribute prefix.
	*	@return Array value.
	*/
	public function getAttributes( $prefix = '@' )
	{
		$attributes = [] ;
		$regexp = "/{$prefix}(\w+)\s+(.+)/u" ;

		preg_match_all( $regexp, $this->getDocComment(), $matches, PREG_SET_ORDER ) ;

		foreach ( $matches as $match )
		{
			$attributes[ $match[ 1 ] ] = trim( $match[ 2 ] ) ;
		}

		return $attributes ;
	}

	/**
	*	Extract @@annotations from the documentation header.
	*
	*	@param Optional string annotation prefix.
	*	@return Array value.
	*/
	public function getAnnotations( $prefix = '@@' )
	{
		$annotations = [] ;
		$regexp = "/{$prefix}(\w+)\((.+)\)/u" ;

		preg_match_all( $regexp, $this->getDocComment(), $matches, PREG_SET_ORDER ) ;

		foreach ( $matches as $match )
		{
			$params = [] ;

			foreach ( explode( ',', $match[ 2 ] ) as $param )
			{
				$param = explode( '=', $param ) ;

				if ( count( $param ) == 2 ) // if name=value type.
				{
					$params[ trim( $param[ 0 ] ) ] = trim( $param[ 1 ] ) ;
				}
				else $params[] = trim( $param[ 0 ] ) ;
			}

			$annotations[ $match[ 1 ] ] = $params ;
		}

		return $annotations ;
	}
}

/*******************************************************************/
