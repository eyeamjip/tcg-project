# The Clean Guys LLC — Website Project

Marketing & lead-generation website for [The Clean Guys LLC](https://thecleanguyslv.com), a Las Vegas–based cleaning company specializing in window cleaning, move in/out, post-construction, and commercial cleaning.

**Stack:** WordPress 6+ · Kadence theme + custom child · Rank Math SEO · WPForms · LiteSpeed/WP Rocket caching
**Goal:** drive organic local leads through SEO and convert them via a multi-step quote form.

---

## Quick start

```bash
# 1. Read the plan
cat plan.md

# 2. Confirm the 7 open decisions with the client (top of plan.md)

# 3. Spin up local WordPress dev environment
#    Recommended: Local by Flywheel, LocalWP, or DDEV
#    Site URL: https://thecleanguys.local
#    PHP 8.2+, MySQL 8+

# 4. Activate child theme from /theme/thecleanguys-child/
#    (after parent Kadence theme is installed)

# 5. Work through plan.md phase by phase
```

## Project structure

```
TheCleanGuys/
├── plan.md                       Build plan (the source of truth — read first)
├── README.md                     This file
├── /docs/
│   ├── project_brief.docx        Client-facing project brief
│   ├── decisions_log.md          Record of all open decisions + dates resolved
│   ├── seo_keyword_map.md        Keyword → page mapping
│   ├── client_handoff.md         Final handoff doc for Kervin & Jason
│   └── qa_log.md                 Pre-launch QA findings
├── /copy/
│   ├── page_copy_master.md       Aggregated SEO copy (read-only reference)
│   ├── home.md                   Per-page copy files
│   ├── window-cleaning.md
│   ├── move-in-move-out-cleaning.md
│   ├── post-construction-cleaning.md
│   ├── commercial-cleaning.md
│   ├── about.md
│   ├── service-areas.md
│   ├── faq.md
│   ├── contact.md
│   └── get-a-quote.md
├── /prototypes/
│   └── quote_form_prototype.html Working HTML prototype for WPForms config
├── /assets/
│   ├── /photos/                  Client photography (drop here)
│   ├── /logos/                   Brand marks
│   └── /icons/                   UI/service icons
├── /theme/
│   └── /thecleanguys-child/      WordPress child theme
│       ├── style.css
│       ├── functions.php
│       ├── /template-parts/
│       └── /patterns/            Gutenberg block patterns
├── /schema/                      JSON-LD reference files
└── /scripts/                     Deploy, backup, Lighthouse CI
```

## Development workflow

1. **Read `plan.md` top to bottom.** Don't skip phases.
2. **Confirm decisions D1–D7** before any work that depends on them.
3. **Update `plan.md`** as you complete tasks (`[ ]` → `[x]`).
4. **Commit after every meaningful task** with format: `[phase-X] task description`.
5. **Log decisions** in `docs/decisions_log.md` as they're made.

## Brand voice

> **You call, we clean.**

Direct. Confident. Local. No agency-speak. No emoji in body copy. Sentence case for headings. The owners are Kervin & Jason — write like the company is them, because it is.

## Contact

- **Owners:** Kervin & Jason
- **Phone:** 702-551-4878
- **Email:** Contact@thecleanguyslv.com
- **Hours:** Mon–Sat 6:00 AM – 7:30 PM, Sun closed
- **Las Vegas, NV** · Licensed, bonded, insured · Est. 2022

## License

Project files are proprietary to The Clean Guys LLC. Do not redistribute.
