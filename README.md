# LaravelGalleryLevelTwo

# Начальная документация по Laravel
Всем привет, меня звать **Bohdan Liango** и я начинающий Laravel разработчик!

## Cтруктура фреймфорка
* Важнейшые компоненты

	- 1.[Route](#route-pane)
	- 2.[Controller](#controller-pane)
	- 3.[View](#view-pane)
	- 4.[Request](#request-pane)
	- 5.[Helpers](#helpers-pane)
	- 6.[Validation](#validation-pane)
	- 7.[Middleware](#middleware-pane)
	- 8.[HTTP Errors](#http-pane)
	- 9.[Collections](#collection-pane)
	- 10.[QueryBuilder](#querybuilder-pane)
	- 11.[Eloquet](#eloquent-pane)
	- 12.[Unit\Feature Test ](#unit-pane)
	- 13.[PHP Artisan Console](#artisan-pane)
	- 14.[Laravel mix](#laravelMix-pane)
	- 15.[Migration](#migration-pane)

### <a name="route-pane"></a>1.Route

**Route** - занимается маршрутизацией в проекте, и выполняет метод action.

```php
 Route::get($url, $closure);
 Route::post($url, $closure);
 Route::put\patch($url, $closure);
 Route::delete($url, $closure);
 
 Route::get('/posts/{date}', $closure);
 Route::get('/posts/{id?}', $closure);
 Route::get('/posts/{id?}', $closure)->name('posts.show');
 ```
 
 ```$url``` - определенный адрес который мы прописываем;
 ```$closure``` - определенная функция которую мы также прописываем;
 Также в **Route** есть обязательные и не обязательные параметры:
 ```{date}``` - обязательный параметр, ```{id?}``` - необязательный параметр, **?** - нам указывает на необязательность параметра;
 ```->name('posts.show')``` - функция  **name** позволяет давать название маршрутам;
 
 #### Как выглядит маршрут в коде:
 
 ```php
Route::get('/posts', function () {
  //код
});
 
 ```
 
 ```php
 
//web.php

 Route::get('/user', 'UserController@index');
 
//UserController.php

class UserController{

  public function index()
  {
    //код
  }
}
 
 ```
 
#### Также существуют префиксы для обьединения маршрутов в группы, к примеру група **admin**:

```php
Route::prefix('admin')->group(function(){

   Route::get('/posts', 'PostsController@index');
   Route::get('/create', 'CreateController@index');

});

```

``` http:/example.com/admin/posts``` - 200 OK;


``` http:/example.com/posts``` - 404 ERROR;

#### Namespace:

Для разграничения контроллеров:

```php
Route::namespace('Admin')->group(function () {
  //Контроллеры в Namespace "App\Http\Controllers\Admin"
});

```
 #### Middleware (фильтры):
```php
Route::middleware(['first', 'second'])->group(function () {
    Route::get('/', function () {
        // Route использует first и second для Middleware
    });
```
**first** и **second** - служыт для логику фильтрации, которую мы прописываем

[Сылка на полную документацию](https://laravel.com/docs/5.6/routing)
 
### <a name="controller-pane"></a>2.Controller

**Controller** - После правильного заданого маршрута, **route** вызывает action, что и есть контроллер, это выделенное место
где мы будем прописывать логику нашего проекта.


Служыт для отработки запроса.

#### Пример кода:

```php
	class PostController{
		public function index(){
			//запрос к бд
			//сортировка результата
			//передача данных и вывод представления
		}
	}

```

#### Пример DI:
Что такое DI - [Cылка](https://www.youtube.com/watch?v=ri7L-kbVKcU)

```php 
	class PostController{
	
		private $someComponent;
		
		public function __comstruct(MyComponent $component){
			
			$this->someComponent = $component;
		}
	}
```


### <a name="view-pane"></a>3.View

**View** - после того как отработал контроллер мы вызываем виды, виды в **Laravel** работают в шаблонизаторе 
**blade**. 

Сперва создаем шаблон для сайта в файле ``` yield.blade.php```.

```php
<!-- Stored in resources/views/layouts/app.blade.php -->

<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
```

Потом разширяем его, используя слудующие функции:

``` @extends('layouts.app')``` - по етому пути **Laravel** знает какой шаблон использовать.


``` @section('title', 'Page Title')``` - создание секции (которая разная для разных страниц сайта).

``` @include('shared.errors') ``` - подключение модулей на страницу, и различных файлов.

#### Пример:

```php
<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>
@endsection
```

Потом прописывает в **web.php**  маршрут:

```php
Route::get('blade', function () {
    return view('child');
});
```




#### IF:
```php
	@if (count($records) === 1)
	    I have one record!
	@elseif (count($records) > 1)
	    I have multiple records!
	@else
	    I don't have any records!
	@endif
```

#### Switch:

```php
	@switch($i)
    @case(1)
        First case...
        @break

    @case(2)
        Second case...
        @break

    @default
        Default case...
@endswitch
```

#### Loops:

```php
	@for ($i = 0; $i < 10; $i++)
	    The current value is {{ $i }}
	@endfor

	@foreach ($users as $user)
	    <p>This is user {{ $user->id }}</p>
	@endforeach

	@forelse ($users as $user)
	    <li>{{ $user->name }}</li>
	@empty
	    <p>No users</p>
	@endforelse

	@while (true)
	    <p>I'm looping forever.</p>
	@endwhile
```
#### Comments:
```php
	{{-- This comment will not be present in the rendered HTML --}}
```

#### PHP:

```php
@php
    //code
@endphp
```

Cылка на полную документацио - [Blade Laravel](https://laravel.com/docs/5.6/blade)

### <a name="request-pane"></a>4.Request

**Request** - служыт для получения разного вида запросов, таких как ``` $_GET```, ``` $_POST```.

### <a name="helpers-pane"></a>5.Helpers

**Helpers** - сборник вспомагательных функций.

### Основные функции:


#### Общие:
```dd('text') ``` - тоже самое что и ```var_dump() ```, только лучше)?.


```route('posts.index') ``` - для сформирования маршрута, в качестве параметра название роута.

```view('home.main') ``` - рендер представления.

```redirect('/homepage') ``` - переадресация.

```back() ``` -  переадресация на предидущий маршрут.

```with('variable', 'value') ``` - функция передачи данных вид.

```withInput() ``` - передает назад данные ведденые пользователем.

```old('title') ``` - при отправки данных сохраняет их.

```scrf_field() ``` - для защиты данных с формы.

```scrf_token() ``` - выводит токин.

```auth() ``` - возвращает авторизованого пользователя.

```collect() ``` - создает колекцию на которой можна делать различные операции.

```config('app.name') ``` - берет значение из конфига определеного файла.

#### Строки:

```str_random() ``` - рандомная строка.

```str_slug() ``` - переводит кирилицу в латиницу.

```str_limit() ``` - обрезает строки до определенной длины.

#### Пути:
```public_path() ``` - полной путь до папки **public** которая доступная для **web**.

```storage_path() ``` - полной путь до папки **storage**.





Сылка на все функции - [helpers](https://laravel.com/docs/5.6/helpers#method-camel-case)

### <a name="validation-pane"></a>6.Validation

**Validation** - служыть для проверки различных данных, и отображения ошыбок для пользователя.

Сперва нужно создать форму для валидации, что логично) выглядит будет примерно так:

```php
///welcome.blade.php

@extend('layout')
@section('content')
<form action="/test" method="post">
    <input type="text" name="title">
    <br>
    {{csrf_field()}}
    <button type="submit">Submit</button>
</form>
@endsection
```

Потом в маршрутах нужно указать контролер который будет отвечать за обработку формы.

```php
//web.php

Route::post('/test', "TestController@store");

```

В самом контроллере прописываем метод **store**.

```php
<?php

namespace App\Http\Controllers;

class TestController extends Controller
{

    public function store(Request $request) {
	
	$this->validate();
        return view('home');
    }
}


```

В ```$this->validate();``` нужно указать правила валидации, так как мы хотим валидировать наш запрос, первым параметром
указываем именно сам запрос ```$request``` выглядеть должно так: ```$this->validate($request);```, вторым параметром должны быть правила валидации, которые мы передаем в выгляде масива ```$this->validate($request, ['title' => 'required']);```.

Чтобы вывести ошыбку существует глобальная переменная в **Laravel**, ```$errors```;

```php
///welcome.blade.php

@extend('layout')
@section('content')
{{$errors->first('title')}} /// выведет нам ошыбку
<form action="/test" method="post">
    <input type="text" name="title">
    <br>
    {{csrf_field()}}
    <button type="submit">Submit</button>
</form>
@endsection
```

При добавлении новых полей к примеру:


```php
///welcome.blade.php

@extend('layout')
@section('content')
<form action="/test" method="post">
    <input type="text" name="title">
    <input type="text" name="description"> //новое поле
    <br>
    {{csrf_field()}}
    <button type="submit">Submit</button>
</form>
@endsection
```

Прописываем в контроллере ```TestController``` новые данные для валидации:

```php
<?php

namespace App\Http\Controllers;

class TestController extends Controller
{

    public function store(Request $request) {
	
	$this->validate($request, [
	'title' => 'required',
	'description' => 'required'
	]);
        return view('home');
    }
}
```

Для вывода всех ошыбок лучше использовать ```foreach```:

```php
///welcome.blade.php

@extend('layout')
@section('content')

@foreach($errors->all() as $error)
	{{$error}} <br>
@endforeach
<form action="/test" method="post">
    <input type="text" name="title" value="{{old('title')}}">
    <input type="text" name="description" value="{{old('description')}}"> 
    <br>
    {{csrf_field()}}
    <button type="submit">Submit</button>
</form>
@endsection
```

Функция ```old()``` сохраняет предидущие данные, и при сбрасывание формы, если она была неправильно заполнена,
возвращает предидщие данные.

#### Основные правила валидации:

``` required ``` - обязательное поле


``` email ```- проверка текста на формат email


``` confirmed ``` - проверяет два поля на идентичность, к примеру поле с паролем


``` exists:table ``` - проверяет существуют ли данные в определенной таблице


``` unique:users, email_address ``` - проверяет на уникальность


``` image ``` - проверяет чтобы файл был картинкой


``` accepted ``` - всякие галочки, к примеру правила пользования сайтом


``` nullable ``` - не обязательные правила валидации, но можна указать какие дополнительные правила валидации можно использовать.


Example: ```nullable|image```, к примеру есть пользователь, и у него есть аватарка, так он может не загружать аватарку

Сылка на полную документацию - [Validation](https://laravel.com/docs/5.6/validation)

### <a name="middleware-pane"></a>7.Middleware

**Middleware** - служыть для доступа к некоторым данным для админов, либо других ролям на сайте. Служыт как фильтр.

Ето обычный клас у которого есть методы, в который мы уже прописываем условия.

Выглядит так:

```php


Route::middleware('auth')->group(function (){

    Route::get('/admin', 'AdminController@index');

});


Route::get('asdasd', function (){
   return ('Вы не авторизованы');
})->name('login');


```
Если пользователь не зарегистрирован, то перенаправит на **Route** asdasd. 


Для создания своего **middleware** прописываем в консоле:

```bash
php artisane make:middleware AdminMiddleware
```

Переходим в папку **App\Http\Middleware**:

```php
//AdminMiddleware.php

<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request. // Принимать/обрабатывать входящий запрос
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}

```

Потом нам нужно зарегистрировать **Middleware**:

```php
Kernel.php

/**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
	'admin' => \App\Http\Middleware\AdminMiddleware::class,   ///Подключаем наш Middleware, под именем admin
    ];

```

Дальше можно его указать в маршрутах:

```php
web.php



Route::middleware(['guest', 'admin'])->group(function (){

    Route::get('/home', 'HomeController@index');

});


```

Можна проверить работаел ли **middleware**, вписав команду  ```php artisan route:list```:
```
 GET|HEAD | home               |      | App\Http\Controllers\HomeController@index    | web,guest,admin 
```

В самом файле **AdminMiddleware.php** можно прописывать уже способы фильтрации:

```php
<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    
   	if(!$user->isAdmin()){
	   dd('404 Error');
	}
        return $next($request);
    }
}
```

Cылка на полную документацию - [Middleware](https://laravel.com/docs/5.6/middleware)
### <a name="http-pane"></a>8.HTTP Errors

**HTTP Errors** - для регенерации ошыбок, таких как ``` 404 Page Not Found```.

**Важно**
!!ошыбки мы выводим только запланированые!!

Для вывода ошыбок используем команду ```abort(404);``` в команду передаем номер ошыбки.

К примеру мы хотим закрыть страницу на сайте, и показать ошыбку ```404 Page not found```:

```php
Route::get('/home', function (){
    abort(404);
    return 'home';
});

```

Выведется стандартная ошыбка которая уже вшыта в **Laravel**, чтобы изменить вид ошыбки, текст и так далее, на мнужно создать свои ошыбки по пути: **resources/view/errors*** файл **404.blade.php**, **503.blade.php**. И тогда **Laravel** будет выводить свои собственные.  

Сылка на документацию **Laravel** - [Errors](https://laravel.com/docs/5.6/errors#http-exceptions)


Сылка на все возможные ошыбки (контролируемые) - [Errors Wikipedia](https://ru.wikipedia.org/wiki/%D0%A1%D0%BF%D0%B8%D1%81%D0%BE%D0%BA_%D0%BA%D0%BE%D0%B4%D0%BE%D0%B2_%D1%81%D0%BE%D1%81%D1%82%D0%BE%D1%8F%D0%BD%D0%B8%D1%8F_HTTP)

### <a name="collection-pane"></a>9.Collections

**Collections** - компонент который дает дополнительные возможности для работы з масивами.

Допустим нам нужно написать выборку пользователей, по некоторым параметрам.

```php
Route::get('/', function (){
    $users = [
        [
            'id'=> 1,
            'name' => "John",
            'status' => 'ban'
        ],
        [
            'id'=> 2,
            'name' => "Eva",
            'status' => 'ban'
        ],
        [
            'id'=> 3,
            'name' => "Jane",
            'status' => 'active'
        ],
        [
            'id'=> 4,
            'name' => "Ololoszka",
            'status' => 'active'
        ],
    ];

    $bannedUsers = [];

    foreach ($users as $user)
    {
        if($user['status'] == "ban"){
            if($user['id'] > 1){
                $bannedUsers[] = $user;
            }
        }
    }

    $bannedUsersWithIDs = [];

    foreach ($bannedUsers as $user)
    {
        if($user['id'] >1){
            $bannedUsersWithIDs[] = $user;
        }
    }
    dd($bannedUsersWithIDs);
//    return view('welcome');
});

```

Вместо етого можна написать так:

```php
Route::get('/', function (){
    $users = collect([
        [
            'id'=> 1,
            'name' => "John",
            'status' => 'ban'
        ],
        [
            'id'=> 2,
            'name' => "Eva",
            'status' => 'ban'
        ],
        [
            'id'=> 3,
            'name' => "Jane",
            'status' => 'active'
        ],
        [
            'id'=> 4,
            'name' => "Ololoszka",
            'status' => 'active'
        ],
    ]);



    $names = $users->filter(function($user){
        return $user['status'] == 'ban';
    })->filter(function ($user){
        return $user['id'] > 1;
    });

    dd($names);


```

Сперва оборачиваем массив $users в функцию ```collect()```, в этой функции уже собраны все [методы](https://laravel.com/docs/5.6/collections#available-methods), к примеру вместо обычного **foreach**, тоесть выборки определенного поля или просто розбить масив на елементы, можно написать так: 

```php
    $names = $users->map(function($user){
       return $user['name'];
    });

```



Cылка на документацию - [Collections](https://laravel.com/docs/5.6/collections)



### <a name="querybuilder-pane"></a>10.QueryBuilder

**QueryBuilder** - создание запросов для баз данных, их обработка и т.д.

### <a name="eloquent-pane"></a>11.Eloquet

**Eloquet** - модель, позволяет работать з таблицами в базах данных как с обычными обьектами.

### <a name="unit-pane"></a>12.Unit\Feature Test

**Unit\Feature Test** - тесты, созданые для автоматизации тестов **Laravel**. 
 
### <a name="artisan-pane"></a>13.PHP Artisan Console

**PHP Artisan Console** - консольная утилита для рутинных задач.

### <a name="laravelMix-pane"></a>14.Laravel mix

**Laravel mix** - создыный для работы с **webpack**.

### <a name="migration-pane"></a>15.Migration

**Migration** - созданы для работы с базой данных.

Для создания миграции нам нужно в ```php artisan``` прописать команду:

```php
	php artisan make:migration create_user_table
```

В названии миграции должно присутствовать то, что мы хотим с етим сделать.
К примеру ```create_user_table``` создаст нам таблицу **user**.

Все миграции по умолчанию находятся в **database/migration**.

Запустить все миграции мы можем командой:

```php
php artisan migrate
```

Откатить предидущую миграцию можно командой:

```php
php artisan migrate:rollback

```

Откатить все миграции:

```php
php artisan migrate:reset
```

Откатить и вернуть миграции на свое предидущее "место":

```php
php artisan migrate:refresh
```

Файл с миграциями выглядит так:

```php
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

```

Где:


```Schema::create('users', function (Blueprint $table)  ``` - создание таблицы с именем **users**.


```$table->string('name');``` - создание поля **name**, **string** - по умолчанию ```varchar255```.



Cылка на полную документацию: [Migrations](https://laravel.com/docs/5.6/migrations)
