# Get a quote

**URL:** `/get-a-quote`
**Status:** Ready for CMS load
**Form spec source:** `/prototypes/quote_form_prototype.html`
**Note:** This is the conversion page for the entire site. Every page funnels here. Form mechanics are detailed in the prototype — this doc covers page chrome and copy around the form.

## Meta

- **Meta title:** Get a Free Quote | The Clean Guys LLC — Las Vegas
- **Meta description:** Request a free cleaning quote in Las Vegas. Window, move-out, post-construction, or commercial. Same-day response during business hours.
- **Note:** Conversion page — not heavily SEO-targeted. Don't compete with service pages on local keywords.

---

## H1

Get a free quote.

## Subheadline

Tell us a few quick details and we'll send back a real quote — usually within an hour during business hours.

---

## Trust strip (under hero, above form)

- ✓ Licensed, bonded, insured
- ✓ 5-star on Google & Yelp
- ✓ Locally owned

---

## The form

Embed WPForms configured per `/prototypes/quote_form_prototype.html`:

**Step 1 — Service selection (required)**
4 tile-style options:
- Window cleaning
- Move in / move out
- Post-construction
- Commercial

Pre-fillable via URL param: `?service=window`, `?service=move`, `?service=post-construction`, `?service=commercial`.

**Step 2 — Job details (conditional by service)**

Universal fields:
- Property type (dropdown — required)
- Approximate square footage (dropdown)
- When do you need it done? (dropdown)
- Anything else we should know? (textarea)

Window-specific:
- Approximate number of windows
- Interior, exterior, or both?

Move-specific:
- Moving in or moving out?

Post-construction-specific:
- Which phase? (multi-select: rough / final / touch-up)
- Are you a contractor, builder, or homeowner?

Commercial-specific:
- How often do you want service? (daily / weekly / bi-weekly / monthly / one-time)

**Step 3 — Contact**
- First name (required)
- Last name
- Phone (required)
- Email (required)
- Service address or zip
- Best way to reach you (radio: text / call / email)

---

## Below the form: alternative contact methods

### Or skip the form
If you'd rather just talk, **call or text us at [702-551-4878](tel:7025514878)** — we usually answer within an hour during business hours.

---

## Trust block (below form)

- All quotes are free, no obligation, no pressure
- We respond same-day during business hours (Mon–Sat, 6 AM – 7:30 PM)
- Your details stay with us — we don't share contact info with third parties
- Licensed, bonded, and insured — proof on request

---

## Form submission behavior

When the form is submitted:

1. **Email to client** — `Contact@thecleanguyslv.com` with structured subject `[Quote Request] {service} - {firstName}`. All form fields in body.
2. **Auto-reply to submitter** — short message: "We got your quote request. We'll get back to you within an hour during business hours. — Kervin & Jason, The Clean Guys"
3. **WPForms entry saved** — backup of all submissions in WP admin.
4. **GA4 event fires** — `generate_lead` with `service` and `value` parameters.
5. **Confirmation page** — show inline success message, do NOT redirect away (preserves analytics context).

---

## Anti-spam

- reCAPTCHA v3 (invisible) — escalate to v2 if spam volume warrants
- Honeypot field
- Required-field validation client-side AND server-side
