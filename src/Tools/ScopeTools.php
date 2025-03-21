<?php
/**
 * Created by Sileno de Oliveira Brito on 21/03/2025.
 * Copyright (c) 2025 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Tools;

use Exception;
use Nerd4ever\Common\Model\Scope;
use Symfony\Component\Yaml\Yaml;
use JMS\Serializer\SerializerInterface;
use Throwable;

class ScopeTools
{
    static function load(SerializerInterface $serializer, string $dir): array
    {
        try {
            $files = glob($dir . '/*.yaml');
            $scopes = [];
            foreach ($files as $file) {
                $data = Yaml::parseFile($file);
                $scopes = array_merge($scopes, self::loadFromArray($serializer, $data));
            }
            return $scopes;
        } catch (Throwable|Exception $ex) {
            error_log($ex->getMessage());
            return [];
        }
    }

    /**
     * @throws Exception
     */
    static public function loadFromArray(SerializerInterface $serializer, array $data): array
    {
        $scopes = [];
        if (!isset($data['groups']) || !is_array($data['groups'])) {
            return [];
        }
        foreach ($data['groups'] as $s) {
            if (!isset($s['label']) || !isset($s['description']) || !isset($s['scopes'])) {
                continue;
            }
            try {
                $scope = $serializer->deserialize(json_encode($s), Scope::class, 'json');
                $scopes[] = $scope;
            } catch (Throwable $ex) {
                error_log($ex->getMessage());
                throw new Exception('Invalid scope, failure on deserialize');
            }
        }
        return $scopes;
    }
}