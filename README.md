What is New PHP Reflection?
-------------------------------

New PHP Reflection implementation with more features for a more professional experience.

------------
Requirements
------------

Only supported on PHP 5.4 and up.

------------
Installation
------------

Use a simple #require or any autoload methods.

-------------
Documentation
-------------

Example to use:
<pre>
// For some demos.
interface ICore {}
trait TCore {}

class Father implements ICore
{
	use TCore ;
}

/**
*	Lipsum...
*	@@hackeable yes
*/
class ExtemeParanoid extends Father
{
	private   $var1 = "I am Private" ;
	protected $var2 = "I am Protected" ;
	public    $var3 = "I am Public" ;

	/**
	*	Lipsum...
	*	@@serial 334-3434-2342
	*	@@checkable yes
	*/
	private function setVar1( $value )
	{
		$this->var1 = $value ;
	}
}

$paranoid = new ExtemeParanoid ;
//$paranoid->var2 = 'Please, allow me' ; // ERROR!

// Manage any pre-compiling or any other pre-checks.
$reflection = new ObjectReflection( $paranoid ) ;
$attributes = $reflection->getAttributes() ; // Also for the other types of reflections.

if ( $attributes\[ 'hackeable' \] == 'yes' )
{
	// Happy hacking!!! ;)
	$paranoid = new AllowAccessWrapper( $paranoid ) ;
}

// Nude mode on!
$paranoid->var2 = 'Please, allow me' ; // NOW OK!
$paranoid->setVar1( 'Please, allow me' ) ; // OK too!

// Other example:
$attrReader = new AttributeReader ;

print_r( $attrReader->getMethodAttributes( 'ExtemeParanoid', 'setVar1' ) ) ;

// ... and more.
print_r( $reflection->getAncestors() ) ;
print_r( $reflection->getInterfaces() ) ;
print_r( $reflection->getTraits() ) ;
</pre>
------------
Contributing
------------

TODO...
