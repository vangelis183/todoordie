<?php

namespace Vangelis\TodoOrDie\Tests;

use Exception;
use Vangelis\TodoOrDie\TodoOrDie;

beforeEach(function () {
    TodoOrDie::reset();
});

it('throws an exception when due', function () {
    expect(fn () => TodoOrDie::check('Test task', '2023-01-01'))
        ->toThrow(Exception::class, 'TODO: "Test task" came due on 2023-01-01. Do it!');
});

it('calls custom handler when condition is met', function () {
    $handlerCalled = false;
    $handler = function ($message, $by) use (&$handlerCalled) {
        $handlerCalled = true;
        expect($message)->toBe('Conditional task')->and($by)->toBeNull();
    };

    TodoOrDie::config(['die' => $handler]);
    TodoOrDie::check('Conditional task', null, fn () => true);
    expect($handlerCalled)->toBeTrue();
});

it('calls custom handler when due', function () {
    $handlerCalled = false;
    $handler = function ($message, $by) use (&$handlerCalled) {
        $handlerCalled = true;
        expect($message)->toBe('Test task')->and($by)->toBe('2023-01-01');
    };

    TodoOrDie::config(['die' => $handler]);
    TodoOrDie::check('Test task', '2023-01-01');
    expect($handlerCalled)->toBeTrue();
});

it('does not throw an exception when not due', function () {
    TodoOrDie::check('Test task', '2099-01-01');
    expect(true)->toBeTrue(); // If no exception is thrown, the test passes
});
