# The Clean Guys LLC — Website (`tcg-project/website/`)

**Stack:** WordPress 6+ · Kadence theme + child · Rank Math · WPForms · LiteSpeed/WP Rocket
**Live target:** https://thecleanguyslv.com (currently Google Sites — replacing it)
**Preview:** https://eyeamjip.github.io/tcg-project/ (V1, V2, CRM)
**Last touched:** 2026-05-13

> **Loading hierarchy** — this file is layer 3 of 3:
> 1. `Z:\AI Brain\CLAUDE.md` — workspace (UX/UI persona, design baseline, cross-project conventions)
> 2. `tcg-project/CLAUDE.md` — monorepo (brand voice, tokens, owners, GH Pages workflow, commit prefixes, hard rules across website + CRM)
> 3. **This file** — website-only (phase status, decisions, prototype rules, source-of-truth pointers)
>
> If you need brand colors, voice rules, owner info, GH Pages workflow, or commit conventions → those live in **`../CLAUDE.md`** (the monorepo level). Don't duplicate here.

---

## Read at session start

| File | When |
|---|---|
| `plan.md` | Every session — source of truth for phase status, task checkboxes, open decisions |
| `docs/handoff.md` | Every session — website-deep current state, blockers, next concrete steps |
| `docs/decisions_log.md` | Before any task that touches external services |
| `copy/page_copy_master.md` | Read-only reference — never edit directly |

---

## Living-doc rule (website-specific)

The monorepo-level living-doc rule (in `../CLAUDE.md`) applies. Website-specific additions:

**`plan.md`** — update when:
- A task completes → flip `[ ]` to `[x]`, add one-line note with what was done + any deviation
- A task is blocked → leave `[ ]`, add italic *blocked on Dn* note
- A new task surfaces → add under the right phase; strike obsolete tasks (`~~text~~`), never delete
- Phase status materially shifts → update the "Current state" block at the top with today's date

**`docs/handoff.md`** — update when:
- Asset inventory table changes (new asset, status flip)
- A blocking decision (D1–D7) gets answered → remove from blockers, note resolution, update `docs/decisions_log.md`
- "Next concrete steps" becomes stale → reorder or rewrite
- A new known issue surfaces → add to "Known issues / watch-outs"

**Don't update:**
- `docs/client_handoff.md` — Phase 6 only, filled at project end
- `copy/page_copy_master.md` — read-only reference

---

## Hard rules (website-specific)

### Decisions gate everything
All 7 client decisions (D1–D7) are still open. No WordPress build work can start until at minimum D1 (domain), D2 (hosting), D3 (email/SMTP) are answered. Before any task touching an external service (registrar, hosting, GA4, Search Console, Google Business Profile), stop and confirm credentials with JP. Never guess at API keys or access.

### Verify before marking complete
Run the verification step listed in `plan.md` for each task before flipping `[ ]` → `[x]`. If verification fails, fix it first.

### Prototype rules (don't break)
- **No inline base64 images** — all photos self-hosted as WebP in `assets/photos/`
- **Quote form modal** — every "Get a quote" CTA opens the `<dialog>` modal inline; no page navigation to the form
- **Service detail modals** — clicking a service card opens the rich modal; modal CTA pre-fills the quote form with that service
- **Desktop viewport standard** — all view wrappers use `max-w-[2800px] mx-auto` (workspace standard; same applies to CRM)
- **Mobile horizontal overflow guard** — `html, body { overflow-x: hidden; overflow-x: clip; }` on both V1 and V2; don't remove

---

## Phase status (as of 2026-05-13)

| Phase | Status | Notes |
|---|---|---|
| **Phase 0 — Init** | ~80% | Repo structure, docs, 11 copy files, SEO keyword map done. Local WP env blocked on D2. |
| **Phase 1 — Foundation** | Pre-work only | Child theme skeleton drafted at `theme/thecleanguys-child/`. Kadence + plugins not installed (blocked on D2). |
| **Phase 2 — Content + prototypes** | ✅ Source complete | All 11 page copies written (5 services + home + about + service-areas + faq + contact + get-a-quote). V1 + V2 prototypes deployed. Service detail modals built. TCG-branded photos in place. **Pending client pick between V1/V2 (D8) before WordPress page builds.** |
| **Phase 3 — SEO** | Not started | |
| **Phase 4 — QA** | Not started | |
| **Phase 5 — Launch** | Not started | |
| **Phase 6 — Handoff** | Template only | `docs/client_handoff.md` exists as fillable template |

---

## Open decisions (status as of 2026-05-13)

| # | Decision | Blocker for | Status |
|---|---|---|---|
| D1 | Domain registrar access — who owns `thecleanguyslv.com`? | Launch | 🔴 Open |
| D2 | Hosting provider — SiteGround GrowBig ($30/mo) vs Cloudways DO 2GB ($26/mo) | Phase 0.3, Phase 1 | 🔴 Open |
| D3 | Email/SMTP — Google Workspace or existing setup + relay? | Phase 1.4 | 🔴 Open |
| D4 | Photography — pull from Yelp/Instagram, commission shoot, or both? | Phase 2 | 🟡 Partial — TCG-branded photos delivered & in `assets/photos/` |
| D5 | Review widget — live Google Reviews API or static testimonial pull? | Phase 2 | 🔴 Open |
| D6 | Live booking in Phase 1? (Default: NO — quote form only) | Scope | 🔴 Open |
| D7 | GitHub repo or local-only? | Phase 0.1 | 🟢 **Closed 2026-05-13** — monorepo at `eyeamjip/tcg-project` |
| D8 | Homepage direction: V1 editorial vs V2 bold? | All Phase 2 page builds | 🔴 Open (implicit) |

Document each resolution in `docs/decisions_log.md` with date + decision-maker.

---

## Source of truth pointers (website-specific)

| Question | File |
|---|---|
| Build sequence + task checkboxes | `plan.md` |
| Current state, blockers, next steps | `docs/handoff.md` |
| Cross-subproject helicopter view | `../handoff.md` (monorepo level) |
| Locked decisions | `docs/decisions_log.md` |
| Page copy | `copy/page_copy_master.md` (aggregate — stale, regen pending) or `copy/{page}.md` (per-page, current) |
| Form UX spec | `prototypes/quote_form_prototype.html` |
| SEO keyword mapping | `docs/seo_keyword_map.md` |
| Brand voice, tokens, owners | **`../CLAUDE.md` (monorepo)** — single source of truth |
| GH Pages preview workflow | **`../CLAUDE.md` (monorepo)** — single source of truth |
| Commit-message conventions | **`../CLAUDE.md` (monorepo)** — `[website] / [crm] / [docs] / [preview]` prefixes |

---

*Originally created 2026-05-21. Deduplicated 2026-05-13 when the monorepo was formed — brand/voice/owners/workflow moved to `../CLAUDE.md`; this file now holds only website-specific content. Update phase status and decisions table as D1–D8 resolve.*
