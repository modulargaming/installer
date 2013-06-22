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

		return 'modulargaming/'.$name;
	}

	/**
	 * {@inheritDoc}
	 */
	public function supports($packageType)
	{
		return 'modulargaming-module' === $packageType;
	}

}