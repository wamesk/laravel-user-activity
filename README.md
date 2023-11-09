# Laravel User Activity

This package is responsible for logging user activity in user_activities table after every api call.

User must be authorized.

User activity will be logged once per day but will hold exact time of first activity.

## Setup

```shell
composer require wamesk/laravel-user-activity
```

Add service provider to array of providers in `config/app.php`

```php
'providers' => [
    ...
    /*
     * Third Party Service Providers...
     */
    \Wame\LaravelUserActivity\UserActivityServiceProvider::class,
];
```

Run `vendor:publish`

```shell
php artisan vendor:publish --provider=Wame\LaravelUserActivity\UserActivityServiceProvider
```

If needed, change package configuration in `config/laravel-user-activity`
```php
return [
    'user_class' => 'App\\Models\\User',
    'user_table_name' => 'users',
    'table_name' => 'user_activities',
    'user_id_type' => 'ulid', // id / ulid / uuid
];
```

Run migrations

```shell
php artisan migrate
```

Add `UserActivityTrait` in your User model

```php
class User extends Models
{
    ...
    use \Wame\LaravelUserActivity\Traits\UserActivityTrait;
    ...
}

```

Register `UserActivity` middleware in `Kernel.php`
```php
protected $routeMiddleware = [
    ...
    'user.activity' => \Wame\LaravelUserActivity\Http\Middleware\UserActivity::class,
];
```

Apply `user.activity` middleware in your `routes/api.php`

```php
Route::group(['middleware' => 'user.activity'], function () {

}
```
