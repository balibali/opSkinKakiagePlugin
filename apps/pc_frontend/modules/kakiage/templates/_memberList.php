<div id="kakiage_member_list">
<table>
<?php $i = 0; foreach ($members as $member): ?>
<?php if ($i % 6 === 0): ?><tr><?php endif ?>
<td><?php echo link_to(op_image_tag_sf_image($member->getImageFileName(), array('size' => '36x36', 'alt' => $member->getName(), 'title' => $member->getName())), 'obj_member_profile', $member) ?></td>
<?php if ($i % 6 === 5): ?></tr><?php endif ?>
<?php $i++; endforeach ?>
</table>
</div>
