<?php

use App\Http\Controllers\UsersController;
use Sharryy\App\Models\Pizza;
use Sharryy\App\Models\Payment;
use Illuminate\Support\Facades\Route;

spl_autoload_register(function ($name) {
    if (\Illuminate\Support\Str::startsWith($name, 'Sharryy')) {
        $stub = file_get_contents(app_path('facade.stub'));

        $namespace = str_replace('/', '\\', dirname(str_replace('\\', '/', $name)));
        $className = class_basename($name);
        $accessor = '\App\Models\\' . $className;

        $stub = str_replace(
            ['{namespace}', '{className}', '{accessor}'],
            [$namespace, $className, $accessor],
            $stub
        );

        file_put_contents($path = app_path("{$className}Facade.php"), $stub);

        require_once $path;
    }
});

Route::get('/', function () {
    return Pizza::eat();
});

Route::post('/user', [UsersController::class, 'store'])->name('user.store');

Route::post('/user/edit/{user}', [UsersController::class, 'update'])->name('user.update');

