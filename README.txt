=== WP Mermaid ===
Contributors: Terry Lin
Tags: markdown, flowchat, sequence, diagram, mermaid
Requires at least: 4.0
Tested up to: 5.4.1
Stable tag: 1.0.0
Requires PHP: 5.3.0
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl.html

== Description ==

Generation of diagrams and flowcharts from text in a similar manner as markdown by using [mermaid.js](https://mermaid-js.github.io/)

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/wp-mermaid` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Go to the WP Mermaid menu in Settings and set your options.

== How to use ==

WP Mermaid is smart enough that loads mermaid.js only when your posts contain Mermaid syntax, by detecting the use of shortcode and block. So it will not be loaded on your website everywhere.

= Shortcode =

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

= Gutenberg Block =

1. Choose a Mermaid syntax block.
2. Fill in your Mermaid syntax in the editor.

== Frequently Asked Questions ==

None.

== Screenshots ==

1. Choose a Mermaid syntax block.
2. Fill in your Mermaid syntax in the editor.


### Also See

If you are looking for a [Markdown editor](https://github.com/terrylinooo/githuber-md) supporting Mermaid, you can also check out [Terry Lin](https://terryl.in)'s WordPress plugin called the [WP Githuber MD](https://wordpress.org/plugins/wp-githuber-md/), which provides a variety of features not just Mermaid, it is worth to try.

== Copyright ==

WP Mermaid, Copyright 2020 TerryL.in
WP Mermaid is distributed under the terms of the GNU GPL

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

== Changelog ==

= 1.0.0 =

- First release.

== Upgrade Notice ==
