# TCG Project

Monorepo for **The Clean Guys LLC** — Las Vegas cleaning company owned by Kervin and Jason.
Contains the public marketing website, internal CRM, and the live preview that's served from this repo via GitHub Pages.

**Owners:** Kervin & Jason · `Contact@thecleanguyslv.com` · 702-551-4878
**Live preview:** https://eyeamjip.github.io/tcg-project/

---

## Repo layout

```
tcg-project/
├── website/    Marketing site source — WordPress build (Kadence theme + Rank Math + WPForms).
│               Includes page copy, schema, prototypes, theme skeleton, deploy scripts.
│               Source of truth for the WP build.
│
├── crm/        Internal admin CRM prototype — staff-facing tool for clients,
│               invoices, contracts, calendar, forecast, audit log.
│               Future: real Next.js + Supabase implementation lives here.
│
└── docs/       GitHub Pages preview — served at https://eyeamjip.github.io/tcg-project/
                index.html (landing) + v1.html + v2.html + crm.html + assets/
                Mirrors the rendered HTML of the prototypes for client review.
```

---

## Quick links

| What | Where |
|---|---|
| Marketing site build plan | [`website/plan.md`](website/plan.md) |
| Session handoff / current state | [`website/docs/handoff.md`](website/docs/handoff.md) |
| Locked + open client decisions | [`website/docs/decisions_log.md`](website/docs/decisions_log.md) |
| All 10 page copy files | [`website/copy/`](website/copy/) |
| CRM full build plan | `C:\Users\jpman\.claude\plans\act-like-you-re-an-binary-cray.md` |
| Workspace design baseline | `Z:\AI Brain\CLAUDE.md` + memory folder |

---

## Workflow for updating the live preview

```powershell
# 1. Edit the source HTML in its actual project location:
#    - website/prototypes/homepage-v1-editorial.html
#    - website/prototypes/homepage-v2-bold.html
#    - crm/prototypes/index.html

# 2. Copy the updated source to the docs/ folder (which is what GH Pages serves):
cp website/prototypes/homepage-v1-editorial.html docs/v1.html
cp website/prototypes/homepage-v2-bold.html      docs/v2.html
cp crm/prototypes/index.html                     docs/crm.html

# 3. Commit + push from repo root:
git add docs/
git commit -m "Preview: <what changed>"
git push
```

GitHub Pages config: **serves from `/docs/` on `main` branch.**

---

## Status (as of 2026-05-13)

- **Marketing site:** prototypes built (V1 editorial + V2 bold), 5-service catalog with rich service-detail modals, quote-form intake, TCG brand photography integrated. WordPress build blocked on client decisions D1–D7 (domain, hosting, email, photos, reviews, booking, GitHub).
- **CRM:** 7 of 9 modules built as HTML prototype. Mobile + desktop both working. Real Next.js + Supabase build deferred until marketing site Phase 1 ships and produces leads.
- **History:** This repo was renamed from `tcg-preview` to `tcg-project` on 2026-05-13. The old `eyeamjip/tcg-preview` URL auto-redirects to here for ~12 months.

---

*Built with Claude. Maintained by JP for Kervin & Jason.*
