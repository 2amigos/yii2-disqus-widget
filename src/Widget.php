<?php
/**
 * @copyright Copyright (c) 2013-15 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\disqus;

use yii\base\InvalidConfigException;
use yii\helpers\Inflector;

/**
 * \dosamigos\disqus\Widget is the base class for all DISQUS widgets
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\disqus
 */
class Widget extends \yii\base\Widget
{
    /**
     * @var string tells the Disqus service your forum's shortname, which is the unique identifier for your website as
     * registered on Disqus. If undefined, the Disqus embed will not load.
     */
    public $shortname;
    /**
     * @var string tells the Disqus service how to identify the current page. When the Disqus embed is loaded, the
     * identifier is used to look up the correct thread. If disqus_identifier is undefined, the page's URL will be used.
     * The URL can be unreliable, such as when renaming an article slug or changing domains, so we recommend using your
     * own unique way of identifying a thread.
     */
    public $identifier;
    /**
     * @var string tells the Disqus service the title of the current page. This is used when creating the thread on
     * Disqus for the first time. If undefined, Disqus will use the <title> attribute of the page. If that attribute
     * could not be used, Disqus will use the URL of the page.
     */
    public $title;
    /**
     * @var string tells the Disqus service the URL of the current page. If undefined, Disqus will take the
     * window.location.href. This URL is used to look up or create a thread if disqus_identifier is undefined.
     * In addition, this URL is always saved when a thread is being created so that Disqus knows what page a thread
     * belongs to.
     */
    public $url;
    /**
     * @var string tells the Disqus service the category to be used for the current page. This is used when creating
     * the thread on Disqus for the first time.
     */
    public $categoryId;
    /**
     * @var boolean tells the Disqus service to never use the mobile optimized version of Disqus.
     */
    public $disableMobile;
    /**
     * @var string the view to use. It is used internally by child classes.
     */
    protected $view;
    /**
     * @var array the parameters to pass to the view. It is used internally by child classes.
     */
    protected $params = [];

    /**
     * @inheritdoc
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        if (empty($this->shortname)) {
            throw new InvalidConfigException('"$shortname" cannot be empty.');
        }
        $this->params['variables'] = $this->variablize();
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        echo $this->render($this->view, $this->params);
    }

    /**
     * Converts the public variables to disqus js configuration variables
     * @return string
     */
    protected function variablize()
    {
        $vars = [];
        $class = new \ReflectionClass(Widget::className());
        foreach ($class->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {

            if (!$property->isStatic()) {
                $name = $property->getName();
                if (!empty($this->{$name})) {
                    $vars[] = 'var disqus_' . Inflector::underscore($name) . '=' .
                        ($name == 'disableMobile' ? $this->{$name} : '"' . $this->{$name} . '"') . ';';
                }
            }
        }
        return implode("\n\t", $vars);
    }
}