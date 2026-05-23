# The Clean Guys — Session Handoff

**For:** JP (or any dev picking this up) — *not* the client. The client-facing handoff lives in `client_handoff.md` and is filled in at end of Phase 6.

**Last touched:** 2026-05-13

---

## Where the project is right now

**Done — all the prep work that doesn't need a live WordPress install:**

| Asset | Location | Status |
|---|---|---|
| Build plan | `plan.md` | Living doc — updated with current state |
| Repo structure + README + .gitignore | root | Committed-ready (no git repo yet, blocked on D7) |
| Project brief | `docs/project_brief.docx` | Imported |
| 10 per-page copy files | `copy/*.md` | Drafted, brand-voiced, meta included |
| SEO keyword map | `docs/seo_keyword_map.md` | Drafted |
| Decisions log | `docs/decisions_log.md` | All 7 decisions still OPEN |
| Quote form prototype | `quote_form_prototype.html` | Working HTML, mobile-responsive, conditional fields per service |
| Homepage design v1 (editorial) | `prototypes/homepage-v1-editorial.html` | Minimalist · brand teal accents · 5 services (Residential hero + 2×2 grid) · service detail modals · 2-line `You call, / we Clean.` tagline · TCG brand photos · centered team photo in Why · mobile overflow-guard |
| Homepage design v2 (bold trades) | `prototypes/homepage-v2-bold.html` | Confident · dark teal nav · 5 services with photo overlays · service detail modals · mint-green `Clean` · TCG brand photos · team photo with "Meet The Owners" eyebrow · mobile overflow-guard |
| **TCG brand photos** | `assets/photos/*.webp` (8 files, mirrored to `.gh-preview/assets/photos/`) | All Unsplash/Pexels stock replaced 2026-05-12. Slots: hero-v1, hero-v2, residential, window, move, post-construction, commercial, team. Self-hosted WebP, ~1.5MB total. |
| **GitHub Pages preview** | `.gh-preview/` → `https://eyeamjip.github.io/tcg-preview/` | Live preview index links V1, V2, and TCG CRM. Phone-shareable URLs. |
| Schema JSON-LD (5 files) | `schema/*.json` | Drafted, not deployed |
| Kadence child theme skeleton | `theme/thecleanguys-child/` | `style.css` + `functions.php` drafted, not activated |
| Deploy/backup/lighthouse scripts | `scripts/*.sh` | Drafted, untested |
| Client handoff template | `docs/client_handoff.md` | Skeleton — fill during Phase 6 |

**Not done — anything that needs WordPress running:**
- Local WP dev environment (Local by Flywheel / DDEV)
- Theme activation, plugin install (Rank Math, WPForms, etc.)
- Page builds (all 10 pages)
- WPForms config matching the prototype
- GA4 + Search Console setup
- Hosting, DNS, launch

---

## What's blocking progress

**All 7 client decisions in `docs/decisions_log.md` are still OPEN.** Nothing in Phase 1+ can ship without at least these three answered:

| ID | Decision | Why it blocks |
|---|---|---|
| **D1** | Domain registrar access for `thecleanguyslv.com` | Can't launch without DNS control |
| **D2** | Hosting provider (SiteGround vs Cloudways) | Can't install WordPress until we know where |
| **D3** | Email/SMTP for form submissions (Google Workspace vs Postmark/SendGrid) | Quote form has nowhere to deliver |

**Lower priority but still needed:**
- **D4** — photography source (start with Yelp/Instagram pulls is fine; commission later)
- **D5** — review widget (recommend static at launch, live in Phase 2)
- **D6** — booking in Phase 1? (recommend NO — keep Phase 1 lean)
- **D7** — GitHub repo? (recommend YES — needed for handoff and version control)

**Action:** book 30 min with Kervin & Jason to walk these. Update `docs/decisions_log.md` as each is locked in.

---

## How to view the prototype locally

The quote form is a self-contained HTML file. No server required:

```powershell
Start-Process "Z:\AI Brain\projects\TheCleanGuys\quote_form_prototype.html"
```

Or double-click it in Explorer.

**Test it on a phone (same Wi-Fi):**

```powershell
$env:Path += ";C:\Program Files\nodejs"
cd "Z:\AI Brain\projects\TheCleanGuys"
npx.cmd --yes http-server -p 8080
```

Then open `http://<your-PC-IP>:8080/quote_form_prototype.html` on the phone. Find your IP with `ipconfig | findstr IPv4`. Stop with `Ctrl+C`.

If `npx` errors with "running scripts is disabled," use `npx.cmd` instead of `npx`. To make `npx` work permanently:

```powershell
Set-ExecutionPolicy -Scope CurrentUser -ExecutionPolicy RemoteSigned
[Environment]::SetEnvironmentVariable("Path", $env:Path + ";C:\Program Files\nodejs", "User")
```

The prototype submit button is **stubbed** — clicking "Send my quote request" only swaps to the thank-you screen. No data leaves the browser. Nothing reaches Kervin or Jason. Safe to test with real info.

---

## Brand quick reference

```
Tagline: "You call, we clean."
Tone: Direct, confident, local. No agency-speak. Sentence case headings.

Colors (locked in style.css + prototype):
  Primary teal       #0F6E56
  Primary dark teal  #085041
  Accent green       #1D9E75
  Light teal tint    #E1F5EE
  Ink (text)         #1A1A1A
  Ink soft           #555555
  Background         #FAFAF7

Typography: System sans (Inter as fallback if user picks a Google Font)

NAP:
  The Clean Guys LLC
  Las Vegas, NV (no street address published)
  702-551-4878
  Contact@thecleanguyslv.com

Hours (CONFIRM with client — Yelp says Mon-Sat, Google Sites says Mon-Fri):
  Mon–Sat 6:00 AM – 7:30 PM
  Sun closed

Owners: Kervin & Jason
Status: Licensed · Bonded · Insured · Est. 2022
```

---

## Next concrete steps (in order)

1. **Send the preview link to Kervin & Jason.** The GitHub Pages index at `https://eyeamjip.github.io/tcg-preview/` shows V1, V2, and the TCG CRM prototype on one page. Phone-friendly. Ask them to pick V1 vs V2 for the marketing site.
2. **Pick a homepage direction.** Once they choose, log it in `docs/decisions_log.md` as **D8**. All page builds in Phase 2 follow the chosen direction.
3. **Get the 7 decisions answered.** Walk `docs/decisions_log.md` with Kervin & Jason. Lock D1, D2, D3 first — those are the gating ones.
4. **Once D7 = yes:** `git init`, push to private GitHub, do the initial Phase 0 commit.
5. **Once D2 is locked:** stand up Local by Flywheel (`thecleanguys.local`, PHP 8.2, MySQL 8). Install WordPress. Activate the child theme from `theme/thecleanguys-child/`.
6. **Phase 1 begins:** install Kadence, plugins (Rank Math, WPForms, WP Rocket, WP Mail SMTP, Wordfence, UpdraftPlus, Redirection, Imagify), configure brand colors in Kadence Customizer.
7. **Phase 2 begins:** build the 10 pages from `copy/*.md` following the chosen design direction. Wire WPForms to mirror the prototype on `/get-a-quote`.

The plan in `plan.md` is the source of truth for everything beyond step 7.

---

## Adjacent project — TCG CRM

Started 2026-05-09 as a sibling project at `Z:\AI Brain\projects\TCG-CRM\`. Internal staff admin system. **Not part of this WordPress build** but designed to integrate with it later via the quote-form webhook.

| Asset | Where |
|---|---|
| Plan | `C:\Users\jpman\.claude\plans\act-like-you-re-an-binary-cray.md` |
| Prototype HTML | `Z:\AI Brain\projects\TCG-CRM\prototypes\index.html` |
| Live preview | `https://eyeamjip.github.io/tcg-preview/crm.html` |

**Modules built (7 of 9):** Overview · Lead Pipeline (Kanban) · Clients list + detail · Booking Calendar (1800px wide, 72px rows) · Forecast (12-mo bar chart, AR aging, commission ledger) · Audit Log · Mobile Job Mode.

**Modules placeholder (4 remaining):** Invoices · Contracts · Users · Settings.

**Design system locked:** TCG teal palette · Inter + Fraunces · collapsible sidebar (Linear-style) · 125% desktop / 87.5% mobile scale · mobile-first responsive across every module.

**Recommended path forward:** validate the prototype with Kervin & Jason → if approved, real build (Next.js + Supabase) starts AFTER marketing site Phase 1 ships and produces leads (~60–90 days post-launch).

---

## File map (what lives where)

```
TheCleanGuys/
├── plan.md                       Source of truth — the build plan
├── README.md                     Setup + dev instructions
├── quote_form_prototype.html     Working form prototype (self-contained)
├── TheCleanGuys_Project_Brief.docx
├── page_copy_master.md           Aggregated copy (read-only ref)
├── .gitignore
├── docs/
│   ├── handoff.md                ← you are here
│   ├── client_handoff.md         End-of-project doc for Kervin & Jason
│   ├── decisions_log.md          7 open decisions blocking the build
│   ├── seo_keyword_map.md
│   ├── qa_log.md                 Pre-launch QA findings (empty until Phase 4)
│   └── project_brief.docx
├── copy/                         10 per-page markdown files + master
├── prototypes/
│   └── quote_form_prototype.html (also copied to root for convenience)
├── theme/thecleanguys-child/     style.css + functions.php skeletons
├── schema/                       LocalBusiness + Service + FAQ JSON-LD
├── scripts/                      deploy.sh, backup.sh, lighthouse-check.sh
└── assets/{photos,logos,icons}/  Empty — needs D4 resolution
```

---

## Service catalog change (2026-05-12)

**Residential cleaning added as 5th service** (recurring or one-time home cleaning). Updated across:
- V1 + V2 homepage prototypes (Residential hero card + 4-card 2×2 grid)
- Card order: Window, Commercial, Post-construction, Move in/out (Commercial ↔ Move swapped — recurring services top row, project services bottom row)
- Section heading: "What we clean" → "Residential and Commercial cleaning"
- Quote form (standalone + embedded): Residential + Commercial combined into single Step 1 tile, 2-col subtype radio at Step 2 with progressive-disclosure property-type filtering
- **NEW: Service detail modals** on V1 + V2 — clicking any service card opens a rich modal (photo hero, what's included, add-ons, pricing, audience, differentiator) with CTA that pre-fills quote form + inline link to eventual /service-name page
- TCG CRM prototype: Residential added to filter pills, calendar legend, lead-pipeline filters, and one sample client row
- **TCG CRM max-width updated** to workspace `max-w-[2800px]` standard (was 1100–1800px per view)

**Copy files (all drafted/updated 2026-05-12):**
- ✅ `/copy/residential-cleaning.md` — drafted from scratch, full SEO-ready format
- ✅ `/copy/window-cleaning.md`, `/copy/move-in-move-out-cleaning.md`, `/copy/post-construction-cleaning.md`, `/copy/commercial-cleaning.md` — cross-linked to Residential
- ✅ `/copy/home.md` — 5 services + new section heading
- ⏳ Schema files still need Residential added:
    - `/schema/faq-residential.json` (mirror `faq-window.json` structure)
    - `/schema/service-pages-schema.json` (add Residential service node)
    - `/schema/localbusiness.json` (verify hasOfferCatalog includes Residential)
- ⏳ `/copy/page_copy_master.md` is read-only reference — needs full regen at end of Phase 2 if used as a single-source ref

---

## Late-evening session work (2026-05-12)

**Service detail modals — major UX upgrade:**
- Widened to 1280px (V1) / 1320px (V2) with 2-column body layout on desktop (spec on left, conversion content on right). All content fits without scrolling on 1080p+. Mobile single-column preserved.
- Slim cinematic 4:1 hero on desktop (was 21:9 portrait that ate too much vertical space). Mobile keeps 16:10 portrait.
- CTA button content-sized on desktop (was full-width via flex:1); still full-width on mobile.
- Inline "See the full service page →" link added — points to eventual `/residential-cleaning`, `/window-cleaning`, etc. URLs. Wiring is in place for the WordPress build to fulfill.

**TCG brand photos integrated:**
- 8 generated WebP photos delivered by JP, copied to `assets/photos/` (and mirrored to `.gh-preview/assets/photos/`). All Unsplash/Pexels references swapped to local paths.
- Photos used across: V1 hero, V2 hero, all 5 service cards on both versions, all 5 service modals, V1 + V2 team photo in Why section. Consistent brand uniform (navy polo) and Vegas setting across every shot.

**Why-pick-us section restructure (both versions):**
- V2 (was no photo): added centered team photo with "MEET THE OWNERS / Kervin & Jason" caption between value statement and icon-card grid.
- V1 (was asymmetric 2-col text/photo): restructured to centered vertical flow (head → centered team photo → 2-col reasons grid). Photo gets prime-real-estate treatment instead of right-column accessory.
- Both: caption uses brand-teal tracked-uppercase eyebrow style for "MEET THE OWNERS", matching site-wide section-eyebrow pattern.

**Polish + bug fixes:**
- Services heading: `Five services. Done right.` — fixed wrapping bug ("right." was orphaned on its own line on desktop). Bumped h2 `max-width` and added `white-space: nowrap` for desktop, with mobile media query restoring `white-space: normal`.
- Mobile horizontal overflow guard added to both V1 and V2: `html, body { overflow-x: hidden; overflow-x: clip; }` — defensive safety net against accidental wide elements. `clip` preserves sticky positioning where supported; falls back to `hidden`.

**TCG CRM topbar restructure (late evening):**
- Moved search bar from sidebar into a new full-width topbar above the entire shell (matches Realtor CRM pattern, locks workspace baseline).
- Sidebar now sticky-positioned below topbar (`top: 3.5rem`, `height: calc(100vh - 3.5rem)`).
- Sub-nav (Overview's Today/Week/Month/Quarter) now stands alone in main, sticky at `top: 3.5rem` just below topbar.
- Dropped breadcrumb (`Workspace > Overview`) — redundant with sidebar's active state, matches Realtor CRM. JS gracefully no-ops on missing element.

---

## Session: TCG CRM mobile UX overhaul (2026-05-13)

**The big architectural shift:** sidebar now serves nav on mobile too. Bottom tab bar retired. Single nav source across all viewports.

**Changes:**
- Removed `@media (max-width: 1023px) { .sidebar { display: none } }`. Sidebar visible everywhere.
- Removed entire bottom-tab-bar `<nav class="bottom-tabs">` element + `.tab-item` / `.bottom-tabs` CSS.
- JS: default-collapse on first mobile visit via `window.matchMedia('(max-width: 1023px)')`. Stored preference (if any) wins.
- Removed topbar mobile mini-logo (was duplicate brand mark now that sidebar shows on mobile).
- Sidebar brand mark: `tg` → `TCG`; container w-9 → w-10; font text-[15px] → text-[13px] to fit the longer acronym.
- Collapsed sidebar mobile: width 72px → 80px; nav-item icons 16px → 22px with min-height 44px (Apple HIG tap target).
- Chevron toggle: 28×28 desktop / **32×32 mobile**; right: -14px desktop / **-8px mobile** (mobile reduced from -16px since it was kissing the H1 "G"); top: 1.5rem desktop (TCG logo row) / **4rem mobile** (next to H1 "Good afternoon, Kervin.").
- FAB position: `bottom: 84px` → `bottom: max(24px, env(safe-area-inset-bottom))` (was clearing tab bar; now uses iOS safe-area for home-indicator).
- Account block avatar shrinks 32px → 36px in collapsed mobile mode.

**UX principles applied (for the record):**
- Hick's Law — removing tab bar reduces nav-source count from 2 to 1
- Fitts's Law — bigger icons + min-height ensure Apple HIG 44px tap targets
- Recognition over recall — "TCG" reads more identifiably than "tg" in passing
- Gestalt proximity — chevron toggle near H1 implies "this row is interactive"
- Apple HIG safe-area — FAB clears the iOS home indicator

**What didn't break:**
- Desktop layout unchanged (chevron stays at logo row, sidebar starts expanded, no mobile-only changes leaked)
- Sub-nav still sticky-positioned at top: 3.5rem inside main
- Router still highlights correct nav items (uses `[data-view]` selector which only matches sidebar items now that tab bar is gone)
- Service detail modals + quote modal unaffected

---

## Known issues / watch-outs

- **Hours discrepancy:** README + plan say Mon–Sat, current Google Sites says Mon–Fri. Confirm with Kervin before launching anywhere with the wrong hours.
- **No git history yet:** all "first" commits are pending D7. If GitHub is a no, do `git init` locally and commit anyway — version history is cheap insurance.
- **No client photography yet:** `/assets/photos/` is empty. Either pull from Yelp's 47 + Instagram's 174 (D4) before Phase 2 page builds, or use stock placeholders and swap later.
- **Prototype is stubbed.** When wiring to WPForms in Phase 2.7, mirror the conditional logic exactly (Step 2 fields change per service tile selected in Step 1). The prototype JS at line 676+ is the spec.
