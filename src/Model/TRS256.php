<?php

namespace Nerd4ever\Common\Model;

use Exception;

trait TRS256
{
    /**
     * Encode given data using a given key.
     *
     * @param mixed $privateKey
     * @param string $data
     * @return string|null
     * @throws Exception
     */
    public function toRS256($privateKey, string $data): ?string
    {
        if (!is_string($privateKey) && !is_resource($privateKey)) throw new Exception('key is required');
        $signature = null;
        openssl_sign($data, $signature, $privateKey, 'SHA256');
        return $signature;
    }

    /**
     * Verica a assinatura usando a chave pública
     *
     * @param mixed $publicKey
     * @param string $data
     * @param string $signature
     * @return bool
     * @throws Exception
     */
    protected function testRS256($publicKey, string $data, string $signature): bool
    {
        if (!is_string($publicKey) && !is_resource($publicKey)) throw new Exception('key is required');
        if (file_exists($publicKey)) $publicKey = file_get_contents($publicKey);
        return openssl_verify($data, $signature, $publicKey, 'SHA256') !== false;
    }
}