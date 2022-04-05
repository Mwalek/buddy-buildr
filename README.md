# buddy buildr
An awesome WordPress community theme in the making — stay tuned!

## SEO

The theme is designed to be as SEO-friendly as possible.

Some things to keep in mind in terms of SEO:

[WordPress doesn't add Meta Descriptions](https://codex.wordpress.org/Meta_Tags_in_WordPress) by default. This means that sites would fail one of Lighthouse's [_Content Best Practices_](https://web.dev/meta-description/) tests.

In order to pass this test, I added a default description. This means that if you add your own meta description, for example, using an SEO plugin, then you will have multiple meta descriptions.

My [research](https://help.dragonmetrics.com/en/articles/80693-multiple-meta-descriptions) shows that isn't a problem. But I plan to add an option to remove the default meta description.
