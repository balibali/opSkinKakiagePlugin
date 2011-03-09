<?php
$moreInfo = array();
$moreInfo[] = link_to(__('Edit Photo'), '@member_config_image');
$moreInfo[] = link_to(__('Show Profile'), '@member_profile_mine');

$options = array(
  'object'   => $member,
  'moreInfo' => $moreInfo,
);
op_include_parts('memberImageBox', 'kakiage_memberImageBox', $options);
