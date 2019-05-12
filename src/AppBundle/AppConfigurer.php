<?php

namespace AppBundle;

class AppConfigurer
{
    public function configureNormalizer($normalizer)
    {
        \Closure::bind(function () use (&$normalizer) {
            foreach ($this->normalizers as $normalizer)
                if (method_exists($normalizer, 'setCircularReferenceHandler'))
                    $normalizer->setCircularReferenceHandler(function ($object) {
                        return $object->getId();
                    });
        }, $normalizer, $normalizer)();
    }
}