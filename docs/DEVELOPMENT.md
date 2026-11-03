# Local Development

## Requirements

- PHP `^8.3` and Composer, per `composer.json`.
- Node.js and npm are needed for Vite. The repository does not pin their versions and has no npm lockfile.
- Dependencies are declared in `composer.json`/`composer.lock` and `package.json`. Do not assume `node_modules/` exists.

## Install dependencies

```sh
composer install
npm install --ignore-scripts
```

The npm invocation above is present in the Composer `setup` script. Since no npm lockfile is checked in, npm resolves within declared version ranges and the exact frontend dependency tree is not reproducible yet.

`composer run setup` is defined, but it does more than install dependencies: it may create `.env`, generate an application key, run migrations with `--force`, install npm packages, and build assets. Inspect the target database and local setup before using that combined command. Never run it against production as a shortcut.

## Environment configuration

Use `.env.example` as the variable-name template and supply local values through a private `.env`. Never put credentials in documentation, source control, or command output. The configured database driver for the current environment is **Not yet verified**.

## Common commands

| Purpose | Command | Notes |
| --- | --- | --- |
| Start the app's development processes | `composer run dev` | The Composer script invokes Laravel's `dev` Artisan command. |
| Start Vite only | `npm run dev` | Use when managing the PHP server separately. |
| Build frontend assets | `npm run build` | Declared in `package.json`; build was not run during the docs audit. |
| Run database migrations | `php artisan migrate` | Changes the selected database. Confirm environment/backup first. |
| Check PHP formatting | `vendor/bin/pint --test` | Check-only mode; Pint is in the locked Composer dependencies. |
| Run tests | `composer test` or `php artisan test` | The Composer script clears config then invokes Artisan tests. |

These commands were checked against the current scripts/tool availability during the documentation audit. That does not mean a build, migration, or test suite was run. See [Testing](TESTING.md).

## Workflow

1. Read root `AGENTS.md` and `docs/IMPLEMENTATION.md`; check Git status in a valid checkout.
2. Confirm the active environment and protect `.env`/database contents.
3. Make a focused change and update the relevant roadmap item and technical document.
4. Run the relevant checks, record results, review the diff, and report files/risks.
