<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\FashionController;



Route::get('/', function () {
    return view('welcome');
});

/*lesson1
Route::get('login', [ExampleController::class, 'login']);
Route::post('data', function () {
    return "data entered successful";
})->name('data');*/

/*lesson2
Route::get('cv', [ExampleController::class, 'cv']);
Route::get('contactus', [ExampleController::class, 'contactus']);
Route::post('personaldata', [ExampleController::class, 'personaldata'])->name('personaldata');*/



/*lesson 3,4,5
Route::post('personaldata', function () {
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


/* cars project
   Route::get('', [CarController::class, 'index'])->name('cars.index');
   Route::get('/create', [CarController::class, 'create'])->name('cars.create');
   Route::post('', [CarController::class, 'store'])->name('cars.store');
   Route::get('/{id}/edit', [CarController::class, 'edit'])->name('cars.edit');
   Route::put('/{id}', [CarController::class, 'update'])->name('cars.update');
   Route::get('/{id}/show', [CarController::class, 'show'])->name('cars.show');
   Route::get('/{id}/delete', [CarController::class, 'destroy'])->name('cars.destroy');
   Route::get('/trashed', [CarController::class, 'showDeleted'])->name('cars.showDeleted');
   Route::delete('cars/{id}/delete', [CarController::class, 'destroy'])->name('cars.destroy');
 //Route::patch('/{id}', [CarController::class, 'restore'])->name('cars.restore');
   Route::delete('/{id}/forcedelete', [CarController::class, 'forcedelete'])->name('cars.forcedelete');

   Route::prefix('cars')->controller(CarController::class)->as('cars.')->group(function(){


//Route::get('', [CarController::class, 'index'])->name('cars.index');
Route::get('','index')->name('index');
//Route::get('/create', [CarController::class, 'create'])->name('cars.create');
Route::get('/create', 'create')->name('create');
//Route::post('', [CarController::class, 'store'])->name('cars.store');
Route::post('', 'store')->name('store');
//Route::get('/{id}/edit', [CarController::class, 'edit'])->name('cars.edit');
Route::get('/{id}/edit','edit')->name('edit');
//Route::put('/{id}', [CarController::class, 'update'])->name('cars.update');
Route::put('/{id}','update')->name('update');
//Route::get('/{id}/show', [CarController::class, 'show'])->name('cars.show');
Route::get('/{id}/show','show')->name('show');
//Route::get('/{id}/delete', [CarController::class, 'destroy'])->name('cars.destroy');
Route::get('/{id}/delete','destroy')->name('destroy');
//Route::get('/trashed', [CarController::class, 'showDeleted'])->name('cars.showDeleted');
Route::get('/trashed','showDeleted')->name('showDeleted');
//Route::delete('cars/{id}/delete', [CarController::class, 'destroy'])->name('cars.destroy');
//Route::patch('/{id}', [CarController::class, 'restore'])->name('cars.restore');
Route::patch('/{id}','restore')->name('restore');
//Route::delete('/{id}/forcedelete', [CarController::class, 'forcedelete'])->name('cars.forcedelete');
Route::delete('/{id}/forcedelete','forcedelete')->name('forcedelete');

});*/


 //cars project

/*Route::group([
    'prefix' => 'cars',
    'controller' => CarController::class,
    'as' => 'cars.',
    'middleware' => 'verified'
], function() {

    Route::get('','index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('', 'store')->name('store');
    Route::get('/{id}/edit','edit')->name('edit');
    Route::put('/{id}','update')->name('update');
    Route::get('/{id}/show','show')->name('show');
    Route::get('/{id}/delete','destroy')->name('destroy');
    Route::get('/trashed','showDeleted')->name('showDeleted');
    Route::patch('/{id}','restore')->name('restore');
    Route::delete('/{id}/forcedelete','forcedelete')->name('forcedelete');
});*/




//classes project
 // Route::resource('classes', ClassController::class);

Route::group([
    'prefix' => 'classes',
    'controller' => ClassController::class,
    'as' => 'classes.'
], function() {

  Route::get('','index')->name('index');
  Route::get('/create', 'create')->name('create');
  Route::post('', 'store')->name('store');
  Route::get('/{id}/edit', 'edit')->name('edit');
  Route::put('/{id}', 'update')->name('update');
  Route::get('/{classes}/show', 'show')->name('show');
  Route::delete('/{id}/delete', 'destroy')->name('destroy');
  Route::get('/trashed', 'showDeleted')->name('showDeleted');
  Route::patch('/{id}', 'restore')->name('restore');
  Route::delete('/{id}/forcedelete', 'forcedelete')->name('forcedelete');
});
  
/*ExampleCOntroller
  Route::get('uploadform', [ExampleController::class, 'uploadform']);
  Route::post('uploadform', [ExampleController::class, 'upload'])->name('uploadimage');
  Route::get('index', [ExampleController::class, 'index'])->name('index');
*/

Route::get('about', [ExampleController::class, 'about'])->name('about');

Route::get('results', [ExampleController::class, 'studentresult']);

Route::get('testOneToOne', [ExampleController::class, 'test']);

/*Route::get('index', [ExampleController::class, 'contactusindex'])->name('contactus.index');
Route::get('contactus', [ExampleController::class, 'contactuscreate'])->name('contactus');
Route::post('contactus/store', [ExampleController::class, 'contactusstore'])->name('contactus.store');*/
    
//new project fashion


Route::group([
    'prefix' => 'products',
    'controller' => FashionController::class,
    'as' => 'product.'
], function() {
    
    
    Route::get('/index ', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('', 'store')->name('store');
    Route::get('', 'productshow')->name('productshow');
    Route::get('/{id}/show','show')->name('show');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::put('/{id}', 'update')->name('update');
});


Auth::routes(['verify'=> true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('contact-us', [App\Http\Controllers\MailController::class, 'viewForm']);
Route::post('contact-us', [App\Http\Controllers\MailController::class, 'sendEmail'])->name('sendEmail');
