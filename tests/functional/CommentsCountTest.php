<?php

namespace tests;


use dosamigos\disqus\CommentsCount;

class CommentsCountTest extends TestCase
{

    public function testRender()
    {
        $widget = CommentsCount::widget([
            'shortname' => 'test-shortname'
        ]);

        $this->assertEqualsWithoutLE(file_get_contents(__DIR__ . '/data/comments-count.script'), $widget);
    }

    public function testException() {
        $this->setExpectedException('yii\base\InvalidConfigException');
        CommentsCount::begin();
    }
}
