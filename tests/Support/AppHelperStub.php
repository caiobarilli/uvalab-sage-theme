<?php

class TestViewResult
{
    public string $view;

    public array $data;

    public array $mergeData;

    public ?string $layout = null;

    public function __construct(string $view, array $data = [], array $mergeData = [])
    {
        $this->view = $view;
        $this->data = $data;
        $this->mergeData = $mergeData;
    }

    public function layout(string $layout): self
    {
        $this->layout = $layout;

        return $this;
    }
}

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

                public function make($view, $data = [], $mergeData = []): TestViewResult
                {
                    return new TestViewResult($view, $data, $mergeData);
                }

                public function file($view, $data = [], $mergeData = []): TestViewResult
                {
                    return $this->make($view, $data, $mergeData);
                }
            };
        }

        return $factory;
    }
}
