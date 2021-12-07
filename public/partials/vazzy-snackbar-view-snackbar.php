<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Vazzy_Snackbar
 * @subpackage Vazzy_Snackbar/public/partials
 * @var $snackbar_data
 */

$list_class = apply_filters('vazzy_snackbar_el_class', [
    $snackbar_data['vertical_position'],
    $snackbar_data['horizontal_position'],
    $snackbar_data['layout_type']
], 'vazzy-snackbar-list--');
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<? if (count($snackbar_data['snackbars'])) { 
    
    ?>
    <div class="vazzy-snackbar-list<?= $list_class ? ' ' . $list_class : '' ?>">
        <? foreach ($snackbar_data['snackbars'] as $snackbar) {
     
            $el_style = apply_filters('vazzy_snackbar_el_style', [
                'background-color' => $snackbar['background_color'],
                'color' => $snackbar['text_color']
            ]);
            $el_class = apply_filters('vazzy_snackbar_el_class', [
                'align-' . $snackbar['align_content']
            ], 'vazzy-snackbar--');
        ?>
            <div class="vazzy-snackbar-container">
                <div class="vazzy-snackbar<?= $el_class ? ' ' . $el_class : '' ?>" data-sid="<?= $snackbar['id'] ?>" data-show-after="<?= $snackbar['show_after'] ?>" <? if ($snackbar['background_color'] || $snackbar['text_color']) { ?> style="<?= $el_style ?>" <? } ?>>
                    <div class="vazzy-snackbar__inner">
                        <div class="vazzy-snackbar__content">
                            <?= $snackbar['content'] ?>
                        </div>
                        <? if ($snackbar['show_action_button']) { ?>
                            <div class="vazzy-snackbar__actions">
                                <?= apply_filters('vazzy_snackbar_btn', $snackbar['action_button']) ?>
                            </div>
                        <? } ?>
                    </div>
                    <? if (!$snackbar['hide_close_button'] && (!$snackbar['action_button'] || $snackbar['action_button']['action'] !== 'close')) { ?>
                        <div role="button" class="vazzy-snackbar__close" title="close">
                            <i class="dashicons dashicons-no-alt"></i>
                        </div>
                    <? } ?>
                </div>
                <? if ($snackbar['show_action_button'] && $snackbar['action_button']['action'] == 'popup') {
                    $inner_popup_style = apply_filters('vazzy_snackbar_el_style', [
                        'max-width' => $snackbar['popup_width'] . 'px',
                    ])
                ?>
                    <div class="vazzy-snackbar-popup" style="display: none">
                        <div class="vazzy-snackbar-popup__inner" <? if ($inner_popup_style) { ?> style="<?= $inner_popup_style ?>" <? } ?>>
                            <div class="vazzy-snackbar-popup__content">
                                <?= $snackbar['popup_text'] ?>
                            </div>
                            <div role="button" class="vazzy-snackbar-popup__close" title="close">
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
        <? } ?>
    </div>
<? } ?>