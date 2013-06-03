<?php
/**
*	A simple extension of the "PHP ReflectionClass" with more features.
*
*	@namespace Reflection
*	@filesource ClassReflection.php
*
*	@author Copyright (c) 2013 Alejandro D. Carraretto <ceo@consultora54.com>
*	@license GPLv3 (http://www.gnu.org/licenses/agpl-3.0.html)
*
********************************************************************/

namespace Reflection ;

use ReflectionClass ;

/**
*	@name ClassReflection class.
*	@version 0.1.0
*/
class ClassReflection extends ReflectionClass
{
	use TAttribute, TDelegate ;
}

/*******************************************************************/
