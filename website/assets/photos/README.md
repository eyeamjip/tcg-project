# Photos

Drop client photography here as you receive it from Kervin & Jason. Suggested organization:

```
photos/
├── hero/                Homepage hero candidates (1920x1080+, landscape)
├── window-cleaning/     Window cleaning job photos
├── move-cleaning/       Move in/out job photos
├── post-construction/   Construction cleanup photos
├── commercial/          Office, retail, restaurant photos
├── team/                Kervin, Jason, crew photos for /about
└── before-after/        Before/after pairs (powerful trust signal)
```

## Naming convention

`{service}-{descriptor}-{location}.{ext}`

Examples:
- `window-cleaning-summerlin-home.jpg`
- `move-out-2br-henderson.jpg`
- `team-kervin-jason.jpg`
- `before-after-kitchen-postconstruction.jpg`

## Source priority

1. **Original phone photos** from Kervin & Jason (best quality, full rights)
2. **Yelp photos** (47 already uploaded to their Yelp listing)
3. **Instagram posts** (174 posts on @thecleanguysllc)
4. **Stock placeholders** (only as last resort during build)

## Pre-CMS requirements

Before uploading to WordPress:

- [ ] Resize to max 1920px wide (no point larger for web)
- [ ] Compress with Squoosh, ImageOptim, or TinyPNG (target <300KB per image)
- [ ] Convert to WebP with JPEG fallback (Imagify/ShortPixel does this on upload)
- [ ] Strip EXIF data (privacy)
- [ ] Rename per the convention above
