#!/bin/bash
# Backup script — pre-deploy DB and files snapshot
# Usage: ./scripts/backup.sh staging
#        ./scripts/backup.sh production
#
# Requires: WP-CLI on the remote host, SSH access configured

set -e

ENV="${1:-staging}"
DATE=$(date +%Y-%m-%d_%H%M)
BACKUP_DIR="./backups/$ENV"
mkdir -p "$BACKUP_DIR"

case "$ENV" in
	staging)
		HOST="tcg-staging"
		WP_PATH="/var/www/staging.thecleanguyslv.com"
		;;
	production)
		HOST="tcg-production"
		WP_PATH="/var/www/thecleanguyslv.com"
		;;
	*)
		echo "Usage: $0 [staging|production]"
		exit 1
		;;
esac

echo "Backing up $ENV..."

# Database
ssh "$HOST" "cd $WP_PATH && wp db export --add-drop-table - | gzip" \
	> "$BACKUP_DIR/db_${DATE}.sql.gz"

# Uploads (selective — full media, exclude cache)
rsync -avz --exclude='cache/*' --exclude='wp-rocket-config/*' \
	"$HOST:$WP_PATH/wp-content/uploads/" \
	"$BACKUP_DIR/uploads_${DATE}/"

echo "✓ Backup saved to $BACKUP_DIR"
echo "  - db_${DATE}.sql.gz"
echo "  - uploads_${DATE}/"
echo ""
echo "Total size:"
du -sh "$BACKUP_DIR/db_${DATE}.sql.gz" "$BACKUP_DIR/uploads_${DATE}/"
