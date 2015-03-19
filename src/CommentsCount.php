<?php
/**
 * @copyright Copyright (c) 2013-15 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\disqus;

/**
 * \dosamigos\disqus\CommentsCount widget renders the javascript configuration view for Disqus Comment Count
 *
 * @see http://help.disqus.com/customer/portal/articles/565624-tightening-your-disqus-integration
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\disqus
 */
class CommentsCount extends Widget
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->view = 'disqus-comments-count';
        parent::init();
    }
}