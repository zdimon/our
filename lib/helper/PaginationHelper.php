<?php

function pager_info($pager)
{
	return $pager->getFirstIndice().' - '.$pager->getLastIndice().' '.__('из').' '.$pager->count().' '.__('результатов');
}
 
function pager_navigation($pager, $uri, $pars = array())
{
  $navigation = '';
 
  if ($pager->haveToPaginate())
  {
   $navigation .= ' <div class="paginator textcenter">';
// if(count($pars)>0)
//    {
////       $pref = '';
////        foreach($pars as $p)
////        {
////            if(sfContext::getInstance()->getRequest()->getParameter($p))
////            {
////                $pref = '?'.$p.'='.sfContext::getInstance()->getRequest()->getParameter($p);
////            }
////
////        }
//
//        if(strlen($pref)>0)
//        {
//          $uri .= $pref.'&page=';
//        }
//        else
//        {
//           $uri .= '?page=';
//        }
//    }
//    else
//    {
//        $uri .= (preg_match('/\?/', $uri) ? '&' : '?').'page=';
//    }

    $uri .= myRequest::params2str().'&page=';
 

    // First and previous page
    if ($pager->getPage() != 1)
    {
      $navigation .= link_to(__('Первая'), $uri.'1');
      $navigation .= link_to(__('<'), $uri.$pager->getPreviousPage()).' ';
    }

   

    // Pages one by one
    $links = array();
    foreach ($pager->getLinks(20) as $page)
    {
      if($page == $pager->getPage())
      {
        $links[] =  '<a class="cur">'.$page.'</a>' ;
      }
      else
      {
        $links[] = link_to( $page, $uri.$page);
      }
      
    }
    $navigation .= join('  ', $links);
 
    // Next and last page
    if ($pager->getPage() != $pager->getLastPage())
    {
      $navigation .= ' '.link_to(__('>'), $uri.$pager->getNextPage());
      $navigation .= link_to(__('Последняя'), $uri.$pager->getLastPage());
    } 
	
	$navigation .= '&nbsp;&nbsp;&nbsp;&nbsp;<b>'.pager_info($pager).'</b>'.'</div>';
  }

  return $navigation;
}




function pager_navigation2($pager, $uri, $pars = array())
{
  $navigation = '';
 
  if ($pager->haveToPaginate())
  {
   $navigation .= ' <div class="paginator">';
 if(count($pars)>0)
    {
       $pref = '';
        foreach($pars as $p)
        {
            if(sfContext::getInstance()->getRequest()->getParameter($p))
            {
                $pref = '?'.$p.'='.sfContext::getInstance()->getRequest()->getParameter($p);
            }

        }
        if(strlen($pref)>0)
        {
          $uri .= $pref.'&page=';
        }
        else
        {
           $uri .= '?page=';
        }
    }
    else
    {
        $uri .= (preg_match('/\?/', $uri) ? '&' : '?').'page=';
    }

    
 

    // First and previous page
    if ($pager->getPage() != 1)
    {
      $navigation .= link_to(__('Первая'), $uri.'1');
      $navigation .= link_to(__('<'), $uri.$pager->getPreviousPage()).' ';
    }

   

    // Pages one by one
    $links = array();
    foreach ($pager->getLinks(20) as $page)
    {
      if($page == $pager->getPage())
      {
        $links[] =  '<a class="cur">'.$page.'</a>' ;
      }
      else
      {
        $links[] = link_to( $page, $uri.$page);
      }
      
    }
    $navigation .= join('  ', $links);
 
    // Next and last page
    if ($pager->getPage() != $pager->getLastPage())
    {
      $navigation .= ' '.link_to(__('>'), $uri.$pager->getNextPage());
      $navigation .= link_to(__('Последняя'), $uri.$pager->getLastPage());
    } 
	
	$navigation .= '</div>';
  }

  return $navigation;
}

 function params2str($additional_parameters=array(), $clean_parameters=array('module', 'action'))
  {
    $parameters = sfContext::getInstance ()->getRequest ()->getParameterHolder()->getAll();
    foreach ($clean_parameters as $value)
    	if(isset($parameters[$value]))
    		unset($parameters[$value]);


    foreach ($additional_parameters as $key => $value)
    	$parameters[$key] = $value;

    foreach ($parameters as $key => $value)
      {
        if(is_array($value))
        {

           unset($parameters[$key]);
           foreach($value as $k=>$v)
           {
             $str = $key.'['.$k.']';
             $parameters[$str] = $str.'='.$v;
            //die;

           }

        }
        else
        {
           $parameters[$key] = $key.'='.$value;
        }
      }




    return '?'.implode('&', $parameters);
  }