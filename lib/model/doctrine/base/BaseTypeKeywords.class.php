<?php

/**
 * BaseTypeKeywords
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $title
 * @property Doctrine_Collection $Keyword
 * 
 * @method integer             getId()      Returns the current record's "id" value
 * @method string              getTitle()   Returns the current record's "title" value
 * @method Doctrine_Collection getKeyword() Returns the current record's "Keyword" collection
 * @method TypeKeywords        setId()      Sets the current record's "id" value
 * @method TypeKeywords        setTitle()   Sets the current record's "title" value
 * @method TypeKeywords        setKeyword() Sets the current record's "Keyword" collection
 * 
 * @package    levandos
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTypeKeywords extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('type_keywords');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('title', 'string', 250, array(
             'type' => 'string',
             'length' => 250,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Keyword', array(
             'local' => 'id',
             'foreign' => 'type_keywords_id'));

        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'title',
             ),
             ));
        $this->actAs($i18n0);
    }
}