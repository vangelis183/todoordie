<?php

namespace Vangelis\TodoOrDie;

class TodoOrDie
{
    private static array $config = [
        'die' => null,
    ];

    public static function config(array $config): void
    {
        self::$config = array_merge(self::$config, $config);
    }

    public static function reset(): void
    {
        self::$config = [
            'die' => null,
        ];
    }

    /**
     * @throws \DateMalformedStringException
     */
    public static function check($message, $by = null, $condition = null): void
    {
        $due = false;

        if ($by && new \DateTime > new \DateTime($by)) {
            $due = true;
        }

        if ($condition && $condition()) {
            $due = true;
        }

        if ($due) {
            if (self::$config['die']) {
                call_user_func(self::$config['die'], $message, $by);
            } else {
                throw new \Exception("TODO: \"$message\" came due on $by. Do it!");
            }
        }
    }
}
