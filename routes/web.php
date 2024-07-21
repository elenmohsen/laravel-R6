<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClassController;

Route::get('login', [ExampleController::class, 'login']);
Route::post('data', function () {
    return "data entered successful";
})->name('data');


Route::get('cv', [ExampleController::class, 'cv']);
Route::get('contactus', [ExampleController::class, 'contactus']);
Route::post('personaldata', [ExampleController::class, 'personaldata'])->name('personaldata');

Route::get('cars/create', [CarController::class, 'create'])->name('cars.create');
Route::post('cars', [CarController::class, 'store'])->name('cars.store');

Route::get('classes/create', [classController::class, 'create'])->name('class.create');
Route::post('classes', [ClassController::class, 'store'])->name('classes.store');

Route::get('/', function () {
    return view('welcome');
});

/*Route::post('personaldata', function () {
    return "data entered successful";
})->name('personaldata');*/


/*Route::post('personaldata', function () {
    return "data entered successful";
})->name('personaldata');*/




/*Route::get('link', function () {
    $url = route('w');
    return "<a href='$url'>go to welcome</a>";
});*/


/*Route::get('/w', function () {
return "hello laravel!!";
});*/

/*Route::get('/cars/{id?}', function ($id=0) {
return "car number is ". $id;
})->whereNumber('id');

Route::get('/users/{name}/{age?}', function ($name,$age=0) {
if($age==0)
return "username is ". $name ;
else
return "username is ". $name ." and age is " .$age ;
})->where([
'name'=>'[a-zA-Z]+',
'age'=>'[0-9]+'
]);*/

/*Route::get('/car/{name}', function ($name) {
return "name is ". $name;
})->whereIn('name',['BMW','Nissan']);*/

/*Route::prefix('company')->group(function () {
Route::get('', function () {
return 'company index';
});
Route::get('users', function () {
return 'company user';
});
Route::get('it', function () {
return 'company it';
});
});*/

//task 2
/*Route::prefix('accounts')->group(function () {
    Route::get('', function () {
        return 'They are accounts';
    });
    Route::get('admin', function () {
        return 'They are accounts admin';
    });
    Route::get('user', function () {
        return 'They are accounts user';
    });
});

Route::prefix('cars')->group(function () {
    Route::get('', function () {
            return "cars index";
        });
    Route::prefix('/usa')->group(function () {
        Route::get('ford', function () {
            return 'there are usa ford cars';
        });
        Route::get('tesla', function () {
            return 'there are usa tesla cars';
        });
    });
    Route::prefix('/ger')->group(function () {
        Route::get('mercedes', function () {
            return 'There are  mercedes cars';
        });
        Route::get('audi', function () {
            return 'there are audi cars';
        });
        Route::get('volkswagen', function () {
            return 'there are volkswagen cars';
        });
    });

});*/

   /* Route::fallback(function() {
        return redirect('/');
    });*/
