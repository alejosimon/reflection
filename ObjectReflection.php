<?php
/**
*	A simple extension of the "PHP ReflectionObject" with more features.
*
*	@namespace Reflection
*	@filesource ReflectionObject.php
*
*	@author Copyright (c) 2013 Alejandro D. Carraretto <ceo@consultora54.com>
*	@license GPLv3 (http://www.gnu.org/licenses/agpl-3.0.html)
*
********************************************************************/

namespace Reflection ;

use ReflectionObject ;

/**
*	@name ObjectReflection class.
*	@version 0.1.0
*/
class ObjectReflection extends ReflectionObject
{
	use TAttribute, TDelegate ;
}

/*******************************************************************/
