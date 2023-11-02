# WP Mermaid

Generation of diagrams and flowcharts from text in a similar manner as markdown by using [mermaid.js](https://mermaid-js.github.io/)

## Download

| source | download | 
| --- | --- | 
| WordPress | https://wordpress.org/plugins/wp-mermaid |
| GitHub repository | https://github.com/terrylinooo/wp-mermaid/releases | 
| PHP Composer | `composer create-project terrylinooo/wp-mermaid wp-mermaid` |

## Installation

1. Upload the plugin files to the `/wp-content/plugins/wp-mermaid` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Go to the WP Mermaid menu in Settings and set your options.

## How to use

WP Mermaid is smart enough that loads mermaid.js only when your posts contain Mermaid syntax, by detecting the use of shortcode and block. So it will not be loaded on your website everywhere.

### Shortcode

In classic editor, you can use shortcode to render your Mermaid syntax. If you are using WordPress version below 5.0, this is the only way you can use.


```
[mermaid]
sequenceDiagram
    participant Alice
    participant Bob
    Alice->>John: Hello John, how are you?
    loop Healthcheck
        John->>John: Fight against hypochondria
    end
    Note right of John: Rational thoughts <br/>prevail!
    John-->>Alice: Great!
    John->>Bob: How about you?
    Bob-->>John: Jolly good!
[/mermaid]
```

### Gutenberg Block

Choose a Mermaid block:

![](assets/example-gutenberg-block-1.png)

Fill in your Mermaid syntax in the editor.

![](assets/example-gutenberg-block-2.png)

### Changelog

1.0.0

- First release.

1.0.1

- Upgrade Mermaid JavaScript library from 8.5.0 to 8.9.0

1.0.2

- Add Japanese (ja_JP) translation, thanks to [Colocal](https://colocal.com/).
- Test with PHP 8.2.5 and WordPress 6.2.2
- Upgrade Mermaid JavaScript library from 8.9.0 to 9.4.3

1.0.3
- Upgrade Mermaid JavaScript library from 9.4.3 to 10.4.0

### License

WP Mermaid is developed by [Terry Lin](https://terryl.in) and released under the terms of the GNU General Public License v3.

### Also See

If you are looking for a [Markdown editor](https://wordpress.org/plugins/wp-githuber-md/) supporting Mermaid, you can also check out my another WordPress plugin called the [WP Githuber MD](https://github.com/terrylinooo/githuber-md), which provides a variety of features not just Mermaid, it is worth to try.
