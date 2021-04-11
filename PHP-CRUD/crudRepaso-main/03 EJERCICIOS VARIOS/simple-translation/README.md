## SimpleTranslation* Author: Jordi Bassagañas, [programarivm.com](http://programarivm.com)
* Link: [PHP guay](http://www.youtube.com/watch?v=Hj_E0Wk2lNE&list=PLYIi2QEAbhW61xT5SpgVYH1tqBhQM7fC9)
* Version: 1.0.0* License: MIT### Features- This component is intended for handling translations.- For now, it's really simple! It only works with PHP arrays.- It may be extended to work with other formats: csv, ini, xml, mo, etc.### Changelog* 1.0.0 first release.### InstallCopy the `simple-translation` directory into your `vendor` directory.### Setup
First of all, you need to create your dictionaries in PHP array format somewhere in your application's directory structure. 

For example:

`lang/es.php`
    return array(        'home' => 'inicio',        'about' => 'sobre nosotros',        'contact' => 'contacto'    );`lang/fr.php`    return array(        'home' => 'accueil',        'about' => 'à propos',        'contact' => 'contact'    );Then, include the `\SimpleTranslation\Translate.php` class and initialize it by both setting the target locale and the target dictionary:

    include_once 'SimpleTranslation/Translate.php';
	use \SimpleTranslation\Translate;
	Translate::init('es', __DIR__ . "/lang/es.php");

Now you are ready to easily translate!:

    echo Translate::__('home');
    echo Translate::__('about');

