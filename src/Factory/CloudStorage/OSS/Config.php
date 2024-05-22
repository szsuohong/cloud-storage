<?php

namespace Slowlyo\CloudStorage\Factory\CloudStorage\OSS;

use OSS\Core\OssException;
use OSS\Credentials\Credentials;
use OSS\Credentials\CredentialsProvider;

class Config implements CredentialsProvider
{
    private array $config;

    public function __construct(array $argv)
    {
        $this->config = $argv;
    }
    /**
     * @return Credentials
     * @throws OssException
     */
    public function getCredentials(): Credentials
    {
        $token = $this->config['token'] ?? null;
        return new Credentials($this->config['access_key'], $this->config['secret_key'], $token);
    }
}
