<?php

/**
 * The Custom Installer class that executes the custom installation.
 * It implements the Composer\Installer\InstallerInterface.
 * It defines the type string as it will be recognized by packages
 * that will use this installer in the supports() method.
 *
 * From https://getcomposer.org/doc/articles/custom-installers.md
 * To be used with Lagan: https://github.com/lutsen/lagan
 */

namespace Lagan\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class TemplateInstaller extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
        $prefix = substr($package->getPrettyName(), 0, 15);
        if ('lagan/template-' !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install template, Lagan templates '
                .'should always start their package name with '
                .'"lagan/template-"'
            );
        }

        return 'public/property-templates/'.substr($package->getPrettyName(), 15);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'lagan-template' === $packageType;
    }
}

?>