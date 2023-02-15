<?php

declare(strict_types = 1);

namespace Forceedge01\BDDStaticAnalyserRules\Entities;

class Config
{
    const DEFAULT_PATH = __DIR__ .
        DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' .
        DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' .
        DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;
    const DEFAULT_NAME = 'bdd-analyser-config.yaml';

    public function __construct(string $path, array $data)
    {
        $this->path = $path;
        $this->data = $data;
    }

    public function get(string $key, $default = null): mixed
    {
        if (isset($this->data['config'][$key])) {
            return $this->data['config'][$key];
        }

        return $default;
    }

    public function getPath(string $key): string
    {
        return str_replace('<relative_path>', dirname($this->path), $this->get($key));
    }

    public function print(): void
    {
        print_r($this->data);
    }

    public static function getValidConfigPath(string $path): string
    {
        if (is_dir($path)) {
            $path .= DIRECTORY_SEPARATOR . self::DEFAULT_NAME;
        }

        if (! is_file($path)) {
            throw new \Exception("No config found at '$path'");
        }

        return $path;
    }
}
