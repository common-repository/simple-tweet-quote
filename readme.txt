=== Tweet Button for Quotes ===
Contributors: bfintal, gambitph
Tags: tweet, twitter
Stable tag: 1.0
Requires at least: 4.4
Tested up to: 4.8.1
Requires PHP: 5.2
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Let people Tweet your quotes.

== Description ==

This is a 100% free plugin that serves one single purpose: let people Tweet your quotes.

By adding a Tweet button beside your awesome quotes in your articles, you're making it easier for your readers to spread the word about your article.

Tweet quotes makes sharing more convenient. And the resulting Tweet contains more substance because it also contains the quote you placed while also linking back to your article.

= Is this plugin for me? =

If you have blog posts and want some marketing performed by your readers, then this plugin is for you.

= Usage =

Add the shortcode `[tweetquote]` at the end of your blockquote tag. No need to put anything else. For example:

> &lt;blockquote>You can Tweet this [tweetquote]&lt;/blockquote>

Or, add your text quote inside the shortcode `[tweetquote]` to show a blockquote. For example:

> [tweetquote]You can Tweet this[/tweetquote]

You'll end up with a quote with a Tweet button on the corner that your visitors can use to share your quote.

= Features =

* Super simple: just add the shortcode at the end of your your blockquotes,
* No settings page, because we don't have to,
* No style customizations, since we use [Twitter's Tweet Button method](https://publish.twitter.com)
* No URL shortening, because Twitter [does that already](http://benjaminintal.com/2017/08/28/badewqewqewq-code-comments-and-how-to-avoid-them/),
* No fancy quote styles, because your theme has one already,
* Uses `rel="nofollow"` link, because SEO,
* Grabs your Twitter handle "via @handle" if you use [Yoast SEO's Author Twitter Field](https://yoast.com/social-media-optimization-with-yoast-seo/#htwit), since you're most likely using that plugin already,
* 1 Simple shortcode (See above or FAQ below for usage)

> This 100% free plugin was made possible by the folks over at [Page Builder Sandwich](https://pagebuildersandwich.com/). Give thanks and [try out the page builder](https://wordpress.org/plugins/page-builder-sandwich/)!

== Installation ==

1. Head over to Plugins > Add New in the admin
2. Search for "Simple Tweet Quote"
3. Install & activate the plugin
4. Use the shortcode [tweetquote] in your content:

Add the shortcode `[tweetquote]` at the end of your blockquote tag. No need to put anything else. For example:

> &lt;blockquote>You can Tweet this [tweetquote]&lt;/blockquote>

Add your quote inside the shortcode `[tweetquote]` to show a blockquote. For example:

> [tweetquote]You can Tweet this[/tweetquote]

== Screenshots ==

1. Output a Tweet button for your quote
2. Just add a [tweetquote] at the end of your blockquote
3. This is what happens when you click the Tweet button

== Frequently Asked Questions ==

**How do I use the [tweetquote] shortcode?**

Add the shortcode `[tweetquote]` at the end of your blockquote tag. No need to put anything else. For example:

> &lt;blockquote>You can Tweet this [tweetquote]&lt;/blockquote>

Add your quote inside the shortcode `[tweetquote]` to show a blockquote. For example:

> [tweetquote]You can Tweet this[/tweetquote]

**Where can I set the "via @handle"?**

If you have [Yoast SEO](https://wordpress.org/plugins/wordpress-seo/) installed, fill up the your user's Twitter field in **Users > Your Profile**.

Or you can just fill up the `via` and `related` attributes in the shortcode.

If you want to get rid of the "via @handle", set the attribute value to `false`.

**Do you have quote templates?**

Nope! We just use what your site/theme already has. This is so that we can be as bloat-free and future-proof as possible.

**What are the options of the shortcode?**

*All `[tweetquote]` shortcode attributes are optional.*

* **`text`** – The text to be shared. This defaults to the content of the blockquote the shortcode is placed in.
* **`url`** – The url to Tweet about. This defaults to the current post url.
* **`align`** – The button alignment, can be `left`, `center` or `right`. Defaults to `right`.
* **`via`** – The "via @handle" part of the Tweet, good for branding. Defaults to the post author's Twitter handle from [Yoast SEO](https://wordpress.org/plugins/wordpress-seo/). Put `false` to disable.
* **`related`** – An account related to the text being shared. Defaults to the post author's Twitter handle from [Yoast SEO](https://wordpress.org/plugins/wordpress-seo/). Put `false` to disable.
* **`label`** – The label of the Tweet button. Defaults to `Tweet`.
* **`size`** – The size of the button, can be `small` or `large`. Defaults to `large`.
* **`class`** – An optional class of the button.

*If you add content inside the `[tweetquote]` shortcode, it will output a blockquote*

== Upgrade Notice ==

None.

== Changelog ==

= 1.0 =

* First release
