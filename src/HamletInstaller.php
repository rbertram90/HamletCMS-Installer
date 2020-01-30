<?php
namespace rbwebdesigns\HamletCMS\Installer;

class HamletInstaller extends BaseInstaller
{
    protected $locations = array(
        'cms-module'     => 'modules/addon/{$name}/',
        'cms-template'   => 'templates/addon/{$name}/',
    );
}