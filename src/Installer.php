<?php

/**
 * Simplified Installer that only works with HamletCMS
 * Originated from the composer/installers project
 */

namespace rbwebdesigns\HamletCMS\Installer;

use Composer\Installer\LibraryInstaller;
use Composer\IO\IOInterface;
use Composer\Package\PackageInterface;
use Composer\Repository\InstalledRepositoryInterface;

class Installer extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
        $installer = new HamletInstaller($package, $this->composer, $this->getIO());
        return $installer->getInstallPath($package, 'hamlet');
    }

    public function uninstall(InstalledRepositoryInterface $repo, PackageInterface $package)
    {
        parent::uninstall($repo, $package);
        $installPath = $this->getPackageBasePath($package);
        $this->io->write(sprintf('Deleting %s - %s', $installPath, !file_exists($installPath) ? '<comment>deleted</comment>' : '<error>not deleted</error>'));
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return preg_match('#hamlet-(cms-module|cms-template)#', $packageType, $matches) === 1;
    }

    /**
     * Get I/O object
     *
     * @return IOInterface
     */
    private function getIO()
    {
        return $this->io;
    }

}