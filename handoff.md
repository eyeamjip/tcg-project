# TCG Project — Monorepo Handoff

**For:** JP returning to the project, or any collaborator catching up cold.
**Last touched:** 2026-05-13

This is the **helicopter view** across all three subprojects (website, CRM, preview). For website-deep detail, see [`website/docs/handoff.md`](website/docs/handoff.md). For the website build sequence, see [`website/plan.md`](website/plan.md). For brand/owner/workflow rules, see [`CLAUDE.md`](CLAUDE.md).

---

## What is this project

Monorepo for **The Clean Guys LLC** — Las Vegas cleaning company (Kervin & Jason). Three subprojects under one repo:

| Subproject | What it is | Phase | Deploys to |
|---|---|---|---|
| `website/` | WordPress marketing site replacing the current Google Sites | Phase 2 source complete; blocked on client decisions | `thecleanguyslv.com` (WP hosting, TBD) |
| `crm/` | Internal staff admin (clients, invoices, contracts, calendar, forecast) | HTML prototype, 7 of 9 modules built | Phase 2 — real Next.js + Supabase build deferred until marketing site ships |
| `docs/` | Static HTML preview served by GitHub Pages | Live | `https://eyeamjip.github.io/tcg-project/` |

---

## Status snapshot

### 🌐 Website
- **Source state:** all 11 page copy files written + cross-linked. V1 + V2 prototypes built with TCG brand photography, service-detail modals, 2-line tagline, "Meet The Owners" team trust block, full mobile responsiveness with overflow guard.
- **WordPress build state:** zero. Phase 0 ~80% done (prep work, no live WP env yet). Phases 1-5 not started.
- **Blocked on:** D1 (domain), D2 (hosting), D3 (email), D8 (V1 vs V2 pick by client).

### 💼 CRM
- **Prototype:** 7 of 9 modules built — Overview, Lead Pipeline, Clients list+detail, Booking Calendar, Forecast, Audit Log, Mobile Job Mode.
- **Remaining prototype modules:** Invoices, Contracts, Users, Settings (all placeholder).
- **Real build:** deferred ~60–90 days post-launch of marketing site. Stack proposed: Next.js 14 + Tailwind + shadcn/ui + Supabase + Stripe + DocuSeal + FullCalendar.

### 📺 Preview (GitHub Pages)
- **Live:** `https://eyeamjip.github.io/tcg-project/`
- **Serves from:** `main` branch, `/docs` folder
- **Mirrors:** `website/prototypes/homepage-v1-editorial.html` → `docs/v1.html`, etc.
- **Workflow:** edit source → `cp` to `docs/` → commit + push from monorepo root.

---

## Critical blockers (in priority order)

All 7 client decisions in [`website/docs/decisions_log.md`](website/docs/decisions_log.md) still OPEN. **Nothing in Phase 1+ can start until at minimum D1 + D2 + D3 are answered.**

| ID | Question | Recommendation | Status |
|---|---|---|---|
| **D1** | Who owns `thecleanguyslv.com`? | Need registrar credentials or DNS push from owner | 🔴 Open |
| **D2** | Hosting: SiteGround GrowBig ($30/mo) vs Cloudways DO 2GB ($26/mo) | Cloudways for perf, SiteGround for ease | 🔴 Open |
| **D3** | Email/SMTP delivery for quote form | Use existing Google Workspace if set up; else Postmark relay | 🔴 Open |
| D4 | Ongoing photo strategy | TCG-branded photos already delivered; commission supplementary shoot later | 🟡 Partial |
| D5 | Reviews widget | Static at launch, live Google Reviews API in Phase 2 | 🔴 Open |
| D6 | Phase 1 booking integration | **NO** — quote form only at launch | 🔴 Open (default applies) |
| D7 | GitHub repo | ✅ **RESOLVED 2026-05-13** — monorepo at `eyeamjip/tcg-project` | 🟢 Closed |
| **D8** | V1 editorial vs V2 bold homepage | Implicit — client must pick after seeing preview | 🔴 Open |

**Action:** 30-min walkthrough with Kervin & Jason. Send them `https://eyeamjip.github.io/tcg-project/` to pick V1 vs V2 and answer the 7. Log resolutions in `website/docs/decisions_log.md`.

---

## Next concrete steps (in execution order)

1. **Schedule a 30-min decision call** with Kervin & Jason. Send the preview URL ahead of time so they can browse before the call.
2. **Capture answers in `website/docs/decisions_log.md`** — flip each open decision to a resolution entry with date + decision-maker.
3. **Quick wins while waiting on the call** (~1 hour total, no client input needed):
   - Draft `schema/faq-residential.json` (mirror `faq-window.json` structure)
   - Add Residential `Service` node to `schema/service-pages-schema.json`
   - Verify `schema/localbusiness.json` `hasOfferCatalog` includes Residential
   - Regenerate `copy/page_copy_master.md` with the 5-service catalog
   - Log D7 resolution in `decisions_log.md` (we DID set up the GitHub repo today)
4. **Once D2 is locked:** spin up Local by Flywheel (`thecleanguys.local`, PHP 8.2, MySQL 8). This is Phase 0.3 — ~1 hour of setup.
5. **Once Phase 0 closes:** Phase 1 (theme + plugins + global settings) = ~2 days. Phase 2 (11 page builds) = ~5 days. Phase 3 (SEO + perf) = ~2 days. Phase 4 (QA) = ~1 day. Phase 5 (launch) = ~1 day. **Total: ~2 weeks of focused build after blockers clear.**

---

## Recent session log (most recent first)

### 2026-05-13 — Monorepo consolidation + mobile UX overhaul
- **Big architectural shift:** repo renamed `tcg-preview` → `tcg-project`; restructured into monorepo with `website/`, `crm/`, `docs/` subfolders. Old standalone folders archived. GH Pages serves from `/docs`. New URL: `https://eyeamjip.github.io/tcg-project/`.
- **CRM mobile overhaul:** sidebar now visible on mobile (replaces retired bottom tab bar), defaults collapsed to 80px icon-rail on first visit. Brand mark "TCG" replaces "tg". Chevron toggle positioned at Overview row on mobile, logo row on desktop. Apple HIG 44px tap targets enforced.
- **Docs added:** root `CLAUDE.md` (TCG-wide rules), root `README.md` (repo overview), this `handoff.md`.

### 2026-05-12 — Service detail modals + brand photography + UX polish
- All Unsplash stock photos replaced with 8 TCG-branded WebP photos delivered by JP.
- Service detail modals on V1+V2 (1280-1320px wide, 2-col body, slim 4:1 hero on desktop). Modal CTA pre-fills quote form. Inline "See full service page" link points to eventual `/service-name` URLs for SEO.
- V1 + V2 Why-section restructure: centered team photo with "MEET THE OWNERS / Kervin & Jason" caption.
- TCG CRM workspace 2800px max-width standard applied across all 8 view wrappers.
- Mobile horizontal overflow guard (`overflow-x: clip`) added to V1 and V2.

### 2026-05-09 — Initial monorepo (pre-restructure)
- Two homepage prototypes built (V1 editorial, V2 bold).
- Quote form integrated as `<dialog>` modal on both.
- Reviews section spacing tightened on mobile.
- Tagline polish: `You call, we Clean.` with capital C, mint-green on V2.

For full session-by-session detail, see `website/docs/handoff.md` (300+ lines of website-specific history).

---

## Where to go for deeper detail

| If you're looking for… | Read this |
|---|---|
| Phase-by-phase build sequence + 150+ task checkboxes | [`website/plan.md`](website/plan.md) |
| Website inventory table + decisions table + known issues + brand quick reference | [`website/docs/handoff.md`](website/docs/handoff.md) |
| Brand voice, tokens, owners, GH Pages workflow, commit conventions | [`CLAUDE.md`](CLAUDE.md) |
| Website-specific rules (phase status, prototype rules, source-of-truth pointers) | [`website/CLAUDE.md`](website/CLAUDE.md) |
| Locked + open client decisions with full context | [`website/docs/decisions_log.md`](website/docs/decisions_log.md) |
| SEO keyword → page mapping | [`website/docs/seo_keyword_map.md`](website/docs/seo_keyword_map.md) |
| Page copy (per-page) | [`website/copy/`](website/copy/) — 11 markdown files |
| End-of-project handoff for Kervin & Jason | [`website/docs/client_handoff.md`](website/docs/client_handoff.md) (fill at Phase 6) |
| CRM full build plan (Next.js + Supabase) | `C:\Users\jpman\.claude\plans\act-like-you-re-an-binary-cray.md` |

---

## Quick links

- **Live preview:** https://eyeamjip.github.io/tcg-project/
- **GitHub:** https://github.com/eyeamjip/tcg-project
- **Current production site (Google Sites, to be replaced):** https://thecleanguyslv.com
- **Owners:** Kervin & Jason · `Contact@thecleanguyslv.com` · 702-551-4878

---

## Known issues / watch-outs

- **Hours discrepancy** — README + plan say Mon–Sat, current Google Sites says Mon–Fri. Confirm with Kervin before launch.
- **Quote form prototype is stubbed** — `Send my quote request` only swaps to the thank-you screen. No data leaves the browser. Real submission wiring happens in Phase 2.7 (WPForms config).
- **Old GH Pages URL** (`tcg-preview`) does NOT redirect — repo rename only redirects API endpoints, not Pages URLs. Update any shared links to `tcg-project`.
- **Archive folders** (`Z:\AI Brain\projects\TheCleanGuys_archive_2026-05-13\` + `TCG-CRM_archive_2026-05-13\`) are safe to delete after the monorepo is verified for a week or two.

---

*Living doc. Update at the end of any session that moved either subproject. Keep this to a helicopter-view layer; deeper detail belongs in subproject handoffs.*
