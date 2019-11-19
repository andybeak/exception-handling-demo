# Catching exceptions in PHP7

PHP7 introduced the [Throwable interface](https://www.php.net/manual/en/class.throwable.php) and changed the behaviour of a lot of engine errors to rather raise a new `Error` object.

This project can be used to experiment with:

* Catching what used to be engine errors
* Setting a default exception handler
* Using multiple `catch` blocks 
* Raising, catching, and logging specific errors where you still have application context and then rethrowing more general exceptions for central handling

## Running the project

Use the following commands:

    composer dump-autoload
    php index.php