# The Clean Guys LLC — Website Project

**Client:** Kervin & Jason · 702-551-4878 · Contact@thecleanguyslv.com  
**Live site:** https://thecleanguyslv.com (currently Google Sites — replacing it)  
**Previews:** https://eyeamjip.github.io/tcg-project/ (V1, V2, CRM) — *renamed from `tcg-preview` on 2026-05-13*  
**Stack:** WordPress 6+ · Kadence theme + child · Rank Math · WPForms · LiteSpeed/WP Rocket  
**Last session:** 2026-05-13 — TCG CRM mobile UX overhaul

> Workspace rules in `Z:\AI Brain\CLAUDE.md` apply here. This file holds only what's TCG-specific.

---

## Read at session start

| File | When |
|---|---|
| `plan.md` | Every session — source of truth for phase status, task checkboxes, open decisions |
| `docs/handoff.md` | Every session — current state, blockers, next concrete steps |
| `docs/decisions_log.md` | Before any task that touches external services |
| `copy/page_copy_master.md` | Read-only reference — never edit directly |

---

## Living doc rule (auto-update without being asked)

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

## Hard rules

### Decisions gate everything
**All 7 client decisions (D1–D7) are still open.** No WordPress build work can start until at minimum D1 (domain), D2 (hosting), D3 (email/SMTP) are answered. Before any task touching an external service — registrar, hosting, GA4, Search Console, Google Business Profile — stop and confirm credentials with JP. Never guess at API keys or access.

### Commit format
`[phase-X] task description` — small, reversible commits after every meaningful task.

### Verify before marking complete
Run the verification step listed in `plan.md` for each task before flipping `[ ]` → `[x]`. If verification fails, fix it first.

### Brand voice
"You call, we clean." Direct, confident, local. Sentence-case headings. No agency-speak. No emoji in body copy (UI icons are fine). Write as Kervin & Jason — the company is them.

### Brand tokens (locked)
| Token | Value |
|---|---|
| Primary teal | `#0F6E56` |
| Primary dark | `#085041` |
| Accent | `#1D9E75` |
| Ink | `#1A1A1A` |
| Ink soft | `#555555` |
| Background | `#FAFAF7` |

Do not change without explicit ask.

### Prototype rules (don't break)
- **No inline base64 images** — all photos self-hosted as WebP in `/assets/photos/`
- **Quote form modal** — every "Get a quote" CTA opens the `<dialog>` modal inline; no page navigation to the form
- **Service detail modals** — clicking a service card opens the rich modal; modal CTA pre-fills the quote form with that service
- **Desktop viewport standard** — all view wrappers use `max-w-[2800px] mx-auto` (workspace standard, locked 2026-05-12)
- **Mobile horizontal overflow guard** — `html, body { overflow-x: hidden; overflow-x: clip; }` on both V1 and V2; don't remove
- **TCG CRM sidebar** — collapsed to 80px icon rail on mobile (not hidden); bottom tab bar retired; default-collapsed on mobile via JS `matchMedia`

---

## Phase status (as of 2026-05-13)

| Phase | Status | Notes |
|---|---|---|
| **Phase 0 — Init** | ~80% | Repo structure, docs, 10 copy files, SEO keyword map done. Git init + local WP env blocked on D7/D2. |
| **Phase 1 — Foundation** | Pre-work only | Child theme skeleton drafted. Kadence + plugins not installed (blocked on D2). |
| **Phase 2 — Content + prototypes** | ✅ Source complete | All 10 page copies written. Two homepage prototypes (V1 editorial, V2 bold) deployed to GitHub Pages. Quote form prototype working. Service detail modals built. TCG-branded photos in place. **Pending client pick between V1/V2 before WordPress pages build.** |
| **Phase 3 — SEO** | Not started | |
| **Phase 4 — QA** | Not started | |
| **Phase 5 — Launch** | Not started | |
| **Phase 6 — Handoff** | Template only | `docs/client_handoff.md` exists as fillable template |

---

## Open decisions (all 7 still open as of 2026-05-13)

| # | Decision | Blocker for |
|---|---|---|
| D1 | Domain registrar access — who owns `thecleanguyslv.com`? | Launch |
| D2 | Hosting provider — SiteGround GrowBig ($30/mo) vs Cloudways DO 2GB ($26/mo) | Phase 0.3, Phase 1 |
| D3 | Email/SMTP — Google Workspace or existing setup + relay? | Phase 1.4 |
| D4 | Photography — pull from Yelp/Instagram, commission shoot, or both? | Phase 2 (partially resolved — TCG branded photos in `/assets/photos/`) |
| D5 | Review widget — live Google Reviews API or static testimonial pull? | Phase 2 |
| D6 | Live booking in Phase 1? (Default: NO — quote form only) | Scope |
| D7 | GitHub repo or local-only? | Phase 0.1 |

Document each answer in `docs/decisions_log.md` as they're resolved.

---

## Sibling project — TCG CRM (now in the same monorepo)

Lives at `..\crm\` (sibling folder inside the `tcg-project` monorepo, as of 2026-05-13). Internal admin system for Kervin & Jason. **Not part of this WordPress build** — connects later via quote form webhook (form submissions → CRM leads).

- Prototype source: `Z:\AI Brain\projects\tcg-project\crm\prototypes\index.html`
- Live preview: https://eyeamjip.github.io/tcg-project/crm.html
- Status: 7 of 9 modules built. Recommended start: after marketing site Phase 1 ships (~60–90 days post-launch).

---

## Source of truth pointers

| Question | File |
|---|---|
| Build sequence + task checkboxes | `plan.md` |
| Current state, blockers, next steps | `docs/handoff.md` |
| Locked decisions | `docs/decisions_log.md` |
| Page copy | `copy/page_copy_master.md` (aggregate) or `copy/{page}.md` (per-page) |
| Form UX spec | `prototypes/quote_form_prototype.html` |
| Brand colors / NAP / typography | `docs/handoff.md` → "Brand quick reference" |
| SEO keyword mapping | `docs/seo_keyword_map.md` |

---

*Created 2026-05-21. Replaces the previous project-level CLAUDE.md. Update phase status and open decisions table as D1–D7 get resolved.*
