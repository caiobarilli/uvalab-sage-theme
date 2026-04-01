<?php

if (! function_exists('app')) {
    function app($abstract = null)
    {
        static $factory;

        if (! $factory) {
            $factory = new class
            {
                public function exists($view): bool
                {
                    return true;
                }

                public function make($view, $data = [], $mergeData = []): array
                {
                    return [
                        'view' => $view,
                        'data' => $data,
                        'mergeData' => $mergeData,
                    ];
                }

                public function file($view, $data = [], $mergeData = []): array
                {
                    return $this->make($view, $data, $mergeData);
                }
            };
        }

        return $factory;
    }
}
