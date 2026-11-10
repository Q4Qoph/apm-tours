# Project Documentation

This directory contains the A&PM Tours & Travel implementation roadmap and technical guidance. Keep it aligned with the repository; mark proposals **Planned** and unknowns **Not yet verified**.

## Start here

- [November 10 stakeholder follow-up](STAKEHOLDER-FOLLOWUP-2026-11-10.md) — approved destination search, regional/duration controls, enquiry prefill, photo redaction and WhatsApp checks.

- [Contact spam protection](CONTACT-SPAM-PROTECTION.md) — Turnstile, layered limits, duplicate/acknowledgement controls and separate email-routing safeguards; local keys configured; genuine browser verification and rollout pending.

- [Production deployment](DEPLOYMENT.md) — verified Contabo SSH target, release procedure, rollback backup and live verification.

- [Contact form design review](CONTACT-FORM-DESIGN-REVIEW.md) — screenshot/source findings, form-usability research and approved visual revision; implemented locally with remaining interactive acceptance noted.

- [Contact form implementation plan](CONTACT-FORM-PLAN.md) — original Tourm form findings, proposed fields, Cloudflare SMTP delivery to both approved recipients, approved email-only scope and acceptance checks. Implemented locally; browser/live SMTP verification pending.

- [Source-document content audit](CONTENT-SOURCE-AUDIT.md) — comparison findings, FAQ corrections, approved exceptions, and remaining demo-content gaps.
- [Stakeholder feedback action plan](STAKEHOLDER-REVIEW-PLAN.md) — proposed response to the 2026-11-04 forwarded feedback; awaiting approval before coding.
- [Implementation roadmap](IMPLEMENTATION.md) — authoritative phases, task status, verification, blockers, and next work.
- [Implementation plan](IMPLEMENTATION-PLAN.md) — owner-directed page-copy scope, page map, reusable components, and remaining decisions.
- [Landing page plan](LANDING-PAGE-PLAN.md) — Company Profile content mapped to Tourm components and current routes; implemented sections and deferred items are identified.
- [Search and Trip Finder research](SEARCH-AND-TRIP-FINDER-RESEARCH.md) — competitor patterns and a proposed A&PM catalogue search/results/quote journey; search is not implemented yet.
- [Architecture](ARCHITECTURE.md) — current Laravel application boundaries and the accepted Laravel-first direction.
- [Database](DATABASE.md) — observed migrations, models, database configuration, and future data rules.
- [Frontend](FRONTEND.md) — current Vite/Tailwind scaffold, Tourm-to-Blade integration, assets and branding.
- [Development](DEVELOPMENT.md) — environment requirements and verified setup/development commands.
- [Testing](TESTING.md) — current test configuration, commands, coverage, and verification expectations.
- [Architecture decisions](decisions/) — dated ADRs for significant accepted decisions.
- [Agent instructions](../AGENTS.md) — repository-wide coding-agent rules.

## Maintenance

Update `IMPLEMENTATION.md` when progress, verification, blockers, or priorities change. Update the relevant technical guide when code, commands, architecture, or behavior changes. Record a significant approved architecture change as a new ADR instead of silently rewriting history.
