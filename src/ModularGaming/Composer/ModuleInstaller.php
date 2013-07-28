<?php
namespace ModularGaming\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class ModuleInstaller extends LibraryInstaller {

	/**
	 * {@inheritDoc}
	 */
	public function getInstallPath(PackageInterface $package)
	{

		$name = $package->getPrettyName();
		if (strpos($name, '/') !== false) {
			list($vendor, $name) = explode('/', $name);
		}

		if ($package->getType() === 'modulargaming-module') {
			return 'modulargaming/'.$name;
		}

		if ($package->getType() === 'modulargaming-theme') {

			// Remove theme- prefix if it exists.
			if (substr($name, 0, 6) === 'theme-') {
				$name = substr($name, 6);
			}

			return 'themes/'.$name;
		}

	}

	/**
	 * {@inheritDoc}
	 */
	public function supports($packageType)
	{
		return in_array($packageType, array('modulargaming-module', 'modulargaming-theme'));
	}

}