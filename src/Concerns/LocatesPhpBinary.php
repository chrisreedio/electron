<?php

namespace Native\Electron\Concerns;

trait LocatesPhpBinary
{
    /**
     * @return string The path to the binary package directory
     */
    protected function binaryPackageDirectory(): string
    {
        return 'vendor/nativephp/php-bin/';
    }

    /**
     * Calculate the path to the PHP binary based on the OS
     *
     * @return string The path to the PHP binary (not including the filename)
     */
    public function phpBinaryPath(): string
    {
        return $this->binaryPackageDirectory() . 'bin/' . $this->platformDir();
    }

    public function platformDir(): string
    {
        return match (PHP_OS_FAMILY) {
            'Windows' => 'win',
            'Darwin' => 'mac',
            'Linux' => 'linux',
            default => throw new \Exception('Unsupported platform')
        };
    }
}
