# When Class benchmarking

Hey there! This repository groups a benchmark of a `When` class implementation.

This implementation derives from a sample copy of [Laravel's `Conditionable` trait.](https://github.com/laravel/framework/blob/8.x/src/Illuminate/Support/Traits/Conditionable.php#L15).

I'm using the fantastical [phpbench](https://github.com/phpbench/phpbench) to measure data.

## How to run?

This code only runs on environments with PHP >= 8.0! Why? Because PHP 7.4 is reaching his [EOL](https://en.wikipedia.org/wiki/End-of-life_product). So, migrate over 8.x family and be happy. You could learn more about the supported versions [here](https://www.php.net/supported-versions.php).

You will need [composer](https://getcomposer.org/) too, because he's doing all the namespace magic under the hood for us.

Oh, you didn't know about composer? Take a look on this [blogspot](https://blog.jgrossi.com/2013/why-you-should-use-composer-and-how-to-start-using-it/)!

### Cloning it

You will need to clone the repository, so, go ahead! Have some fun using `git` command line interface (a.k.a `CLI`).

## Installing it

Once you got a composer's copy, run this command on your local repository clone.

    composer install

This will install the  dependency [phpbench](https://github.com/phpbench/phpbench) on your environment, and create the `vendor/autoload.php` file.

## Using it

You can run the benchmarks on your system using the following command:

    composer phpbench

The result will have a similar display to this:

**NOTE:** Those are mine results, on a Macbook Pro M1 2020, 8GB RAM.

    @php vendor/bin/phpbench run --report=aggregate
    PHPBench (dev-master) running benchmarks... #standwithukraine
    with configuration file: /Users/henrique/Projects/benchmark/phpbench.json
    with PHP version 8.1.10, xdebug ❌, opcache ❌
    
    \WhenBench
    
    doWhenClauseWithCallbackOnlyFilled......I49 -  Mo0.107μs (±1.04%)
    doWhenClauseWithCallbackBeingCalled.....I49 -  Mo0.130μs (±1.02%)
    doWhenClauseWithDefaultCallbackBeingCal.I49 -  Mo0.133μs (±0.81%)
    doWhenClauseWithIfEarlyReturn...........I49 -  Mo0.133μs (±0.68%)
    doWhenClauseIfWithoutEarlyReturn........I49 -  Mo0.134μs (±1.29%)
    doWhenClauseWithNestedWhen..............I49 -  Mo0.270μs (±0.53%)
    
    Subjects: 6, Assertions: 0, Failures: 0, Errors: 0
    
    +-----------+--------------------------------------------+-----+-------+-----+-----------+---------+--------+
    | benchmark | subject                                    | set | revs  | its | mem_peak  | mode    | rstdev |
    +-----------+--------------------------------------------+-----+-------+-----+-----------+---------+--------+
    | WhenBench | doWhenClauseWithCallbackOnlyFilled         |     | 10000 | 50  | 676.616kb | 0.107μs | ±1.04% |
    | WhenBench | doWhenClauseWithCallbackBeingCalled        |     | 10000 | 50  | 676.616kb | 0.130μs | ±1.02% |
    | WhenBench | doWhenClauseWithDefaultCallbackBeingCalled |     | 10000 | 50  | 676.648kb | 0.133μs | ±0.81% |
    | WhenBench | doWhenClauseWithIfEarlyReturn              |     | 10000 | 50  | 676.600kb | 0.133μs | ±0.68% |
    | WhenBench | doWhenClauseIfWithoutEarlyReturn           |     | 10000 | 50  | 676.616kb | 0.134μs | ±1.29% |
    | WhenBench | doWhenClauseWithNestedWhen                 |     | 10000 | 50  | 676.600kb | 0.270μs | ±0.53% |
    +-----------+--------------------------------------------+-----+-------+-----+-----------+---------+--------+

## Contact me

Anything else? Just drop a message on my [LinkedIn](https://www.linkedin.com/in/henriqueramos/?locale=en_US).

Cya!
