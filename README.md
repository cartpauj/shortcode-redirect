# Shortcode Redirect

A lightweight WordPress plugin that redirects visitors from any page or post — via either a **shortcode** or a **block editor block**. Both output the same `<meta http-equiv="refresh">` tag.

## Usage

### Shortcode

```
[redirect url='https://example.com' sec='3' show_message='true']
```

| Attribute      | Required | Default | Description |
|----------------|----------|---------|-------------|
| `url`          | Yes      | —       | Destination URL |
| `sec`          | No       | `0`     | Seconds to wait before redirecting |
| `show_message` | No       | `true`  | Show the "Please wait while you are redirected..." line (`false` / `0` / `no` / `off` to hide) |

### Block

In the block editor, add the **Redirect** block (under *Widgets*). The sidebar exposes the destination URL, delay, and a *Show "redirecting" message* toggle.

## Installation

1. Upload `shortcode-redirect.zip` to `/wp-content/plugins/`
2. Activate via the **Plugins** menu in WordPress
3. Add the `[redirect]` shortcode or the **Redirect** block to any page or post

## Requirements

- WordPress 6.0+

## License

GPL-2.0-or-later — see [LICENSE](LICENSE).
