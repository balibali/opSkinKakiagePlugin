<?php

class kakiageComponents extends sfComponents
{
  public function executeMemberImageBox()
  {
    $this->member = $this->getUser()->getMember();
  }

  public function executeMemberList()
  {
    $this->members = Doctrine::getTable('Member')
      ->createQuery()
      ->where('is_login_rejected = 0')
      ->orderBy('id desc')
      ->execute();
  }
}
