<?php

require_once dirname(__FILE__).'/../lib/serviceGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/serviceGeneratorHelper.class.php';

/**
 * service actions.
 *
 * @package    levandos
 * @subpackage service
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class serviceActions extends autoServiceActions
{

    protected function buildQuery()
  {
    $query = parent::buildQuery();

        $query->andWhere(
                'pub = ?', true
                );

    return $query;
  }

}
