# faculty
 Faculty package as a component of a school management system

## Installation
```
composer require fshangala/faculty
```
- uncomment withAloquet and withFacades in `bootstrap/app`
- register the following service provider
```
$app->register(Fshangala\Faculty\FacultyServiceProvider::class);
```
- run migrations with `php artisan migrate`
## Criteria for permissions
- predefined resources
1. schools
2. programs
3. courses
- predefined types for schools
none
- predefined types for programs
1. school
- predefined types for courses
1. program