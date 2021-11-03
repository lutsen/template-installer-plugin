<?php

/**
 * The Plugin class defining the Composer plugin. Implements the Composer\Plugin\PluginInterface.
 * It then registers the Custom Installer in its activate() method.
 *
 * From https://getcomposer.org/doc/articles/custom-installers.md
 * To be used with Lagan: https://github.com/lutsen/lagan
 */

namespace Lagan\Composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class TemplateInstallerPlugin implements PluginInterface
{
	public function activate(Composer $composer, IOInterface $io)
	{
		$installer = new TemplateInstaller($io, $composer);
		$composer->getInstallationManager()->addInstaller($installer);
	}

	public function deactivate(Composer $composer, IOInterface $io)
	{
		// Not needed
	}

	public function uninstall(Composer $composer, IOInterface $io)
	{
		// Not needed
	}
}

?>