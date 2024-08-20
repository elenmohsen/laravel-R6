<h1>Middleware</h1>
is a bridge between http request and your application. In Laravel, including middleware for authentication and CSRF protection.<br><br>

<p>To create a new middleware, use the make:middleware Artisan command:

php artisan make:middleware <mark>Class Name</mark></p><hr>
<p><strong>Global Middleware</strong></p>
If you want a middleware to run during every HTTP request to your application, you may append it to the global middleware stack in your application's bootstrap/app.php file:<br><br>
use App\Http\Middleware\<mark>ClassName</mark>;
 
->withMiddleware(function (Middleware $middleware) {
     $middleware-><strong>append</strong>(EnsureTokenIsValid::class);
})
<br><br>
 The <strong>append</strong> method adds the middleware to the end of the list of global middleware. <strong>If you would like to add a middleware to the beginning of the list, you should use the prepend method.</strong><hr>
 <p><strong>Route Middleware</strong></p>
 If you would like to assign middleware to specific routes, you may invoke the middleware method when defining the route:<br><br>
 use App\Http\Middleware\<mark>ClassName</mark>;
 
Route::get('/profile', function () {
    // ...
})->middleware(<mark>ClassName</mark>::class);<br>
You may assign multiple middleware to the route by passing an array of middleware names to the middleware method:<br>
Route::get('/', function () {
    // ...
})->middleware([First::class, Second::class]);
<br><br>
The withoutMiddleware method can only remove route middleware and does not apply to global middleware.
<br><br>
<strong>Laravel includes predefined web and api middleware groups that contain common middleware you may want to apply to your web and API routes</strong>
<hr>
<p><strong>MiddleWare Alias</strong></p>
You may assign aliases to middleware in your application's bootstrap/app.php file. Middleware aliases allow you to define a short alias for a given middleware class.<br>
Once the middleware alias has been defined in your application's bootstrap/app.php file, you may use the alias when assigning the middleware to routes.
<br>For example,we use <strong>Auth , Verified</strong>.<br>
auth  &nbsp;&nbsp;Illuminate\Auth\Middleware\Authenticate<br>
verified &nbsp;&nbsp;Illuminate\Auth\Middleware\EnsureEmailIsVerified.



 
