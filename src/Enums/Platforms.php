<?php

namespace Native\Electron\Enums;

enum Platforms: string
{
	case WINDOWS = 'win';
	case DARWIN = 'mac';
	case LINUX = 'linux';

	// Same as the string backed values but this decouples the dir from
	// the backed value
	public function getPlatformDir(): string
	{
		return match ($this) {
			self::WINDOWS => 'win',
			self::DARWIN => 'mac',
			self::LINUX => 'linux',
		};
	}

	public function Architectures(): array
	{
		return match ($this) {
			self::WINDOWS => ['x64'],
			self::DARWIN => ['arm', 'x86'],
			self::LINUX => ['x64'],
		};
	}

}