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