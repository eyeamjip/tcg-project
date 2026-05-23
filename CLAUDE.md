# `tcg-project` — Monorepo CLAUDE.md

**Auto-loaded by Claude Code for any session inside `Z:\AI Brain\projects\tcg-project\`.**

This file holds rules that apply across **both** the marketing website AND the CRM. For website-only rules (phase status, decisions log, prototype rules), see `website/CLAUDE.md`.

---

## Loading hierarchy

| Layer | File | Scope |
|---|---|---|
| 1. Workspace | `Z:\AI Brain\CLAUDE.md` | Cross-project rules — UX/UI persona, design baseline, commit conventions for all projects |
| 2. **Monorepo (this file)** | `tcg-project/CLAUDE.md` | TCG-wide rules — brand, owners, GH Pages workflow, shared living docs |
| 3. Subfolder | `tcg-project/website/CLAUDE.md` | Website-specific — phase status, D1–D7 decisions, prototype rules |

Each layer **overrides** the previous when rules conflict. Always start by reading the deepest-applicable layer first.

---

## What lives here

```
tcg-project/
├── README.md            Repo overview + workflow guide
├── .gitignore           Root-level catch-all
├── CLAUDE.md            ← THIS FILE (TCG-wide rules)
│
├── website/             Marketing site source (was Z:\AI Brain\projects\TheCleanGuys\)
│   ├── CLAUDE.md        Website-specific phase + decisions
│   ├── plan.md          Source of truth for build sequence
│   ├── docs/handoff.md  Current state, blockers, next steps
│   ├── copy/            10 per-page markdown files
│   ├── prototypes/      V1, V2, quote-form HTML
│   ├── schema/          LocalBusiness + Service + FAQ JSON-LD
│   ├── theme/           Kadence child theme skeleton
│   └── assets/photos/   TCG-branded WebP photos (~1.5MB total)
│
├── crm/                 Internal admin CRM (was Z:\AI Brain\projects\TCG-CRM\)
│   └── prototypes/      index.html (full HTML prototype, 7 of 9 modules built)
│
└── docs/                GH Pages preview — served at https://eyeamjip.github.io/tcg-project/
    ├── index.html       Landing (links V1, V2, CRM)
    ├── v1.html          mirror of website/prototypes/homepage-v1-editorial.html
    ├── v2.html          mirror of website/prototypes/homepage-v2-bold.html
    ├── crm.html         mirror of crm/prototypes/index.html
    └── assets/photos/   mirror of website/assets/photos/
```

---

## Client + brand context (applies to both website and CRM)

**Company:** The Clean Guys LLC
**Owners:** Kervin & Jason — write as if the company is them, because it is
**Contact:** `Contact@thecleanguyslv.com` · 702-551-4878
**Service area:** Las Vegas Valley (Vegas, Henderson, North Las Vegas, Summerlin, Centennial Hills, Spring Valley, Enterprise, Paradise, Sunrise Manor, Green Valley, Southern Highlands, Rhodes Ranch, Whitney)
**Status:** Licensed · Bonded · Insured · Est. 2022

### Brand voice (use everywhere — site, CRM strings, copy)
> "You call, we clean." Direct, confident, local. Sentence-case headings. No agency-speak. No emoji in body copy (UI icons fine).

### Brand tokens (locked — same across website + CRM)
| Token | Hex |
|---|---|
| Primary teal | `#0F6E56` |
| Primary dark | `#085041` |
| Accent mint | `#1D9E75` |
| Brand light tint | `#E1F5EE` |
| Brand ink (deepest) | `#052821` |
| Body ink | `#1A1A1A` |
| Body ink soft | `#555555` |
| Body background | `#FAFAF7` |

Do not change without explicit ask from JP or Kervin/Jason.

---

## GitHub Pages preview workflow

**Live URL:** https://eyeamjip.github.io/tcg-project/
**GH Pages source:** `main` branch, `/docs` folder
**Repo:** `github.com/eyeamjip/tcg-project` (renamed from `tcg-preview` on 2026-05-13)

```powershell
# 1. Edit source in its real location (NOT in docs/):
#    - website/prototypes/homepage-v1-editorial.html
#    - website/prototypes/homepage-v2-bold.html
#    - crm/prototypes/index.html

# 2. Copy the updated source to docs/ (the served folder):
cd "Z:\AI Brain\projects\tcg-project"
cp website/prototypes/homepage-v1-editorial.html docs/v1.html
cp website/prototypes/homepage-v2-bold.html      docs/v2.html
cp crm/prototypes/index.html                     docs/crm.html

# 3. Commit + push from monorepo root:
git add docs/
git commit -m "Preview: <what changed>"
git push
```

**Important:** never edit files in `docs/` directly — they're build artifacts. Always edit source in `website/prototypes/` or `crm/prototypes/`, then copy.

If photos change (new file in `website/assets/photos/`), also copy to `docs/assets/photos/` for the preview HTML to find them.

---

## Living-doc rule (auto-update without being asked)

Both the website and the CRM keep their own `plan.md` + handoff. **Update them as work happens — don't wait to be asked.**

**Website docs** (`website/plan.md` + `website/docs/handoff.md`):
- Flip `[ ]` → `[x]` when a task completes; add one-line note
- Strike obsolete tasks `~~text~~`, never delete
- Update "Current state (as of YYYY-MM-DD)" block with today's date when phase status shifts
- When a blocking decision (D1–D7) resolves → remove from blockers, log in `website/docs/decisions_log.md`

**CRM docs:** CRM plan lives at `C:\Users\jpman\.claude\plans\act-like-you-re-an-binary-cray.md` for now. Update there when CRM scope shifts.

**Cadence:** end of any turn that moved the needle. Not every turn — only ones with meaningful progress.

---

## Don't edit these files

| File | Why |
|---|---|
| `website/copy/page_copy_master.md` | Read-only aggregate reference — edit individual `copy/*.md` files instead |
| `website/docs/client_handoff.md` | End-of-project doc for Kervin & Jason — only filled in during Phase 6 |
| `docs/*.html` | Build artifacts of the prototypes — edit source in `website/prototypes/` or `crm/prototypes/` then copy |
| `docs/assets/photos/*.webp` | Mirror of `website/assets/photos/` — replace at source, then copy |

---

## Commit conventions (this repo)

- Standard `Co-Authored-By: Claude` trailer is fine
- Use `[website]` or `[crm]` or `[docs]` or `[preview]` prefixes for clarity on which subproject touched
- Examples:
  - `[website] copy: tighten residential FAQ for SEO`
  - `[crm] mobile: reduce chevron right overhang from -16px to -8px`
  - `[preview] sync v1.html + v2.html with latest prototype changes`
  - `[monorepo] update CLAUDE.md with new branch convention`

---

## Hard rules carried forward from previous state

These are locked decisions from prior work — don't undo without explicit ask:

1. **Desktop content max-width: 2800px.** All website prototype view wrappers + CRM view wrappers use `max-w-[2800px] mx-auto`. Detail: workspace `feedback_desktop_max_width.md`.
2. **Mobile horizontal overflow guard.** Both V1 and V2 have `html, body { overflow-x: hidden; overflow-x: clip; }`. Don't remove — defensive safety net.
3. **TCG CRM single nav source on all viewports.** Sidebar visible on mobile (defaults collapsed to 80px icon-rail), bottom tab bar retired. Don't bring the tab bar back.
4. **Brand mark: TCG (not TG).** Sidebar logo in CRM is `TCG` in a 40px square. Three letters > two for recognition.
5. **Service detail modals on V1 + V2.** Clicking a service card opens a modal (not navigation). Modal CTA pre-fills the quote form. When WordPress is built, each service ALSO gets a dedicated page at `/service-name` for SEO.
6. **Tagline:** `You call, we Clean.` — capital C, mint green on V2 dark hero, brand teal on V1 light hero.

---

## Open blockers (carried forward from `website/docs/handoff.md`)

All 7 client decisions (D1–D7) still open as of 2026-05-13. **No WordPress build work can start** until at least D1 (domain), D2 (hosting), D3 (email/SMTP) are answered. Show the preview links (`https://eyeamjip.github.io/tcg-project/`) to Kervin & Jason, have them pick V1 vs V2, and answer the 7. That conversation unblocks everything.

---

*Created 2026-05-13 when the monorepo was formed. Update when shared rules emerge or workflow changes.*
