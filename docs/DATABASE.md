# Database

## Current configuration

`config/database.php` defaults to SQLite when `DB_CONNECTION` is not set and defines SQLite, MySQL, MariaDB, PostgreSQL, and SQL Server connections. `database/database.sqlite` exists. The active environment driver, database contents, and applied migration status are **Not yet verified**; do not disclose `.env` values to establish them.

Testing is configured separately in `phpunit.xml` to use SQLite `:memory:` with array cache/session, synchronous queue, and array mail. This is test configuration, not evidence of the development or production database.

## Existing schema

All checked-in migrations are Laravel starter migrations:

| Migration | Tables |
| --- | --- |
| `0001_01_01_000000_create_users_table.php` | `users`, `password_reset_tokens`, `sessions` |
| `0001_01_01_000001_create_cache_table.php` | `cache`, `cache_locks` |
| `0001_01_01_000002_create_jobs_table.php` | `jobs`, `job_batches`, `failed_jobs` |

The only application model is `app/Models/User.php`. There are no travel service, destination, enquiry, quotation, booking, or payment models/tables. `DatabaseSeeder` creates a generic `Test User`; it is sample development data, not an administrator or a real customer.

## Data design rules

- Create or change schema through reversible Laravel migrations. Do not rewrite a migration that might already have run; add a new migration.
- Define relationships and foreign keys from approved business requirements. Add indexes for real query patterns; avoid speculative columns and tables.
- Use explicit mass-assignment allowlists, validation, and authorization. Store only customer details needed for follow-up and follow an approved retention policy.
- Do not store payment card data or represent an enquiry as a confirmed booking. Keep quotation/availability confirmation staff-led unless a future approved workflow changes that boundary.
- Keep factories and seeders visibly synthetic. Never seed fictional travel offers, testimonials, or customer records as real business content.
- Before running migrations, verify the target environment and database. Do not point setup or seed commands at production without explicit approval.

## Planned domain design

No travel schema has been approved. Before adding it, document the enquiry/quotation lifecycle, fields, staff roles, notifications, privacy/retention requirements, relationships, and deletion behavior in the implementation roadmap. Add ER diagrams or detailed table contracts only after those decisions are made.
