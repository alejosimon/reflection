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

class Core implements ICore
{
	use TCore ;
}

/**
*	Lipsum...
*	@demo yes
*
*	@@CacheConditions( lifetime = 3600, forever = yes )
*	@@Licence( type = GPL, version = 3 )
*/
class Main extends Core
{
	/**
	*	Lipsum...
	*	@serial 334-3434-2342
	*	@key 12A34F5
	*/
	private function setVar( $value ) {}
}

$reflection = new ClassReflection( 'Main' ) ;

// Manage any pre-compiling or any other pre-checks, and others.
// Also for the other types of reflections.
$attributes = $reflection->getAttributes() ;
$annotations = $reflection->getAnnotations() ;

print_r( $attributes ) ;
print_r( $annotations ) ;

$app = ( $attributes[ 'demo' ] == 'yes' ) ? new DemoClass : new ProClass ;

// Other example:
$attrReader = new AttributeReader ;

print_r( $attrReader->getMethodAttributes( 'Main', 'setVar' ) ) ;

// ... and more.
print_r( $reflection->getAncestors() ) ;
print_r( $reflection->getInterfaces() ) ;
print_r( $reflection->getTraits() ) ;
</pre>
------------
Contributing
------------

TODO...
