<?php

return [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    Doctrine\Bundle\DoctrineBundle\DoctrineBundle::class => ['all' => true],
    Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle::class => ['all' => true],
    Symfony\Bundle\DebugBundle\DebugBundle::class => ['dev' => true],
    Symfony\Bundle\TwigBundle\TwigBundle::class => ['all' => true],
    Symfony\Bundle\WebProfilerBundle\WebProfilerBundle::class => ['dev' => true, 'test' => true],
    Twig\Extra\TwigExtraBundle\TwigExtraBundle::class => ['all' => true],
    Symfony\Bundle\SecurityBundle\SecurityBundle::class => ['all' => true],
    Symfony\Bundle\MonologBundle\MonologBundle::class => ['all' => true],
    Symfony\Bundle\MakerBundle\MakerBundle::class => ['dev' => true],
    Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle::class => ['all' => true],
    App\Backoffice\DashboardBundle\BoDashboardBundle::class => ['all' => true],
    App\Backoffice\ThemeBundle\BoThemeBundle::class => ['all' => true],
    App\Backoffice\SettingsBundle\BoSettingsBundle::class => ['all' => true],
    App\Backoffice\CommonBundle\BoCommonBundle::class => ['all' => true],
    App\Backoffice\SecurityBundle\BoSecurityBundle::class => ['all' => true],
    App\Backoffice\UserBundle\BoUserBundle::class => ['all' => true],
    App\Backoffice\ProductsBundle\BoProductsBundle::class => ['all' => true],
    App\Front\ThemeBundle\FrontThemeBundle::class => ['all' => true],
];
