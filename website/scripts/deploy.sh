#!/bin/bash
# Deploy script — rsync child theme to staging or production
# Usage: ./scripts/deploy.sh staging
#        ./scripts/deploy.sh production
#
# Requires: SSH access to host configured in ~/.ssh/config under aliases
#           "tcg-staging" and "tcg-production"

set -e

ENV="${1:-staging}"
LOCAL_THEME="theme/thecleanguys-child/"

case "$ENV" in
	staging)
		REMOTE="tcg-staging:/var/www/staging.thecleanguyslv.com/wp-content/themes/thecleanguys-child/"
		;;
	production)
		REMOTE="tcg-production:/var/www/thecleanguyslv.com/wp-content/themes/thecleanguys-child/"
		echo "⚠️  Deploying to PRODUCTION."
		read -p "Type 'deploy' to confirm: " confirm
		[ "$confirm" = "deploy" ] || { echo "Aborted."; exit 1; }
		;;
	*)
		echo "Usage: $0 [staging|production]"
		exit 1
		;;
esac

echo "Deploying $LOCAL_THEME → $REMOTE"

rsync -avz --delete \
	--exclude '.DS_Store' \
	--exclude '.git*' \
	--exclude 'node_modules' \
	--exclude '*.log' \
	"$LOCAL_THEME" "$REMOTE"

echo "✓ Deploy complete."
echo ""
echo "Next steps:"
echo "  1. Clear cache on the host (WP Rocket or LiteSpeed)"
echo "  2. Verify the site loads"
echo "  3. Run Lighthouse on the deployed page"
