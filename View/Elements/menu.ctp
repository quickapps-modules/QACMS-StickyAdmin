<div id="stickyNav" class="stickyNav-top">
    <ul>
        <li><a href="" title="<?php echo __d('sticky_admin', 'Stick at top'); ?>" onclick="QuickApps.sticky_admin_pos(1); return false"><?php echo $this->Html->image('/sticky_admin/img/top.png'); ?></a></li>
        <li><a href="" title="<?php echo __d('sticky_admin', 'Stick at bottom'); ?>"  onclick="QuickApps.sticky_admin_pos(0); return false"><?php echo $this->Html->image('/sticky_admin/img/bottom.png'); ?></a></li>
        <li><a href="<?php echo $this->Html->url('/admin'); ?>"><?php echo __d('sticky_admin', 'Dashboard'); ?></a></li>
        <?php if(isset($Layout['node']['Node']['slug'])): ?>
        <li><a href="<?php echo $this->Html->url('/admin/node/contents/edit/' . $Layout['node']['Node']['slug']); ?>" target="_blank"><?php echo __d('sticky_admin', 'Edit'); ?></a></li>

        <?php endif; ?>
        <li><a href="<?php echo $this->Html->url('/admin/node/contents/create/'); ?>"><?php echo __d('sticky_admin', 'New Content'); ?></a></li>
        <li><a href="<?php echo $this->Html->url('/admin/comment/unpublished/'); ?>"><?php echo __d('sticky_admin', 'Comments (%s)', $comments); ?></a></li>
        <li><a href="<?php echo $this->Html->url('/admin/system/themes'); ?>"><?php echo __d('sticky_admin', 'Appearance'); ?></a></li>
        <li><a href="<?php echo $this->Html->url('/admin/system/configuration'); ?>"><?php echo __d('sticky_admin', 'Configuration'); ?></a></li>

        <li class="search">
            <form action="" method="post" onSubmit="return false;">
                <input type="text" id="sticky-admin-search" value="<?php echo @$criteria; ?>" />
                <input class="searchbutton" type="button" value="" onClick="$(location).attr('href', '<?php echo $this->Html->url('/s/', true); ?>' + $('#sticky-admin-search').val());" />
            </form>
        </li>
    </ul>
</div>
