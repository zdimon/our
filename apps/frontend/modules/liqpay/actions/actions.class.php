<?php

/**
 * access actions.
 *
 * @package    xy
 * @subpackage access
 * @author     wezom.com.ua
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class liqpayActions extends sfActions
{
    
 public function executeRefuse(sfWebRequest $request)
  {
      $bill = LiqpayTable::getInstance()->find($request->getParameter('id'));
      $bill->delete();
      $this->getUser ()->setFlash ( 'message', __('Your bill has been deleted.') );
      $this->redirect ( 'profile/member' );
  }    
    
 private function makeBill($request)
 {
     $ammount = $request->getParameter('ammount');
     $b = new Liqpay();
     $b->setUserId($this->getUser()->getGuardUser()->getId());
     $b->setAmmount($ammount);
     $b->setMembershipId($request->getParameter('membership_id'));
     if($request->getParameter('membership_id')==0)
     {
         $b->setSumma($request->getParameter('ammount'));
     }
     $b->save();
     
    // $b->setStatus(1);
    // $b->save();
     
     return $b;
 }

  public function executeConfirm(sfWebRequest $request)
  {
      $this->bill = $this->makeBill($request);
  }
  
  public function executeSubmit(sfWebRequest $request)
  {
      $bill =  LiqpayTable::getInstance()->find($request->getParameter('id'));

  }
  

    public function executeDone(sfWebRequest $request)
    {
        $this->getUser ()->setFlash ( 'message', __('Your payment has been done!'));
        $this->redirect('profile/member');
    }

    public function executePay(sfWebRequest $request)
    {
        
        $xml = $_POST['operation_xml'];
        $sign = $_POST['signature'];
        $xml_decoded=base64_decode($xml); 
        $map = simplexml_load_string($xml_decoded);
        $id = $map->goods_id;
        $l = LiqpayTable::getInstance()->find($id);
        if($l)
        {
          if($map->status == 'success')
          {
            $l->setStatus(1);
            $l->setInXml($xml_decoded);
            $l->save();
          } else {
            
            $l->setStatus(2);
            $l->setInXml($xml_decoded);
            $l->save();     
              
          } 
        }
     

    }


}
