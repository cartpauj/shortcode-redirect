# Shortcode Redirect

A lightweight WordPress plugin that redirects visitors from any page or post using a simple shortcode.

## Usage

Add the shortcode to any page or post:

```
[redirect url='https://example.com' sec='3']
```

| Attribute | Required | Description |
|-----------|----------|-------------|
| `url`     | Yes      | The URL to redirect to |
| `sec`     | No       | Seconds to wait before redirecting (default: `0`) |

While waiting, visitors see a "Please wait while you are redirected..." message with a manual link as a fallback.

## Installation

1. Upload `shortcode-redirect.zip` to `/wp-content/plugins/`
2. Activate via the **Plugins** menu in WordPress
3. Add the `[redirect]` shortcode to your pages or posts

## Requirements

- WordPress 6.0+

## License

GPL-2.0 &mdash; see [LICENSE](LICENSE) for details.
