<?php

namespace WendellAdriel\ValidatedDTO\Casting;

class BooleanCast implements Castable
{
    /**
     * @param mixed $value
     * @return bool
     */
    public function cast(mixed $value): bool
    {
        if (is_numeric($value)) {
            return $value > 0;
        }

        if (is_string($value)) {
            return filter_var($value, FILTER_VALIDATE_BOOLEAN);
        }

        return boolval($value);
    }
}