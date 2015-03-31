<?php
/**
 * Licensed under The GPL-3.0 License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @since    2.0.0
 * @author   Christopher Castro <chris@quickapps.es>
 * @link     http://www.quickappscms.org
 * @license  http://opensource.org/licenses/gpl-3.0.html GPL-3.0 License
 */
?>

<?php echo $this->Form->create($block, ['role' => 'form']); ?>
    <fieldset>
        <legend><?php echo __d('block', 'Creating New Block'); ?></legend>
            <?php echo $this->Form->input('title', ['label' => __d('block', 'Title *')]); ?>
            <em class="help-block"><?php echo __d('block', 'The title of the block as shown to the user.'); ?></em>

            <?php echo $this->Form->input('description', ['label' => __d('block', 'Description *')]); ?>
            <em class="help-block"><?php echo __d('block', 'A brief description of your block. Used on the Blocks administration page.'); ?></em>

            <?php echo $this->Form->input('status', ['type' => 'checkbox', 'label' => __d('block', 'Published')]); ?>
            <em class="help-block"><?php echo __d('block', 'Check this to enable this block.'); ?></em>

            <?php echo $this->Form->input('body', ['label' => __d('block', 'Body *')]); ?>
            <em class="help-block"><?php echo __d('block', 'The content of the block as shown to the user.'); ?></em>

            <?php echo $this->Form->input('locale', ['type' => 'select', 'error' => false, 'label' => __d('block', 'Language'), 'options' => $languages, 'multiple' => 'checkbox']); ?>
            <em class="help-block"><?php echo __d('block', 'Show this block for these languages. If no language is selected, block will show regardless of language.'); ?></em>

            <fieldset>
                <legend><?php echo __d('block', 'Theme Region'); ?></legend>
                <em class="help-block"><?php echo __d('block', 'Specify in which themes and regions this block is displayed.'); ?></em>

                <?php foreach ($regions as $info): ?>
                    <?php echo $this->Form->input("region.{$info['theme']}", ['type' => 'select', 'value' => $info['value'], 'label' => $info['theme'], 'options' => $info['regions'], 'empty' => __d('block', '- NONE -')]); ?>
                    <em class="help-block">(<?php echo __d($info['theme'], $info['description']); ?>)</em>
                <?php endforeach; ?>

            </fieldset>

            <fieldset>
                <legend><?php echo __d('block', 'Visibility Settings'); ?></legend>

                <?php
                    echo $this->Form->radio('visibility', [
                        'except' => __d('block', 'All pages except those listed'),
                        'only' => __d('block', 'Only the listed pages'),
                        'php' => __d('block', 'Pages on which this PHP code returns TRUE (experts only)'),
                    ], [
                        'type' => 'radio',
                        'label' => __d('block', 'Pages'),
                    ]);
                ?>

                <?php echo $this->Form->input('pages', ['label' => false, 'rows' => 5]); ?>
                <em class="help-block"><?php echo __d('block', 'Specify pages by using their paths, enter one path per line. The <code>*</code> character is a wildcard. <code>/</code> is the front page.'); ?></em>
                <em class="help-block"><?php echo __d('block', 'If the PHP option is chosen, enter PHP code between <code><?php ... ?></code> tags. Examples:'); ?></em>
                <em class="help-block"><?php echo __d('block', '<code>/product/*.html</code> Matches any product page.'); ?></em>
                <em class="help-block"><?php echo __d('block', '<code>/find/*type:article*</code> Matches any search result containing articles.'); ?></em>
                <em class="help-block"><?php echo __d('block', "<code>/</code> Matches site's front page (a.k.a. site's index)."); ?></em>

                <hr />

                <?php echo $this->Form->input('roles._ids', ['type' => 'select', 'options' => $roles, 'multiple' => true, 'label' => __d('block', 'Show Block For Specific Roles')]); ?>
                <em class="help-block">(<?php echo __d('block', 'Show this block only for the selected role(s). If you select no roles, the block will be visible to all users.'); ?>)</em>
            </fieldset>

            <?php echo $this->Form->submit(__d('block', 'Create Block')); ?>
    </fieldset>
<?php echo $this->Form->end(); ?>
