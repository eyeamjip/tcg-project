# The Clean Guys LLC — Website Build Plan

**For:** Claude Code execution
**Project:** Replace Google Sites at `thecleanguyslv.com` with a fast, mobile-first, SEO-optimized WordPress site
**Owner:** Kervin & Jason (`Contact@thecleanguyslv.com` · 702-551-4878)
**Stack:** WordPress + Kadence theme + Rank Math SEO + WPForms + custom child theme
**Phase:** 1 of 2 (Phase 2 = online booking + payments, scoped separately)

---

## Current state (as of 2026-05-13)

> **🆕 Monorepo restructure (2026-05-13 evening):** Project moved into the `tcg-project` monorepo. New path: `Z:\AI Brain\projects\tcg-project\website\` (this file is now `tcg-project/website/plan.md`). Sibling: `tcg-project/crm/` (the TCG CRM). Preview HTML served from `tcg-project/docs/` at **https://eyeamjip.github.io/tcg-project/**. GitHub repo renamed `tcg-preview` → `tcg-project`. Old `Z:\AI Brain\projects\TheCleanGuys\` folder archived at `..\TheCleanGuys_archive_2026-05-13\` (delete after monorepo verified).

**Phase 0:** ~80% complete. Repo structure, all reference docs imported, 10 per-page copy files split, decisions log scaffolded, SEO keyword map drafted. **Pending:** git init (D7), local WordPress dev env (D2).

**Phase 1:** Pre-work only. Child theme `style.css` + `functions.php` skeletons exist locally; Kadence parent + plugins not installed (blocked on D2 hosting/dev env).

**Phase 2:** Source content complete — all 10 page copies written, schema JSON-LD files drafted, quote form HTML prototype working at `/prototypes/quote_form_prototype.html`. **Two homepage design directions** drafted as standalone HTML for client review: `/prototypes/homepage-v1-editorial.html` (minimalist/editorial) and `/prototypes/homepage-v2-bold.html` (bold trades). **Both homepages have the multi-step quote form integrated as a `<dialog>` modal** — every "Get a quote" CTA opens the form inline (no page navigation). **Both prototypes deployed to GitHub Pages preview** at `https://eyeamjip.github.io/tcg-preview/` (V1, V2, and CRM). Pending client pick before WordPress page builds. **No pages built in WordPress yet.**

Latest polish on the homepage prototypes (2026-05-09):
- Reviews section spacing tightened on mobile (was 250+px gap, now ~80px V1 / ~100px V2)
- H1 tagline now reads `You call, we Clean.` on a single line (capital C references company name)
- V2: "Clean" highlighted in mint green accent (`#1D9E75`) for contrast on the dark hero
- V1: "Clean" already in brand teal via `<em>` styling

Service catalog expansion (2026-05-12):
- **NEW: Residential cleaning** added as 5th service (recurring + one-time home cleaning, distinct from window/move/post-construction). Section heading on V1 and V2 changed from "What we clean" → "Residential and Commercial cleaning." Featured as a wide hero card spanning both columns; 4 specialized services in 2×2 grid below (Gestalt symmetry).
- Card order swap: Commercial ↔ Move in/out — recurring services (Window, Commercial) on top row, project-based services (Post-construction, Move) on bottom row.
- Tagline reverted to 2-line layout: `You call,` / `we Clean.` (better visual rhythm per JP's read).
- Quote form (standalone + embedded modal in V1/V2): Residential + Commercial **combined** into single Step 1 tile ("Residential or Commercial"), with 2-col big-radio sub-picker introduced at top of Step 2. Property-type dropdown filters based on subtype (progressive disclosure). Step 1 is now 4 tiles (perfect 2×2 grid, Gestalt symmetry).
- **NEW: Service detail modals** on V1 and V2 — clicking any service card opens a rich modal (photo hero, what's included, add-ons, pricing, who it's for, "why this is different"). Modal CTA pre-fills the quote form with that service. Modal also includes inline "See the full service page →" link to the eventual /service-name URL.
- Service detail modals: widened to 1280px (V1) / 1320px (V2); body restructured into 2-column desktop layout — spec (What's included / Add-ons) on left, conversion content (Pricing / Best for / Why different) on right; hero slimmed to cinematic 4:1 on desktop. All content fits without scrolling on 1080p+ displays. Mobile untouched (still 16:10 hero, single-column body, full-width CTA).
- Service modal CTA button: content-sized on desktop (was full-width stretch via `flex: 1`), still 100% width on mobile.
- CRM prototype: added Residential to filter pills, calendar legend, lead-pipeline filters, and one sample client row.
- **NEW: TCG CRM workspace max-width standard applied** — all 8 view wrappers updated from per-view max-w (1100/1400/1600/1800px) to `max-w-[2800px] mx-auto`. Verified: 1080p edge-to-edge, 1440p edge-to-edge, 4K ~78% utilization (~404px margin each side). Mobile untouched. Standard: `feedback_desktop_max_width.md`.

Photography upgrade (2026-05-12 evening):
- **All Unsplash/Pexels stock photos replaced** with TCG-branded generated photos delivered by JP: 8 webp files placed in `/assets/photos/` (and mirrored to `.gh-preview/assets/photos/` for GitHub Pages serving).
- Photo slot map: hero-v1 (V1 hero portrait), hero-v2 (V2 hero portrait with motion), residential (sunlit living room w/ tech vacuuming, wide 21:9), window (squeegee mid-stroke), move (empty apartment + cleaning kit), post-construction (drywall dust on countertop), commercial (floor scrubber in medical lobby), team (Kervin & Jason portrait outside modern Vegas home).
- Brand consistency: every shot uses the same uniform (navy polo + black pants), same Vegas setting (palm trees, mountains, desert landscaping). Same crew member identifiable across multiple service shots.
- Hosting: photos are now self-hosted (~1.5MB total WebP payload) instead of relying on Unsplash/Pexels CDN.

V2 Why-pick-us section restructure (2026-05-12 evening):
- Added centered team photo with "MEET THE OWNERS / Kervin & Jason" caption between the value statement and the icon-card grid. V2 now has the same trust-anchor pattern as V1.
- V1 Why-pick-us section also restructured: was asymmetric 2-col (text-left / photo-right), now vertical centered flow (head → centered team photo → 2-col reasons grid). Same content, photo gets prime-real-estate treatment.
- Both versions now show the eyebrow "MEET THE OWNERS" above the names with brand-teal tracked uppercase styling, matching the existing section-eyebrow visual language.

Polish + bug fixes (2026-05-12 late evening):
- Services section heading: `Five services. Done right.` was wrapping with "right." orphaned on its own line on desktop. Fixed by bumping `max-width` on the h2 (820px V1 / 920px V2) and adding `white-space: nowrap` (desktop only — mobile media query restores `white-space: normal` so it wraps naturally at narrow viewports).
- Mobile horizontal overflow guard added to both V1 and V2: `html, body { overflow-x: hidden; overflow-x: clip; }` — defensive safety net so no future wide element can cause the body to scroll sideways. `clip` preserves sticky-header positioning where supported; falls back to `hidden` on older browsers.

TCG CRM topbar restructure (2026-05-12 late evening):
- Moved search bar from inside the sidebar into a new **full-width topbar above the entire app shell**. Matches Realtor CRM workspace baseline pattern (Linear/Notion/Vercel-style global-search placement).
- Sidebar now sticky-positioned below topbar (`top: 3.5rem`, `height: calc(100vh - 3.5rem)`, `align-self: flex-start`) instead of `h-screen sticky top-0`.
- Sub-nav (Today/Week/Month/Quarter on Overview) is now a standalone element inside `<main>`, sticky at `top: 3.5rem` just below topbar — was previously the second row of the old topbar.
- Topbar dropped the breadcrumb (`Workspace > Overview`) — redundant with the sidebar's active-state highlight. Crumb JS gracefully no-ops on missing element.
- UX rationale: search is a *global* action across all data (clients, invoices, jobs, contracts) — global UI placement matches global scope. Frees sidebar real estate for pure nav. Matches user mental model from every modern admin tool.

TCG CRM mobile UX overhaul (2026-05-13):
- **Sidebar now visible on mobile (not hidden).** Removed the `@media (max-width: 1023px) { .sidebar { display: none } }` rule. Sidebar serves nav on all viewports now.
- **Bottom tab bar fully retired.** HTML element + `.tab-item` / `.bottom-tabs` CSS removed. Single nav source = lower decision cost (Hick's Law).
- **Default-collapsed on mobile.** On first visit, JS adds `is-collapsed` class via `window.matchMedia('(max-width: 1023px)')` check. Stored preference always wins; mobile default only kicks in when nothing is stored.
- **Topbar mobile mini-logo removed.** Sidebar's TCG brand mark is the single source of brand identity now — was a duplicate on mobile.
- **Brand mark updated: `tg` → `TCG`.** Container bumped w-9 → w-10 (40px) with text-[13px] to fit the longer acronym. Cleaner brand recognition.
- **Collapsed sidebar tap-target spec:** width bumped 72px → 80px on mobile; nav-item icons bumped 16px → 22px with `min-height: 44px` padding to hit Apple HIG.
- **Chevron toggle position differs per breakpoint:**
    - Desktop: `top: 1.5rem` (aligned with TCG logo row)
    - Mobile: `top: 4rem` (aligned with the H1 "Good afternoon, Kervin." center line)
- **Chevron mobile overhang reduced** from `right: -16px` to `right: -8px` — the old `-16px` exactly matched the mobile px-4 padding and caused the chevron to kiss the H1's "G". New `-8px` keeps the floating-at-seam visual but gives 8px breathing room.
- **Chevron sizing:** desktop 28×28, mobile 32×32 (thumb-friendly).
- **FAB position:** was `bottom: 84px` to clear the now-removed tab bar; bumped down to `bottom: max(24px, env(safe-area-inset-bottom))` for iOS home-indicator clearance.
- Mobile UX trade-off worth flagging: when sidebar is expanded on a 393px viewport, it covers ~232px / 59% of width. User may want to tap-to-collapse-after-selection in a future polish pass. Not blocking — current default-collapsed pattern means most users won't hit this often.

Copy files status (2026-05-12):
- [x] `/copy/residential-cleaning.md` drafted — full SEO-ready page with meta, intro, what's included, add-ons, audience segments, pricing tiers, cadence guide, differentiators, trust block, CTA, 10-FAQ block with schema reference, and internal links to the other 4 service pages.
- [x] `/copy/window-cleaning.md`, `/copy/move-in-move-out-cleaning.md`, `/copy/post-construction-cleaning.md`, `/copy/commercial-cleaning.md` — all updated to cross-link to the new Residential page in their "Internal links" footer block.
- [x] `/copy/home.md` — services section updated to 5 services with Residential as hero card + Commercial/Move swap reflected.
- [ ] `/schema/faq-residential.json` — needs drafting (mirror `faq-window.json` structure).
- [ ] `/schema/service-pages-schema.json` — needs Residential service node added.

**Phase 3–5:** Not started. Helper scripts (`deploy.sh`, `backup.sh`, `lighthouse-check.sh`) drafted in `/scripts/`.

**Phase 6:** `docs/client_handoff.md` exists as a fillable template.

**Blocking:** All 7 client decisions (D1–D7) still open in `/docs/decisions_log.md`. No build work can proceed until at minimum D1 (domain), D2 (hosting), D3 (email/SMTP) are answered.

**Next concrete steps:** see `/docs/handoff.md`.

---

## Adjacent scope — TCG CRM (separate project)

Started 2026-05-09 as a sibling project at `Z:\AI Brain\projects\TCG-CRM\`. Internal admin system for Kervin & Jason — clients, invoices, contracts, calendar, forecast, audit log, mobile job mode for techs. **Not part of this WordPress build.** Connects to it later via the website's quote-form webhook (form submissions → CRM leads).

- Plan: `C:\Users\jpman\.claude\plans\act-like-you-re-an-binary-cray.md`
- Prototype: `Z:\AI Brain\projects\TCG-CRM\prototypes\index.html`
- Live preview: `https://eyeamjip.github.io/tcg-preview/crm.html`
- Status: 7 of 9 modules built (Overview, Leads, Clients list+detail, Booking Calendar, Forecast, Audit Log, Mobile Job Mode). Remaining placeholders: Invoices, Contracts, Users, Settings.
- Stack proposed: Next.js 14 + Tailwind + shadcn/ui + Supabase + Stripe + DocuSeal + FullCalendar
- Recommended timeline: starts AFTER marketing site Phase 1 ships and produces leads (~Phase 2 of TCG roadmap, 60–90 days post-launch)

---

## How to use this plan

This file is the source of truth for the build. Work top to bottom — phases are sequential, tasks within a phase can sometimes run in parallel (noted where applicable).

**Rules of engagement for Claude Code:**

1. **Mark progress in this file.** Update the checkbox `[ ]` → `[x]` as you complete each task. Add a one-line note under the task with what was done and any deviations.
2. **Before any task that hits an external service** (registrar, hosting, GA4, Search Console, Google Business Profile), stop and confirm credentials with the user — never fabricate API keys or guess at access.
3. **When a decision blocks progress**, stop and ask. Don't pick for the user on anything in the "Open decisions" list at the top of each phase.
4. **Commit after every meaningful task** with the format: `[phase-X] task description`. Keep commits small and reversible.
5. **Run the verification step** for each task before marking it complete. If verification fails, fix it before moving on.
6. **Reference the source documents** — page copy lives in `/copy/page_copy_master.md`, the project brief is in `/docs/project_brief.docx`, the form prototype is in `/prototypes/quote_form_prototype.html`.

---

## Project structure to create

```
/thecleanguys-site/
├── plan.md                              ← this file
├── README.md                            ← setup + dev instructions
├── /docs/
│   ├── project_brief.docx               ← client-facing brief
│   ├── decisions_log.md                 ← record every decision + date
│   └── seo_keyword_map.md               ← keyword → page mapping
├── /copy/
│   ├── page_copy_master.md              ← all page copy + meta + FAQ
│   ├── home.md
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
│   └── quote_form_prototype.html        ← reference for WPForms config
├── /assets/
│   ├── /photos/                         ← from client (Yelp, IG, originals)
│   ├── /logos/
│   └── /icons/
├── /theme/
│   └── /thecleanguys-child/             ← Kadence child theme
│       ├── style.css
│       ├── functions.php
│       ├── /template-parts/
│       └── /patterns/                   ← reusable Gutenberg block patterns
├── /schema/
│   ├── localbusiness.json               ← LocalBusiness JSON-LD
│   ├── faq-window.json
│   ├── faq-move.json
│   ├── faq-post-construction.json
│   ├── faq-commercial.json
│   └── service-pages-schema.json        ← Service schema per page
└── /scripts/
    ├── deploy.sh                        ← rsync to staging/prod
    ├── backup.sh                        ← pre-deploy DB + files snapshot
    └── lighthouse-check.sh              ← CI page-speed gate
```

---

## Open decisions (block work — confirm with user before starting Phase 0)

- [ ] **D1 — Domain registrar access.** Who owns `thecleanguyslv.com`? Need login credentials or a delegated DNS push from the owner. *Without this, we cannot launch.*
- [ ] **D2 — Hosting provider.** Recommendation: SiteGround GrowBig ($30/mo) or Cloudways DigitalOcean 2GB ($26/mo). Confirm choice before provisioning.
- [ ] **D3 — Email provider for form submissions.** Google Workspace (`Contact@thecleanguyslv.com` already exists), or use existing setup with SMTP relay (e.g. Postmark/SendGrid)?
- [ ] **D4 — Photography source.** Pull from Yelp's 47 photos + Instagram (174 posts), commission a half-day shoot, or both?
- [ ] **D5 — Review widget choice.** Live Google Reviews API embed, or static testimonial pull?
- [ ] **D6 — Phase 1 includes live booking? Default: NO** — quote form only at launch, booking integrated post-launch in Phase 2.
- [ ] **D7 — GitHub repo or local-only?** Recommend GitHub private repo for version control + future agency handoff.

**Stop here until D1–D7 are answered. Document each in `/docs/decisions_log.md`.**

---

# PHASE 0 — Project initialization (Day 1)

Goal: working local dev environment, repo set up, all reference documents imported.

## 0.1 — Initialize repo

- [ ] Create git repo (local + remote if D7 = GitHub) — *blocked on D7*
- [x] Create directory structure shown above
- [x] Add `.gitignore` (WordPress + Node + macOS standard)
- [x] Add `README.md` with: project summary, local dev setup, deploy commands
- [ ] Initial commit: `[phase-0] initialize repo and structure` — *blocked on D7*

**Verify:** `git status` clean; directory tree matches spec above.

## 0.2 — Import reference documents

- [x] Copy `TheCleanGuys_Project_Brief.docx` → `/docs/project_brief.docx`
- [x] Copy `page_copy_master.md` → `/copy/page_copy_master.md`
- [x] Copy `quote_form_prototype.html` → `/prototypes/quote_form_prototype.html`
- [x] Split `page_copy_master.md` into per-page files in `/copy/` (one .md per URL) — 10 files in `/copy/`
- [x] Create `/docs/decisions_log.md` with D1–D7 outcomes recorded — scaffolded, all decisions still OPEN

**Verify:** All 10 page copy files exist and contain meta title, meta description, H1, body, and FAQ sections.

## 0.3 — Local WordPress dev environment

- [ ] Install Local by Flywheel (or LocalWP / DDEV — pick one and document in README)
- [ ] Spin up site: `thecleanguys.local`, PHP 8.2, MySQL 8, Nginx
- [ ] Install WordPress latest stable
- [ ] Set permalinks to `Post name` structure (`/%postname%/`)
- [ ] Set timezone to `America/Los_Angeles`
- [ ] Set site title: "The Clean Guys LLC"; tagline: "You call, we clean."

**Verify:** `https://thecleanguys.local` loads default WordPress; admin accessible.

## 0.4 — Build keyword map

- [x] Create `/docs/seo_keyword_map.md`
- [x] For each of the 10 pages, document: primary keyword, 2–3 secondary keywords, search intent (informational/transactional/local), and target meta title/description (already in `page_copy_master.md` — formalize into a table)

**Verify:** Every page has at least one primary keyword and one local modifier (city name).

---

# PHASE 1 — Foundation: theme, plugins, settings (Days 2–3)

Goal: WordPress configured, theme installed, all required plugins active and configured.

## 1.1 — Install Kadence theme + child theme

- [ ] Install free Kadence theme from WP repo — *blocked on D2 (no WP env yet)*
- [x] Create child theme at `/theme/thecleanguys-child/` — skeleton drafted, not yet activated
  - `style.css` with proper header pointing to Kadence parent
  - `functions.php` with enqueue logic
- [ ] Activate child theme — *blocked on WP install*
- [ ] Define brand color palette in Kadence Customizer:
  - Primary: `#0F6E56` (brand teal)
  - Primary dark: `#085041`
  - Accent: `#1D9E75`
  - Ink: `#1A1A1A`
  - Ink soft: `#555555`
  - Background: `#FAFAF7`
- [ ] Set typography: System sans (`-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif`), or commit to a Google Font (Inter recommended) — confirm with user

**Verify:** Front-end loads with brand colors; child theme is active (check Appearance > Themes).

## 1.2 — Install required plugins

Required plugins (free unless noted):

- [ ] **Rank Math SEO** — schema, sitemaps, redirects, meta management
- [ ] **WPForms Lite** (or Gravity Forms if user has license) — quote form
- [ ] **WP Rocket** ($59/yr) OR **LiteSpeed Cache** (free if hosting supports) — caching
- [ ] **Imagify** or **ShortPixel** — image compression
- [ ] **WP Mail SMTP** — reliable form delivery
- [ ] **Wordfence** — security
- [ ] **UpdraftPlus** — backups
- [ ] **Redirection** — manage 301s during migration

Deactivate and delete: Hello Dolly, Akismet (replace with Wordfence), default themes other than current Kadence.

**Verify:** All plugins active; no PHP errors in `/wp-content/debug.log`.

## 1.3 — Configure Rank Math

- [ ] Run setup wizard
- [ ] Connect to Google Search Console (requires D1)
- [ ] Set business type: `Local Business` → `Cleaning Service`
- [ ] Enter NAP: name, address (Las Vegas, NV), phone (702-551-4878)
- [ ] Set hours: Mon–Sat 6:00–19:30, Sun closed (verify with client — Yelp shows different hours from Google Sites)
- [ ] Add social profiles: Instagram, Facebook, Yelp, Google Business
- [ ] Enable: XML Sitemap, Schema Generator, 404 Monitor, Redirections, Local SEO module
- [ ] Set focus keyword tracking on

**Verify:** `/sitemap_index.xml` loads with all post types listed; LocalBusiness schema visible in source on homepage (use [Schema Markup Validator](https://validator.schema.org/)).

## 1.4 — SMTP configuration

- [ ] Configure WP Mail SMTP with sending domain
- [ ] Set "From" address to `noreply@thecleanguyslv.com` (or `Contact@thecleanguyslv.com`)
- [ ] Send test email to `Contact@thecleanguyslv.com`

**Verify:** Test email received; not in spam folder; SPF/DKIM aligned (check `mail-tester.com` score, target 9+/10).

## 1.5 — Global settings

- [ ] Disable comments site-wide (Settings → Discussion)
- [ ] Disable XML-RPC (functions.php or plugin)
- [ ] Hide WordPress version
- [ ] Disable file editing in admin (`define('DISALLOW_FILE_EDIT', true);` in `wp-config.php`)
- [ ] Set up favicon (need from client — D4 dependency)
- [ ] Configure header: logo, phone CTA `📞 702-551-4878`, primary nav
- [ ] Configure footer: NAP, hours, services list, social links, "Licensed · Bonded · Insured · Est. 2022"

**Verify:** Source view of any page shows no WP version; comments disabled; header/footer render across all viewports.

---

# PHASE 2 — Page build (Days 4–10)

Goal: all 10 pages built, populated with copy from `/copy/`, all meta tags set, schema deployed.

**Build order matters** — start with highest-traffic, highest-revenue pages first. If anything slips, the most critical pages still ship.

## 2.1 — Build reusable Gutenberg block patterns

Create these in `/theme/thecleanguys-child/patterns/` so every page uses consistent components:

- [ ] **Hero with CTA** — H1 + sub + primary button + phone CTA + trust strip
- [ ] **Service card grid** — 4-up service cards with icon, title, blurb, link
- [ ] **Trust strip** — license badges, review badges, locally-owned tag
- [ ] **CTA banner** — full-width "Get a quote" call-out with button + phone
- [ ] **FAQ accordion** — schema-compatible expand/collapse Q&A
- [ ] **Service area list** — 11 cities + map embed
- [ ] **Testimonial block** — review card (name, stars, quote, source)

**Verify:** Each pattern available under "Patterns" in the block editor; renders on a test page.

## 2.2 — Homepage (`/`)

**Source:** `/copy/home.md`
**Design direction:** *Pending client pick from `/prototypes/homepage-v1-editorial.html` vs `/prototypes/homepage-v2-bold.html` — see `docs/handoff.md` for the comparison.*
**Priority:** Critical

- [ ] Create page; set as static front page (Settings → Reading)
- [ ] Build hero: H1 "You call, we clean.", sub, primary CTA → `/get-a-quote`
- [ ] Build trust strip
- [ ] Build "What we clean" 4-card service grid
- [ ] Build "Why Las Vegas businesses pick us" with bullet list
- [ ] Build service area summary block linking to `/service-areas`
- [ ] Build review/testimonial section (per D5 decision)
- [ ] Build homepage FAQ (3 entries from copy doc)
- [ ] Build final CTA banner
- [ ] Set meta title: `Las Vegas Cleaning Services | Window, Move-Out & More`
- [ ] Set meta description (155 char): per copy doc
- [ ] Deploy LocalBusiness schema via Rank Math (uses settings from 1.3) — verify it includes `areaServed`, `openingHoursSpecification`, `sameAs` array
- [ ] Add Open Graph image (1200×630)

**Verify:**
- One H1, no duplicates (`view-source` + Ctrl+F "h1")
- Schema validates at `validator.schema.org`
- Mobile Lighthouse SEO score ≥ 95
- Mobile Lighthouse Performance score ≥ 85

## 2.3 — Service landing page: Window cleaning (`/window-cleaning`)

**Source:** `/copy/window-cleaning.md`
**Priority:** Critical (highest search volume of the 4 services in Las Vegas)

- [ ] Create page with full copy from source
- [ ] H1: "Window cleaning in Las Vegas — streak-free, every time."
- [ ] Build "What's included" section
- [ ] Build "Who we clean for" 4-segment grid (homes, storefronts, offices, HOAs)
- [ ] Build "How often" educational section
- [ ] Build pricing transparency block
- [ ] Build CTA with pre-filled service param: `/get-a-quote?service=window`
- [ ] Build FAQ section (5 entries with FAQ schema)
- [ ] Set meta title, description per copy doc
- [ ] Add Service schema + FAQPage schema (Rank Math)
- [ ] Add internal links to other 3 service pages in footer block

**Verify:** FAQ schema visible in page source; questions render in rich result test ([rich results test](https://search.google.com/test/rich-results)).

## 2.4 — Service landing page: Move in/move out (`/move-in-move-out-cleaning`)

**Source:** `/copy/move-in-move-out-cleaning.md`
**Priority:** High (high-intent transactional traffic)

- [ ] Same build pattern as 2.3
- [ ] H1: "Move in / move out cleaning that gets your deposit back."
- [ ] Build "What we clean on a move-out job" 4-section detail block (kitchen / bathrooms / bedrooms / details landlords check)
- [ ] Build "Who books move cleanings with us" segment list
- [ ] Build "How long does it take?" + pricing reference
- [ ] CTA: `/get-a-quote?service=move`
- [ ] FAQ + schema

**Verify:** Same as 2.3.

## 2.5 — Service landing page: Post construction (`/post-construction-cleaning`)

**Source:** `/copy/post-construction-cleaning.md`
**Priority:** High (high ticket value, contractor-facing)

- [ ] Same build pattern
- [ ] H1: "Post-construction cleaning that contractors actually call back."
- [ ] Build "Three-phase approach" timeline block (rough → final → touch-up)
- [ ] Build "What's specifically included" detailed checklist
- [ ] Build contractor trust block (insurance, scheduling, COI)
- [ ] CTA: `/get-a-quote?service=post-construction`
- [ ] FAQ + schema

**Verify:** Same as 2.3.

## 2.6 — Service landing page: Commercial (`/commercial-cleaning`)

**Source:** `/copy/commercial-cleaning.md`
**Priority:** High (recurring revenue model)

- [ ] Same build pattern
- [ ] H1: "Commercial cleaning that shows up — every time, on time."
- [ ] Build "Who we clean for" 4-segment grid (offices, retail, restaurants, salons)
- [ ] Build "Recurring service model" 3-cadence block (daily / weekly / monthly)
- [ ] Build "Why businesses pick us over the franchises" differentiator block
- [ ] CTA: `/get-a-quote?service=commercial`
- [ ] FAQ + schema

**Verify:** Same as 2.3.

## 2.7 — Get a quote (`/get-a-quote`)

**Source:** `/prototypes/quote_form_prototype.html`
**Modal pattern:** Both homepage prototypes (v1, v2) already have the form integrated as a `<dialog>` modal — when WPForms is wired up, mirror this UX: every quote CTA on the site opens the form inline rather than navigating to a separate page. Keep `/get-a-quote` as a real page for SEO + JS-disabled fallback, but treat it as the "no-JS" route.
**Priority:** Critical — this is the conversion point for every other page

- [ ] Build hero matching prototype (compact, focused)
- [ ] Configure WPForms with conditional logic mirroring prototype:
  - Step 1: service tile select (window / move / post-construction / commercial) — required
  - Step 2 conditional fields per service:
    - **All:** property type, square footage, timing, notes
    - **Window:** approximate window count, interior/exterior/both
    - **Move:** moving in or out
    - **Post-construction:** which phase(s), role (contractor/builder/homeowner)
    - **Commercial:** frequency
  - Step 3: contact info (first name, last name, phone, email, address, contact preference)
- [ ] Pre-fill service from URL param: `?service=window` → tile pre-selected
- [ ] Form submission routing:
  - Email to `Contact@thecleanguyslv.com` with structured subject `[Quote Request] {service} - {firstName}`
  - Auto-reply to submitter with "we'll respond within an hour during business hours"
  - Save submission to WP database (WPForms entries)
- [ ] GA4 event on submit: `generate_lead` with `service` and `value` params
- [ ] Mobile-first responsive — test at 375px, 414px, 768px, 1024px
- [ ] Honeypot anti-spam field
- [ ] reCAPTCHA v3 (invisible) configured

**Verify:**
- Submit a test quote → email arrives at `Contact@thecleanguyslv.com` within 60 seconds
- Auto-reply arrives at submitter address
- GA4 DebugView shows `generate_lead` event firing
- Form is keyboard-navigable; screen-reader labels present (test with VoiceOver or NVDA)
- All conditional fields show/hide correctly per service selection

## 2.8 — About page (`/about`)

**Source:** `/copy/about.md` (extract from `page_copy_master.md` — currently in homepage About section)

- [ ] Build hero: "Meet Kervin & Jason"
- [ ] Pull existing About copy from current Google Site (already strong)
- [ ] Add "What you can expect from us" 4-bullet promise block
- [ ] Add owner photo (need from client — D4 dependency)
- [ ] Add CTA banner

**Verify:** Page loads; meta title/description set; H1 unique.

## 2.9 — Service areas (`/service-areas`)

**Source:** `/copy/service-areas.md` (write from city list in `page_copy_master.md`)

- [ ] Build hero: "We clean across the Las Vegas Valley"
- [ ] List all 14 service areas (from project brief): Las Vegas (Downtown, Strip, Summerlin, Centennial Hills), Henderson, North Las Vegas, Spring Valley, Enterprise, Paradise, Sunrise Manor, Green Valley, Southern Highlands, Rhodes Ranch, Whitney
- [ ] Embed Google Map (centered on Las Vegas, marker at business)
- [ ] For each city, write 2–3 sentences (local SEO pages — even thin, this signals coverage)
- [ ] **Phase 2 enhancement:** create dedicated landing pages per city (e.g. `/window-cleaning-summerlin`) — DO NOT BUILD IN PHASE 1, but reserve URL pattern

**Verify:** All 14 cities mentioned; map embed loads; meta set.

## 2.10 — FAQ page (`/faq`)

**Source:** Aggregate FAQs from all service pages + the master copy doc

- [ ] Build accordion with categorized questions:
  - General (pricing, insurance, areas served, scheduling)
  - Window cleaning (5 questions from 2.3)
  - Move cleaning (5 questions from 2.4)
  - Post construction (5 questions from 2.5)
  - Commercial (5 questions from 2.6)
- [ ] Add FAQPage schema to entire page
- [ ] Add CTA banner at bottom

**Verify:** All FAQ questions render; schema validates; rich results test passes.

## 2.11 — Contact page (`/contact`)

**Source:** `/copy/contact.md` (write fresh)

- [ ] Build hero: "Get in touch."
- [ ] Phone (clickable tel: link)
- [ ] Email (mailto: link)
- [ ] Hours
- [ ] Map embed
- [ ] Short fallback contact form (name, email, message)
- [ ] Social links

**Verify:** All contact methods clickable on mobile; form delivers to same inbox as quote form.

---

# PHASE 3 — Technical SEO + performance (Days 11–13)

## 3.1 — Schema deployment audit

- [ ] LocalBusiness schema on every page (via Rank Math global)
- [ ] Service schema on each of 4 service pages
- [ ] FAQPage schema on each service page + main FAQ page
- [ ] BreadcrumbList schema sitewide
- [ ] Organization schema with `sameAs` array (social profiles)
- [ ] Test every page at `validator.schema.org`
- [ ] Test homepage + service pages at Google Rich Results Test

**Verify:** Zero schema errors; warnings reviewed and addressed where reasonable.

## 3.2 — Image optimization

- [ ] Run Imagify/ShortPixel bulk optimization
- [ ] Convert all images to WebP with JPEG fallback
- [ ] Lazy-load images below the fold (Kadence default)
- [ ] Set explicit `width` and `height` attributes on every image (prevents CLS)
- [ ] Write descriptive alt text on every image (include keywords naturally — e.g. "Window cleaning crew working on Summerlin home" not "image1.jpg")

**Verify:** Lighthouse Performance ≥ 90 on mobile for all key pages.

## 3.3 — Caching + speed

- [ ] WP Rocket / LiteSpeed configured: page cache, browser cache, GZIP, minify CSS/JS, defer JS
- [ ] Critical CSS generated for above-the-fold
- [ ] Preload key fonts
- [ ] Database optimization (post revisions, transients cleanup)

**Verify:**
- TTFB < 600ms (run from `webpagetest.org`)
- Largest Contentful Paint < 2.5s mobile
- Cumulative Layout Shift < 0.1
- First Input Delay < 100ms

## 3.4 — Sitemap + robots.txt

- [ ] Verify XML sitemap at `/sitemap_index.xml`
- [ ] Submit to Google Search Console
- [ ] `robots.txt` allows crawling, blocks `/wp-admin/`, references sitemap
- [ ] Bing Webmaster Tools submission (optional but recommended)

**Verify:** Search Console shows all 10 pages submitted; no crawl errors.

## 3.5 — Analytics + tracking

- [ ] GA4 property created and tracking code installed
- [ ] Configured conversions:
  - `generate_lead` (quote form submit)
  - `phone_click` (tel: link clicks)
  - `email_click` (mailto: clicks)
  - `sms_click` (sms: link clicks on mobile)
- [ ] Google Tag Manager (optional, recommended for future flexibility)
- [ ] Search Console linked to GA4
- [ ] Verify real-time tracking with test session

**Verify:** All four conversion events fire and appear in GA4 DebugView.

## 3.6 — Accessibility audit

- [ ] All images have alt text
- [ ] All form fields have labels
- [ ] Color contrast ≥ 4.5:1 for body text, 3:1 for large text
- [ ] Keyboard navigation works on every interactive element
- [ ] Skip-to-content link in header
- [ ] Run automated audit with `axe DevTools` browser extension

**Verify:** Lighthouse Accessibility score ≥ 95; zero critical axe violations.

---

# PHASE 4 — Pre-launch QA (Day 14)

## 4.1 — Cross-device testing

- [ ] iPhone Safari (375px, 414px)
- [ ] Android Chrome (360px, 412px)
- [ ] iPad Safari (768px, 1024px)
- [ ] Desktop Chrome, Firefox, Safari, Edge (1280px, 1920px)
- [ ] Document any layout breaks in `/docs/qa_log.md` and fix

## 4.2 — Link audit

- [ ] No broken internal links (use Screaming Frog free crawl, ≤500 URLs)
- [ ] No broken external links
- [ ] All CTAs route correctly (especially `/get-a-quote?service=X` deep links)
- [ ] Phone, email, SMS links all work on mobile

## 4.3 — Form QA

- [ ] Submit each service flow end-to-end (4 services × happy path = 4 test submissions)
- [ ] Try invalid inputs (empty required fields, malformed email)
- [ ] Confirm all submissions hit `Contact@thecleanguyslv.com`
- [ ] Confirm auto-reply goes out
- [ ] Confirm GA4 event fires for each
- [ ] Test reCAPTCHA blocks obvious spam attempts

## 4.4 — Content review with client

- [ ] Send staging URL to Kervin & Jason
- [ ] Review every page for accuracy: hours, services, pricing references, photos
- [ ] Confirm phone, email, social profiles
- [ ] Get sign-off in writing (email reply or signed checklist)
- [ ] Log sign-off in `/docs/decisions_log.md`

## 4.5 — Backup

- [ ] Full UpdraftPlus backup of staging site (files + DB)
- [ ] Store backup off-server (Google Drive, Dropbox, S3)

---

# PHASE 5 — Launch (Day 15)

## 5.1 — Pre-launch checklist (run in order)

- [ ] Confirm DNS access (D1)
- [ ] Confirm hosting credentials
- [ ] Confirm Google Workspace email is delivering
- [ ] Schedule launch window with client (off-peak: Tuesday–Thursday morning recommended; avoid Friday)

## 5.2 — Migration steps

- [ ] Final backup of staging site
- [ ] Push site files to production hosting
- [ ] Push database to production
- [ ] Update site URL in `wp-config.php` and database (search-replace via WP-CLI: `wp search-replace 'thecleanguys.local' 'thecleanguyslv.com'`)
- [ ] Update DNS A record to point `thecleanguyslv.com` to new host
- [ ] Update DNS for `www.thecleanguyslv.com` (CNAME or A)
- [ ] Wait for DNS propagation (5 min – 24 hr; usually <2 hr)
- [ ] Issue SSL certificate (Let's Encrypt via host)
- [ ] Force HTTPS site-wide

## 5.3 — Post-launch (within 24 hours)

- [ ] Submit new sitemap to Search Console
- [ ] **Update Google Business Profile** with new website URL — critical, do not skip
- [ ] Update Yelp listing with website URL
- [ ] Update Facebook page website URL
- [ ] Update Instagram bio link
- [ ] Update Linktree if still in use (or sunset it — primary site is now strong enough)
- [ ] Set up 301 redirects from old Google Sites URLs to new equivalents in `Redirection` plugin
- [ ] Run Lighthouse again on production URL — confirm scores hold
- [ ] Run schema validator on production URL
- [ ] Monitor for 48 hours: Search Console errors, 404s, form submissions, traffic

## 5.4 — Local citations cleanup (Week 1 post-launch)

- [ ] Audit and update NAP on top citation sites:
  - Yelp ✓ (already exists, verify)
  - Google Business Profile ✓
  - Facebook ✓
  - Bing Places
  - Apple Maps
  - Yellow Pages
  - HomeAdvisor / Angi
  - Better Business Bureau (optional)
  - Nextdoor for Business
  - Thumbtack (if signed up)

**Verify:** NAP (Name, Address, Phone) consistent across all citations — exact same format.

---

# PHASE 6 — Handoff + ongoing (Week 3 post-launch onward)

## 6.1 — Documentation handoff

- [ ] Write `/docs/client_handoff.md` covering:
  - How to log in to WP admin
  - How to update a page
  - How to view form submissions
  - How to read GA4 reports
  - Where to view Search Console data
  - How to add a blog post (when Phase 2 starts)
  - Where backups are stored
  - Emergency contacts (host support, dev support)
- [ ] 30-minute screen-share walkthrough with Kervin & Jason

## 6.2 — Monitoring setup

- [ ] Uptime monitoring (UptimeRobot free tier)
- [ ] Weekly automated backups
- [ ] Monthly malware scan (Wordfence)
- [ ] Monthly performance check (Lighthouse)
- [ ] Quarterly SEO audit and content refresh

## 6.3 — Phase 2 prep (do not execute in Phase 1)

These are placeholders to plan for, not build now:

- [ ] Online booking integration (Jobber or HouseCall Pro)
- [ ] Stripe / Square payment for deposits
- [ ] Client portal
- [ ] Recurring billing automation
- [ ] Blog content engine — initial editorial calendar (12 posts targeting long-tail local searches)
- [ ] Per-city service landing pages (e.g. `/window-cleaning-summerlin`, `/post-construction-henderson`)
- [ ] Email automation (post-service follow-up, review request, recurring reminders)

---

# Success criteria (90 days post-launch)

The build is "successful" when these are true:

- [ ] All 10 pages indexed in Google Search Console
- [ ] Mobile Lighthouse Performance ≥ 90 on all key pages, sustained
- [ ] First organic quote request received within 30 days
- [ ] At least 10 quote requests per month by day 90
- [ ] At least 3 of 4 service pages ranking in top 20 for primary local keyword
- [ ] Zero downtime incidents
- [ ] GA4 conversion tracking accurate against form submission count

---

# Risk register

| Risk | Likelihood | Impact | Mitigation |
|---|---|---|---|
| Domain access delayed | Medium | Critical | Resolve D1 in week 1; if blocked, build on staging URL and migrate later |
| Client photography unavailable | High | Medium | Use stock as placeholders; commission shoot in week 2 |
| GBP not verified to current owners | Medium | High | Audit ownership in week 1; reclaim if needed |
| Old Google Site indexed pages cause duplicate content | Medium | Medium | Set old site to `noindex` or 301 to new domain on launch day |
| Form spam volume | Medium | Low | reCAPTCHA v3 + honeypot; escalate to v2 if needed |
| Slow hosting | Low | High | Confirm host choice (D2) upfront; load-test before launch |

---

# Notes for Claude Code

- **Default to action.** If the task is clear and the dependencies are met, do the work.
- **Stop and ask** when: credentials are needed, decisions affect scope or budget, or external services need to be touched on behalf of the user.
- **Keep this file living.** Update task status as you go. Add new tasks if you discover work that was missed. Remove obsolete tasks with a strikethrough rather than deletion (so the history is preserved).
- **Commit often.** A good rule: every checkbox you mark complete should correspond to at least one commit.
- **Read the source documents.** `/copy/page_copy_master.md` is the single source of truth for content. Don't rewrite copy unless the user asks — use what's there.
- **Match the brand voice.** "You call, we clean." Direct, confident, local. No agency-speak. No emoji in body copy (UI icons are fine).
