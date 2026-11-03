# ADR 0001: Laravel-First Monolithic Application

- **Date:** 2026-11-02
- **Status:** Accepted

## Context

The repository is a Laravel 13 application with Laravel web routing, Blade views, Vite-managed CSS/JavaScript, Eloquent/database configuration, and PHPUnit. The public site is intended to present A&PM services and gather enquiries for staff-led consultation and quotations. The project direction calls for a Laravel-first site and gives this monolith choice as an example decision to record.

## Options considered

1. Continue as one Laravel application, using Blade for public pages and Laravel for request handling and persistence.
2. Build a separate frontend application and expose a Laravel API.
3. Introduce a separate headless content platform and frontend.

## Decision

Continue with one Laravel-first application. Use Laravel routes, Blade, Eloquent, and Vite for the public website and business workflows. If Filament is adopted, add it inside this application. A separate frontend/API or content platform requires a new approved ADR explaining the concrete need.

## Rationale

This matches the existing repository and the consultation-led website scope. It keeps routing, server-rendered pages, validation, persistence, and future staff authorization in one application without introducing a second deployment or duplicated application boundary before a requirement exists.

## Consequences

- Public pages should use reusable Blade layouts, partials, and components.
- Frontend assets remain built through the existing Vite setup unless a documented decision changes it.
- Future enquiry handling and administration can share Laravel models and authorization rules.
- The project still needs to resolve the planned Tourm Bootstrap integration with the current Tailwind scaffold.
- Revisit this decision if approved requirements demand a separately deployed frontend, public API, independent content platform, or scaling boundary.
