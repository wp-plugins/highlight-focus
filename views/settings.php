
<div class="wrap theme-options">
    <div class="icon32" id="icon-options-general"></div><br />
    <h2><?php _e( 'Highlight Focus Settings', 'hf' ); ?></h2>
    <form method="post" action="options.php">
        <?php settings_fields( 'highlight_focus_settings-group' );?>
        <div class="postbox metabox-holder">
            <h3 class="hndle"><?php _e( 'Highlight Focus general settings', 'hf' );?></h3>
            <div class="inside">
                <div class="setting-panel">
                    <p>
                        <?php $highlight_focus_slide_duration = get_option( 'highlight_focus_slide_duration', 500 ); ?>
                        <label style="display: inline-block; width: 20%;" id="highlight_focus_slide_duration_label" for="highlight_focus_slide_duration"><?php _e( 'Effect Duration in ms', 'hf' ); ?></label>
                        <input type="text" name="highlight_focus_slide_duration" id="highlight_focus_slide_duration" value="<?php print $highlight_focus_slide_duration; ?>" style="width: 30%;" />
                    </p>
                    <p>
                        <?php $highlight_focus_hide_delay = get_option( 'highlight_focus_hide_delay', 200 ); ?>
                        <label style="display: inline-block; width: 20%;" id="highlight_focus_hide_delay_label" for="highlight_focus_hide_delay"><?php _e( 'Hide Delay in ms', 'hf' ); ?></label>
                        <input type="text" name="highlight_focus_hide_delay" id="highlight_focus_hide_delay" value="<?php print $highlight_focus_hide_delay; ?>" style="width: 30%;" />
                    </p>
                    <p>
                        <?php $highlight_focus_background_color = get_option( 'highlight_focus_background_color', '#0074A2' ); ?>
                        <label style="display: inline-block; width: 20%;" id="highlight_focus_background_color_label" for="highlight_focus_background_color"><?php _e( 'Background Color', 'hf' ); ?></label>
                        <input type="text" name="highlight_focus_background_color" id="highlight_focus_background_color" value="<?php print $highlight_focus_background_color; ?>" />
                    </p>
                    <p>
                        <?php $highlight_focus_background_opacity = get_option( 'highlight_focus_background_opacity', 0.4 ); ?>
                        <label style="display: inline-block; width: 20%;" id="highlight_focus_background_opacity_label" for="highlight_focus_background_opacity"><?php _e( 'Background Opacity', 'hf' ); ?></label>
                        <input type="text" name="highlight_focus_background_opacity" id="highlight_focus_background_opacity" value="<?php print $highlight_focus_background_opacity; ?>" style="width: 30%;" />
                    </p>
                    <p>
                        <?php $highlight_focus_border_color = get_option( 'highlight_focus_border_color', '#0074A2' ); ?>
                        <label style="display: inline-block; width: 20%;" id="highlight_focus_border_color_label" for="highlight_focus_border_color"><?php _e( 'Border Color', 'hf' ); ?></label>
                        <input type="text" name="highlight_focus_border_color" id="highlight_focus_border_color" value="<?php print $highlight_focus_border_color; ?>" />
                    </p>
                    <p>
                        <?php $highlight_focus_border_opacity = get_option( 'highlight_focus_border_opacity', 0.8 ); ?>
                        <label style="display: inline-block; width: 20%;" id="highlight_focus_border_opacity_label" for="highlight_focus_border_opacity"><?php _e( 'Border Opacity', 'hf' ); ?></label>
                        <input type="text" name="highlight_focus_border_opacity" id="highlight_focus_border_opacity" value="<?php print $highlight_focus_border_opacity; ?>" style="width: 30%;" />
                    </p>
                    <p>
                        <?php $highlight_focus_no_outline = get_option( 'highlight_focus_no_outline', '1' ); ?>
                        <input type="checkbox" name="highlight_focus_no_outline" id="highlight_focus_no_outline" <?php checked( $highlight_focus_no_outline, 1 ); ?> value="1" style="width: auto;" />
                        <label id="highlight_focus_no_outline_label" for="highlight_focus_no_outline"><?php _e( 'Hide regular outline', 'hf' ); ?></label>
                    </p>
                </div>
            </div>
        </div>
        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e( 'Save settings', 'nivo' ); ?>" />
        </p>
    </form>
</div>
