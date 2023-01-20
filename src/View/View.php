<?php 
namespace Mono\View;


class View 
{
// First fun
public static function make($view, $params = [])
{
    $baseContent = self::getBaseContent();
    $viewContent = self::getViewContent($view, $params);
    return (str_replace('{{content}}', $viewContent, $baseContent));
}
// Second fun
protected static function getBaseContent()
{
    ob_start();
    include view_path() . 'layouts/main.php';
    return ob_get_clean();
}

// third fun
public static function makeError($error)
{
    self::getViewContent($error, true);
}


//Four fun            
protected static function getViewContent($view, $isError = false, $params = []){
$path = $isError ? view_path() . 'errors/' : view_path();

//Make if Conditions
if (str_contains($view, '.')) {
    $views = explode('.', $view);

    foreach ($views as $view) {
        if (is_dir($path . $view)) {
            $path = $path . $view . '/';
        }
    }
    $view = $path . end($views) . '.php';
} else {
    $view = $path . $view . '.php';
}
    extract($params);

    if ($isError) {
        include $view;
    } else {
        ob_start();
        include $view;
        return ob_get_clean();
    }
}
 

}//end class