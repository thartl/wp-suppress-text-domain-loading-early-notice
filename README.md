# Suppress Translation Timing Notice

**File:** `osimpw-suppress-text-domain-loading-notice.php`

## Installation

This plugin must be installed as a must-use plugin to ensure it loads before user-installed plugins.

Download the PHP file and place in:

```
wp-content/mu-plugins/
```

## What it does

It hides the “Translation loading … triggered too early” notices introduced in WordPress 6.7, keeping your logs and on‑screen debug output clean until affected plugins/themes update.

## Removal

Simply delete the file from `mu-plugins/` once the upstream plugins have been fixed or WordPress core relaxes the check.
