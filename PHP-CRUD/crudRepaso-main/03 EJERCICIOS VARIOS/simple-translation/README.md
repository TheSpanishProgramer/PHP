## SimpleTranslation
* Link: [PHP guay](http://www.youtube.com/watch?v=Hj_E0Wk2lNE&list=PLYIi2QEAbhW61xT5SpgVYH1tqBhQM7fC9)
* Version: 1.0.0
First of all, you need to create your dictionaries in PHP array format somewhere in your application's directory structure. 

For example:

`lang/es.php`


    include_once 'SimpleTranslation/Translate.php';
	use \SimpleTranslation\Translate;
	Translate::init('es', __DIR__ . "/lang/es.php");

Now you are ready to easily translate!:

    echo Translate::__('home');
    echo Translate::__('about');
