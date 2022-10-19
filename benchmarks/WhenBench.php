<?php

use HenriqueRamos\Benchmark\When;

/**
 * @BeforeMethods({"init"})
 * @Revs(10000)
 * @Iterations(50)
 */
class WhenBench {
    private static $when;

    public function init()
    {
        self::$when = new When();
    }

    /**
     * @Subject
     */
    public function doWhenClauseWithCallbackOnlyFilled()
    {
        $conditional1 = true;

        self::$when->when(
            $conditional1,
            static function () {
                return 'A';
            }
        );
    }

    /**
     * @Subject
     */
    public function doWhenClauseWithCallbackBeingCalled()
    {
        $conditional1 = true;

        self::$when->when(
            $conditional1,
            static function () {
                return 'A';
            },
            static function () {
                return 'B';
            }
        );
    }

    /**
     * @Subject
     */
    public function doWhenClauseWithDefaultCallbackBeingCalled()
    {
        $conditional1 = false;

        self::$when->when(
            $conditional1,
            static function () {
                return 'A';
            },
            static function () {
                return 'B';
            }
        );
    }

    /**
     * @Subject
     */
    public function doWhenClauseWithIfEarlyReturn()
    {
        $conditional1 = true;
        $conditional2 = true;
        self::$when->when(
            $conditional1,
            static function () use ($conditional2) {
                if ($conditional2) {
                    return 'B';
                }

                return 'A';
            },
        );
    }

    /**
     * @Subject
     */
    public function doWhenClauseIfWithoutEarlyReturn()
    {
        $conditional1 = true;
        $conditional2 = false;
        self::$when->when(
            $conditional1,
            static function () use ($conditional2) {
                if ($conditional2) {
                    return 'B';
                }

                return 'A';
            },
        );
    }

    /**
     * @Subject
     */
    public function doWhenClauseWithNestedWhen()
    {
        $conditional1 = true;
        $conditional2 = true;
        $when = self::$when;

        self::$when->when(
            $conditional1,
            static function () use ($conditional2, $when) {
                return $when->when(
                    $conditional2,
                    static function () {
                        return 'B';
                    },
                    static function () {
                        return 'A';
                    }
                );
            }
        );
    }
}
