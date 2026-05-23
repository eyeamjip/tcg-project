#!/bin/bash
# Lighthouse CI — run Lighthouse against all key pages and fail if scores drop
# Usage: ./scripts/lighthouse-check.sh https://staging.thecleanguyslv.com
#
# Requires: npm install -g lighthouse jq

set -e

BASE_URL="${1:-https://staging.thecleanguyslv.com}"
THRESHOLD_PERFORMANCE=85
THRESHOLD_ACCESSIBILITY=95
THRESHOLD_BEST_PRACTICES=90
THRESHOLD_SEO=95

PAGES=(
	"/"
	"/window-cleaning"
	"/move-in-move-out-cleaning"
	"/post-construction-cleaning"
	"/commercial-cleaning"
	"/get-a-quote"
	"/about"
	"/service-areas"
	"/faq"
	"/contact"
)

REPORT_DIR="./lighthouse-reports/$(date +%Y-%m-%d_%H%M)"
mkdir -p "$REPORT_DIR"

FAIL=0

for page in "${PAGES[@]}"; do
	URL="${BASE_URL}${page}"
	SLUG=$(echo "$page" | sed 's|/|-|g; s|^-||; s|^$|home|')
	REPORT="$REPORT_DIR/${SLUG}.json"

	echo ""
	echo "Auditing $URL..."
	lighthouse "$URL" \
		--only-categories=performance,accessibility,best-practices,seo \
		--form-factor=mobile \
		--throttling-method=simulate \
		--output=json --output-path="$REPORT" \
		--chrome-flags="--headless --no-sandbox" \
		--quiet

	PERF=$(jq -r '.categories.performance.score * 100 | floor' "$REPORT")
	A11Y=$(jq -r '.categories.accessibility.score * 100 | floor' "$REPORT")
	BP=$(jq -r '.categories["best-practices"].score * 100 | floor' "$REPORT")
	SEO=$(jq -r '.categories.seo.score * 100 | floor' "$REPORT")

	printf "  Perf: %s  A11y: %s  BP: %s  SEO: %s\n" "$PERF" "$A11Y" "$BP" "$SEO"

	if [ "$PERF" -lt "$THRESHOLD_PERFORMANCE" ]; then
		echo "  ❌ Performance ($PERF) below threshold ($THRESHOLD_PERFORMANCE)"
		FAIL=1
	fi
	if [ "$A11Y" -lt "$THRESHOLD_ACCESSIBILITY" ]; then
		echo "  ❌ Accessibility ($A11Y) below threshold ($THRESHOLD_ACCESSIBILITY)"
		FAIL=1
	fi
	if [ "$BP" -lt "$THRESHOLD_BEST_PRACTICES" ]; then
		echo "  ❌ Best Practices ($BP) below threshold ($THRESHOLD_BEST_PRACTICES)"
		FAIL=1
	fi
	if [ "$SEO" -lt "$THRESHOLD_SEO" ]; then
		echo "  ❌ SEO ($SEO) below threshold ($THRESHOLD_SEO)"
		FAIL=1
	fi
done

echo ""
echo "Reports saved to $REPORT_DIR"

if [ "$FAIL" -eq 1 ]; then
	echo ""
	echo "❌ Lighthouse check FAILED — see report directory for details."
	exit 1
fi

echo "✓ All pages passed Lighthouse thresholds."
