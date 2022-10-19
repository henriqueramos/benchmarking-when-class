<?php

declare(strict_types=1);

namespace HenriqueRamos\Benchmark;

class When
{
    /**
     * COPIED FROM HERE: https://github.com/laravel/framework/blob/8.x/src/Illuminate/Support/Traits/Conditionable.php#L15
     * Apply the callback if the given "value" is truthy.
     *
     * @param  mixed  $value
     * @param  callable  $callback
     * @param  callable|null  $default
     * @return $this|mixed
     */
    public function when($value, $callback, $default = null)
    {
        if ($value) {
            return $callback($this, $value) ?: $this;
        } elseif ($default) {
            return $default($this, $value) ?: $this;
        }

        return $this;
    }
}
