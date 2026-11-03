# Testing and Quality Checks

## Current setup

PHPUnit is configured by `phpunit.xml` with separate `tests/Unit/` and `tests/Feature/` suites. The test environment uses an in-memory SQLite database, array cache/session, synchronous queue, and array mail.

Current examples are `tests/Feature/ExampleTest.php` (root route response) and `tests/Unit/ExampleTest.php` (a basic assertion). They are Laravel scaffold tests, not coverage of A&PM pages or business workflows. No A&PM-specific test suite has been implemented.

## Commands

| Check | Command | Configuration/evidence |
| --- | --- | --- |
| Full test suite | `composer test` | Composer script clears configuration and runs `php artisan test`. |
| Full test suite directly | `php artisan test` | Laravel Artisan command is available. |
| PHP formatting check | `vendor/bin/pint --test` | Pint check mode does not write formatting changes. |
| Frontend production build | `npm run build` | Declared in `package.json`; no frontend test/lint script is declared. |

Do not report a check as passed unless it was run. After the Blade integration, `php artisan test` passed (2 tests, 2 assertions); the frontend build was not run. These are scaffold tests and do not verify the page appearance or Tourm interactions, which remain unverified in a browser.

## Verification expectations

- Add feature tests for public routes, validation, authorization, enquiry persistence, and staff workflow as those features are implemented.
- Test authorization failures as well as successful paths. Use the test database configuration; never run destructive test setup against production data.
- Recheck responsive layout, keyboard navigation, form labels/errors, metadata, image loading, and template plugin behavior when the public site is built.
- Run Pint in check mode and `npm run build` for relevant code changes. There is no configured JS/CSS linter or frontend unit-test runner; do not invent npm scripts.
- Record exact commands, outcomes, and known gaps in `docs/IMPLEMENTATION.md` when a phase's verification status changes.
