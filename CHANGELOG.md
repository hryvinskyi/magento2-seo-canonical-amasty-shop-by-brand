# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.3] - 2026-06-03

### Fixed
- PHP 8.4/8.5 compatibility: explicitly mark the nullable `$url` constructor parameter in `Model\CanonicalUrlProcess` as `?UrlInterface` to avoid the "Implicitly marking parameter as nullable is deprecated" deprecation.

## [1.0.2] - 2025-05-12

### Changed
- Update composer.json.

## [1.0.1] - 2025-05-12

### Changed
- Update composer.json.

## [1.0.0] - 2025-05-12

### Added
- Initial release.
