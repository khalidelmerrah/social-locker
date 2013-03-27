<?php

class SocialLockerActivate extends OnePressFR103Activation {
    
    public function activate() {
        parent::activate();
        
        // options
        
	add_option('sociallocker_facebook_appid', '117100935120196');
	add_option('sociallocker_lang', 'en_US');
        add_option('sociallocker_short_lang', 'en');

        // pages and posts
        
        $baseLockerInfo = $this->addPost(
            'default_sociallocker_locker_id',
            array(
                'post_type' => 'social-locker',
                'post_title' => 'Default Locker',
                'post_name' => 'default_sociallocker_locker'
            ),
            array(
                'sociallocker_text_header' => 'This content is locked!',       
                'sociallocker_text_message' => 'Please support us, use one of the buttons below to unlock the content.',
                'sociallocker_style' => 'secrets',
                'sociallocker_mobile' => true,          
                'sociallocker_highlight' => true,                   
                'sociallocker_is_system' => true,
                'sociallocker_is_default' => 'block'
            )
        );
        
        add_option('sociallocker_tracking', 'true');

        // tables
        global $wpdb;

        $sql = "
            CREATE TABLE {$wpdb->prefix}so_tracking (
              ID BIGINT(20) NOT NULL AUTO_INCREMENT,
              AggregateDate DATE NOT NULL,
              PostID BIGINT(20) NOT NULL,
              total_count INT(11) NOT NULL DEFAULT 0,
              facebook_like_count INT(11) NOT NULL DEFAULT 0,
              twitter_tweet_count INT(11) NOT NULL DEFAULT 0,
              google_plus_count INT(11) NOT NULL DEFAULT 0,
              timer_count INT(11) NOT NULL DEFAULT 0,
              cross_count INT(11) NOT NULL DEFAULT 0,  
              facebook_share_count INT(11) NOT NULL DEFAULT 0,
              twitter_follow_count INT(11) NOT NULL DEFAULT 0,
              google_share_count INT(11) NOT NULL DEFAULT 0,
              linkedin_share_count INT(11) NOT NULL DEFAULT 0,    
              PRIMARY KEY  (ID),
              KEY IX_wp_so_tracking_PostID (PostID),
              UNIQUE KEY UK_wp_so_tracking (AggregateDate,PostID)
            );";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    } 
}