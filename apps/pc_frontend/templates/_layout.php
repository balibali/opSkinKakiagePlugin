<!DOCTYPE html>
<html>
<head>
<?php include_http_metas() ?>
<?php include_metas() ?>
<?php include_title() ?>
<?php include_stylesheets() ?>
<?php include_javascripts() ?>
<?php if (Doctrine::getTable('SnsConfig')->get('customizing_css')): ?>
<link rel="stylesheet" href="<?php echo url_for('@customizing_css') ?>">
<?php endif; ?>
<?php echo $op_config->get('pc_html_head') ?>
<style>
#Container #Header {
  background-position: left bottom;
}
#Container #Header h1 {
  display: none;
}
#Container #Header #globalNav {
  padding-top: 0;
}

#kakiage_member_list {
  width: 100%;
  margin-bottom: 10px;
}
#kakiage_member_list table {
  margin: 0 auto;
}
#kakiage_member_list td {
  width: 38px;
  height: 38px;
  text-align: center;
}
</style>
</head>
<body id="<?php printf('page_%s_%s', $view->getModuleName(), $view->getActionName()) ?>" class="<?php echo opToolkit::isSecurePage() ? 'secure_page' : 'insecure_page' ?>">
<?php echo $op_config->get('pc_html_top2') ?>
<div id="Body">
<?php echo $op_config->get('pc_html_top') ?>
<div id="Container">

<div id="Header">
<div id="HeaderContainer">
<?php include_partial('global/header') ?>
</div><!-- HeaderContainer -->
</div><!-- Header -->

<div id="Contents">
<div id="ContentsContainer">

<div id="localNav">
<?php
$context = sfContext::getInstance();
$module = $context->getActionStack()->getLastEntry()->getModuleName();
$localNavOptions = array(
  'is_secure' => opToolkit::isSecurePage(),
  'type'      => sfConfig::get('sf_nav_type', sfConfig::get('mod_'.$module.'_default_nav', 'default')),
  'culture'   => $context->getUser()->getCulture(),
);
if ('default' !== $localNavOptions['type'])
{
  $localNavOptions['nav_id'] = sfConfig::get('sf_nav_id', $context->getRequest()->getParameter('id'));
}
include_component('default', 'localNav', $localNavOptions);
?>
</div><!-- localNav -->

<div id="Layout<?php echo $layout ?>" class="Layout">

<?php if ($sf_user->hasFlash('error')): ?>
<?php op_include_parts('alertBox', 'flashError', array('body' => __($sf_user->getFlash('error'), $sf_data->getRaw('sf_user')->getFlash('error_params', array())))) ?>
<?php endif; ?>
<?php if ($sf_user->hasFlash('notice')): ?>
<?php op_include_parts('alertBox', 'flashNotice', array('body' => __($sf_user->getFlash('notice'), $sf_data->getRaw('sf_user')->getFlash('notice_params', array())))) ?>
<?php endif; ?>

<?php if (has_slot('op_top')): ?>
<div id="Top">
<?php include_slot('op_top') ?>
</div><!-- Top -->
<?php endif; ?>

<?php if (has_slot('op_sidemenu')): ?>
<div id="Left">
<?php include_slot('op_sidemenu') ?>
</div><!-- Left -->
<?php endif; ?>

<div id="Center">
<?php echo $sf_content ?>
</div><!-- Center -->

</div><!-- Layout -->

<div id="sideBanner">
<?php if (has_slot('op_bottom')): ?>
<div id="Bottom">
<?php include_slot('op_bottom') ?>
</div><!-- Bottom -->
<?php endif; ?>

<?php if (!isset($_SERVER['HTTP_X_KAKIAGE_NO_SIDE_BANNER'])): ?>
<?php include_component('default', 'sideBannerGadgets'); ?>
<?php endif ?>
</div><!-- sideBanner -->

</div><!-- ContentsContainer -->
</div><!-- Contents -->

<div id="Footer">
<div id="FooterContainer">
<?php include_partial('global/footer') ?>
</div><!-- FooterContainer -->
</div><!-- Footer -->

<?php echo $op_config->get('pc_html_bottom2') ?>
</div><!-- Container -->
<?php echo $op_config->get('pc_html_bottom') ?>
</div><!-- Body -->
</body>
</html>
