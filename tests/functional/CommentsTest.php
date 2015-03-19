<?php

namespace tests;


use dosamigos\disqus\Comments;

class CommentsTest extends TestCase
{
    public function testRender()
    {
        $widget = Comments::widget([
            'shortname' => 'test-shortname'
        ]);
        $this->assertEqualsWithoutLE(file_get_contents(__DIR__ . '/data/comments.script'), $widget);
    }

    public function testLanguage() {
        $widget = Comments::widget([
            'shortname' => 'test-shortname',
            'language' => 'es'
        ]);
        $this->assertEqualsWithoutLE(file_get_contents(__DIR__ . '/data/comments-variables.script'), $widget);
    }

    public function testException() {
        $this->setExpectedException('yii\base\InvalidConfigException');
        Comments::begin();
    }
}
