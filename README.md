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

### <a name="view-pane"></a>3.View

**View** - после того как отработал контроллер мы вызываем виды, виды в **Laravel** работают в шаблонизаторе 
**blade**. 

### <a name="request-pane"></a>4.Request

**Request** - служыт для получения разного вида запросов, таких как ``` $_GET```, ``` $_POST```.

### <a name="helpers-pane"></a>5.Helpers

**Helpers** - сборник вспомагательных функций.

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

