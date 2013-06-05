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
*	@version 0.1.2
*/
trait TAttribute
{
	/**
	*	Gets all attributes in a documentation block.
	*
	*	@param Optional string attribute prefix.
	*	@return Array value.
	*/
	public function getAttributes( $prefix = '@' )
	{
		return static::extractAttributes( $this->getDocComment(), $prefix ) ;
	}

	/**
	*	Gets all annotation in a documentation block.
	*
	*	@param Optional string annotation prefix.
	*	@return Array value.
	*/
	public function getAnnotations( $prefix = '@@' )
	{
		return static::extractAnnotations( $this->getDocComment(), $prefix ) ;
	}

	/**
	*	Gets all attributes from the first documentation block.
	*
	*	@param Optional string attribute prefix.
	*	@return Array value.
	*/
	public function getFileAttributes( $prefix = '@' )
	{
		if ( is_file( $file = $this->getFileName() ) )
		{
			$tokens = token_get_all( file_get_contents( $file ) ) ;

			foreach( $tokens as $token )
			{
				if ( $token[ 0 ] == T_DOC_COMMENT )
				{
					return static::extractAttributes( $token[ 1 ], $prefix ) ;
				}
			}
		}

		return [] ;
	}

	/**
	*	Gets all annotations from the first documentation block.
	*
	*	@param Optional string annotation prefix.
	*	@return Array value.
	*/
	public function getFileAnnotations( $prefix = '@@' )
	{
		if ( is_file( $file = $this->getFileName() ) )
		{
			$tokens = token_get_all( file_get_contents( $file ) ) ;

			foreach( $tokens as $token )
			{
				if ( $token[ 0 ] == T_DOC_COMMENT )
				{
					return static::extractAnnotations( $token[ 1 ], $prefix ) ;
				}
			}
		}

		return [] ;
	}

	/**
	*	Extract all attributes from the first documentation block.
	*
	*	@param String as documentation style.
	*	@param Optional string attribute prefix.
	*	@return Array value.
	*/
	public static function extractAttributes( $doc, $prefix = '@' )
	{
		$attributes = [] ;
		$regexp = "/\s{$prefix}(\w+)\s+(.+)/u" ;

		preg_match_all( $regexp, $doc, $matches, PREG_SET_ORDER ) ;

		foreach ( $matches as $match )
		{
			$attributes[ $match[ 1 ] ] = trim( $match[ 2 ] ) ;
		}

		return $attributes ;
	}

	/**
	*	Extract all annotations from the first documentation block.
	*
	*	@param String as documentation style.
	*	@param Optional string annotation prefix.
	*	@return Array value.
	*/
	public static function extractAnnotations( $doc, $prefix = '@@' )
	{
		$annotations = [] ;
		$regexp = "/\s{$prefix}(\w+)\((.+)\)/u" ;

		preg_match_all( $regexp, $doc, $matches, PREG_SET_ORDER ) ;

		foreach ( $matches as $match )
		{
			$params = [] ;

			foreach ( explode( ',', $match[ 2 ] ) as $param )
			{
				$param = explode( '=', $param ) ;

				if ( count( $param ) == 2 ) // if "name=value" format.
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
