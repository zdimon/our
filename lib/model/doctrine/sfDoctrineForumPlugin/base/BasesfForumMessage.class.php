<?php

/**
 * BasesfForumMessage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $topic_id
 * @property string $content
 * @property integer $author
 * @property boolean $hide
 * @property sfForumTopic $sfForumTopic
 * @property sfGuardUser $User
 * 
 * @method integer        getTopicId()      Returns the current record's "topic_id" value
 * @method string         getContent()      Returns the current record's "content" value
 * @method integer        getAuthor()       Returns the current record's "author" value
 * @method boolean        getHide()         Returns the current record's "hide" value
 * @method sfForumTopic   getSfForumTopic() Returns the current record's "sfForumTopic" value
 * @method sfGuardUser    getUser()         Returns the current record's "User" value
 * @method sfForumMessage setTopicId()      Sets the current record's "topic_id" value
 * @method sfForumMessage setContent()      Sets the current record's "content" value
 * @method sfForumMessage setAuthor()       Sets the current record's "author" value
 * @method sfForumMessage setHide()         Sets the current record's "hide" value
 * @method sfForumMessage setSfForumTopic() Sets the current record's "sfForumTopic" value
 * @method sfForumMessage setUser()         Sets the current record's "User" value
 * 
 * @package    levandos
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasesfForumMessage extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_forum_message');
        $this->hasColumn('topic_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('content', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('author', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('hide', 'boolean', null, array(
             'type' => 'boolean',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfForumTopic', array(
             'local' => 'topic_id',
             'foreign' => 'id'));

        $this->hasOne('sfGuardUser as User', array(
             'local' => 'author',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}