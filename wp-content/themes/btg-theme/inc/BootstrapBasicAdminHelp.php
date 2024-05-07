<?php

if (!class_exists('BootstrapBasicAdminHelp')) {
    class BootstrapBasicAdminHelp{
        public function themeHelpMenu() {
            add_theme_page(__('website help', 'bootstrap-basic'),__('website help', 'bootstrap-basic'), 'edit_posts', 'theme_help',array($this, 'themeHelpPage'));
        }
    }
}
