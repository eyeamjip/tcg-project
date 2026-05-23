# Client handoff guide

**Status:** TEMPLATE — fill out during Phase 6 (post-launch)
**For:** Kervin & Jason

This is the document you'll keep on hand to manage the website after launch. It covers everything you need to know without needing to call us first.

---

## Logging in

1. Go to `https://thecleanguyslv.com/wp-admin`
2. Username: _[set in Phase 0]_
3. Password: _[set in Phase 0 — change immediately on first login]_

If you ever forget your password: click "Lost your password?" on the login page. Reset link goes to `Contact@thecleanguyslv.com`.

---

## Updating a page

1. From the WP admin home, click **Pages** in the left sidebar
2. Hover over the page you want to edit, click **Edit**
3. Make your changes in the editor
4. Click **Update** in the top right

**To change the phone number, hours, or address site-wide:** these come from the LocalBusiness schema in Rank Math. Go to **Rank Math → Titles & Meta → Local SEO** and update there. Changes apply to every page.

---

## Viewing quote form submissions

Every quote request is saved to WordPress AND emailed to `Contact@thecleanguyslv.com`.

To view the saved entries:
1. **WPForms → Entries** in the WP admin sidebar
2. Click the form name (Quote Request)
3. See all submissions, exportable as CSV

If you stop receiving emails: check spam, then check **WPForms → Settings → Email**.

---

## Reading GA4 (traffic and lead data)

1. Go to [analytics.google.com](https://analytics.google.com)
2. Sign in with your business Google account
3. Select "The Clean Guys LLC" property
4. The dashboard shows:
   - **Real-time** — who's on the site right now
   - **Reports → Acquisition → Traffic acquisition** — where visitors came from (Google search, social, direct)
   - **Reports → Engagement → Conversions** — quote form submissions, phone clicks, email clicks

The most important number to watch: **Conversions → generate_lead**. That's quote requests.

---

## Search Console (where Google shows your data)

1. Go to [search.google.com/search-console](https://search.google.com/search-console)
2. Sign in with the business Google account
3. The dashboard shows:
   - **Performance** — what searches your site appears for, how often it gets clicked
   - **Coverage** — pages indexed (or not)
   - **Mobile usability** — issues on mobile

Watch the Performance tab. As your SEO matures, you'll see specific search queries growing — these are gold for understanding what your customers are looking for.

---

## Updating Google Business Profile

This is separate from the website but feeds the same audience. To update:

1. Go to [business.google.com](https://business.google.com)
2. Sign in
3. Update photos, posts, hours, services
4. Respond to reviews — _every review, even bad ones, within 48 hours_

---

## Backups

UpdraftPlus runs nightly automatic backups. Backups are stored:

- Last 7 days on the server
- Last 30 days in _[backup destination — Google Drive / Dropbox / S3, configured in Phase 1]_

To restore: contact us first. Restoring is reversible but mistakes during restore aren't.

---

## Adding a blog post (Phase 2)

Once we launch the blog in Phase 2:

1. **Posts → Add New** in WP admin
2. Title, body, featured image, category, tags
3. **Publish**

Blog content is part of long-term SEO — don't worry about getting it perfect, just publish consistently.

---

## Emergency contacts

| What broke | Who to call |
|---|---|
| Site is down | Hosting support _[provider TBD]_ |
| Form not delivering | Check WPForms → Settings → Email; if still broken, contact dev |
| Hacked / malware | Wordfence support; contact dev immediately |
| Domain renewal | Registrar _[TBD per D1]_ |
| Email broken | Google Workspace support |

---

## Things you should NEVER do (without checking first)

- Delete a page (use "Trash" instead — recoverable)
- Edit theme files in WordPress (use the staging environment)
- Install random plugins (we curate the plugin list — adding 10+ plugins slows the site)
- Change permalink settings (breaks every link)
- Empty the cache without testing the site after

When in doubt, message us. We respond same-day.

---

## Quarterly review checklist (do every 3 months)

- [ ] Read GA4 conversions report — are leads growing?
- [ ] Read Search Console performance — what searches are growing?
- [ ] Update FAQ if customers keep asking the same new questions
- [ ] Refresh photos on Instagram and pull best ones to website
- [ ] Verify hours and phone number are correct everywhere
- [ ] Check Google Business Profile reviews — respond to anything new
- [ ] Run UpdraftPlus backup verification

---

## What's coming in Phase 2

When you're ready, we'll layer on:

1. Online booking via Jobber or HouseCall Pro
2. Stripe payments for deposits
3. Recurring billing for commercial clients
4. Client portal (scheduling, history, invoices)
5. Per-city service pages (window-cleaning-summerlin, etc.)
6. Email automation (post-service follow-up, review requests)
7. Blog content engine

Phase 2 starts when Phase 1 is producing — typically 60–90 days post-launch.
