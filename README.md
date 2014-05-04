DISQUS Widget for Yii2
======================

DISQUS widget helps you to render your DISQUS comments thread or DISQUS comments thread count on your Yii2 applications.

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require "2amigos/yii2-disqus-widget" "*"
```
or add

```json
"2amigos/yii2-disqus-widget" : "*"
```

to the require section of your application's `composer.json` file.

Usage
-----

To display DISQUS comments

```php
use dosamigos\disqus\Comments;

echo Comments::widget([
    // see http://help.disqus.com/customer/portal/articles/472098-javascript-configuration-variables
    'shortname' => '{yourforumshortname}',
    'identifier' => 'article_identifier'
]);
```

To display DISQUS comments count, first setup the link where you wish to display the comments (visit
[DISQUS integration](http://help.disqus.com/customer/portal/articles/565624-tightening-your-disqus-integration))

```html
<a href="http://example.com/#disqus_thread">article</a>
```

By default Disqus looks up the count using the comment count links href attribute.
However, the count can also be looked up using a Disqus identifier:

```html
<a href="http://example.com/#disqus_thread" data-disqus-identifier="article_identifier">article</a>
```

Then is just a matter to render the CommentsCount widget:

```php
DisqusCommentsCount::widget([
    'shortname' => '{yourforumshortname}',
    'identifier' => 'article_identifier'
]);
```

Further Information
-------------------
Please, check the [DISQUS developers](http://help.disqus.com/customer/portal/topics/107054-developers/articles)
documentation for further information about its integration and configuration options.


> [![2amigOS!](http://www.gravatar.com/avatar/55363394d72945ff7ed312556ec041e0.png)](http://www.2amigos.us)  
<i>Web development has never been so fun!</i>  
[www.2amigos.us](http://www.2amigos.us)