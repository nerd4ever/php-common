<?php


namespace Nerd4ever\Common\Tools;


final class UtilsTools
{
    public static function generateRandom(string $dictionary, int $length): string
    {
        $charactersLength = strlen($dictionary);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $dictionary[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function hasTrait(string $trait, object $object): bool
    {
        return in_array($trait, UtilsTools::class_uses_recursive($object));
    }

    private static function trait_uses_recursive($trait)
    {
        $traits = class_uses($trait) ?: [];
        foreach ($traits as $trait) {
            $traits += self::trait_uses_recursive($trait);
        }
        return $traits;
    }

    public static function class_uses_recursive($class): array
    {
        if (is_object($class)) {
            $class = get_class($class);
        }
        $results = [];
        foreach (array_reverse(class_parents($class)) + [$class => $class] as $class) {
            $results += self::trait_uses_recursive($class);
        }
        return array_unique($results);
    }
}