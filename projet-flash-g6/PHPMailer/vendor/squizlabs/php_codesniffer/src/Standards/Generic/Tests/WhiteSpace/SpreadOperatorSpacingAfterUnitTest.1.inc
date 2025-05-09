<?php

function foo( &...$spread ) {
    bar( ...$spread );

    bar(
        [ ...$foo ],
        ...array_values($keyedArray)
    );
}

function bar( &   ... $spread ) {
    bar(...


        $spread
    );

    bar(
        [...  $foo ],.../*comment*/array_values($keyedArray)
    );
}

// phpcs:set Generic.WhiteSpace.SpreadOperatorSpacingAfter ignoreNewlines true
    bar(...
        $spread
    );
// phpcs:set Generic.WhiteSpace.SpreadOperatorSpacingAfter ignoreNewlines false

// phpcs:set Generic.WhiteSpace.SpreadOperatorSpacingAfter spacing 1
function foo( &... $spread ) {
    bar( ... $spread );

    bar(
        [ ... $foo ],
        ... array_values($keyedArray)
    );
}

function bar( &   ...$spread ) {
    bar(...
        $spread
    );

    bar(
        [...  $foo ],.../*comment*/array_values($keyedArray)
    );
}

// phpcs:set Generic.WhiteSpace.SpreadOperatorSpacingAfter spacing 2
function foo( &...  $spread ) {
    bar( ...  $spread );

    bar(
        [ ...  $foo ],
        ...  array_values($keyedArray)
    );
}

function bar( &   ... $spread ) {
    bar(...
        $spread
    );

    bar(
        [...    $foo ],.../*comment*/array_values($keyedArray)
    );
}

// Ignore PHP 8.1 first class callable declarations.
$map = array_map(strtolower(...), $map);

// phpcs:set Generic.WhiteSpace.SpreadOperatorSpacingAfter spacing 0

// Ignore PHP 8.1 first class callable declarations.
$map = array_map(strtolower( ... ), $map);

bar(... /*comment*/$array);
