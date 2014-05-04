<?php
/**
 * @copyright Copyright (c) 2014 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\disqus;


/**
 * \dosamigos\disqus\DisqusComments widget renders the javascript configuration view for Disqus comments
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\disqus
 */
class DisqusComments extends Widget
{

    /**
     * @var string text for Disqus credits. Modify it on your app if you require i18n.
     */
    public $credits = '<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>';
    /**
     * @var string text for Disqus noscript tag. Modify it on your app if you rquire i18n.
     */
    public $noScript = 'Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a>';

    /**
     * @inheritdoc
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        $this->view = 'disqus-comments';
        $this->params['credits'] = $this->credits;
        $this->params['noScript'] = $this->noScript;
        parent::init();
    }
} 