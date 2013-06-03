<?php
/**
*	More features for use as plugin for any other reflection classes.
*
*	@namespace Reflection
*	@filesource ReflectionProperty.php
*
*	@author Copyright (c) 2013 Alejandro D. Carraretto <ceo@consultora54.com>
*	@license GPLv3 (http://www.gnu.org/licenses/agpl-3.0.html)
*
********************************************************************/

namespace Reflection ;

/**
*	@name TAttribute trait.
*	@version 0.1.0
*/
trait TAttribute
{
	/**
	*	Extract @attributes from the document type comments.
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
}

/*******************************************************************/
