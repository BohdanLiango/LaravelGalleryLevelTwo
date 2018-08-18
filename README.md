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

### <a name="middleware-pane"></a>7.Middleware

**Middleware** - служыть для доступа к некоторым данным для админов, либо других ролям на сайте. Служыт как фиьтр.

### <a name="http-pane"></a>8.HTTP Errors

**HTTP Errors** - для регенерации ошыбок, таких как ``` 404 Page Not Found```.

### <a name="collection-pane"></a>9.Collections

**Collections** - компонент который дает дополнительные возможности для работы з масивами.

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

