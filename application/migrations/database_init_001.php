<?php
        defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_Init extends CI_Migration{
    public function up(){
        $sql=<<<SQL

        CREATE TABLE zappos_users
        (
            user_login character(60) NOT NULL,
            user_pass character varying(255) NOT NULL,
            user_display_name character varying(50),
            user_email character varying(100) NOT NULL,
            user_url character varying(100),
            user_registered_date timestamp without time zone NOT NULL,
            user_activation_key character varying(100),
            user_status real,
            user_role real,
            bank_name character(60),
            bank_account character(60),
            del_flg character(1) NOT NULL DEFAULT '0'::bpchar,
            CONSTRAINT zappos_users_pkey PRIMARY KEY (user_login)
        )

        CREATE TABLE zappos_users_meta
        (
            umeta_id serial NOT NULL,
            user_login character(60) NOT NULL,
            meta_key character varying(255) NOT NULL,
            meta_value character varying(255) NOT NULL,
            del_flg character(1) NOT NULL DEFAULT '0'::bpchar,
            CONSTRAINT zappos_usermeta_pkey PRIMARY KEY (umeta_id)
        )

        CREATE TABLE zappos_users_activity
        (
            user_login character(60) NOT NULL,
            post_number character varying(255) NOT NULL,
            last_post_date timestamp without time zone,
            best_views_post character(60),
            last_change_gift_date character(60),
            convert_gift_time real DEFAULT 0,
            rate character varying(255) NOT NULL,
            point character varying(255) NOT NULL,
            violate real DEFAULT 0,
            del_flg character(1) NOT NULL DEFAULT '0'::bpchar,
            CONSTRAINT zappos_user_activity_pkey PRIMARY KEY (user_login)
        )

        CREATE TABLE zappos_posts
        (
            post_id serial NOT NULL,
            post_author character(60) NOT NULL,
            post_date timestamp without time zone NOT NULL,
            post_date_gmt timestamp without time zone NOT NULL,
            post_content text NOT NULL,
            post_title text not null,
            post_excerpt text,
            post_status SMALLINT not null,
            comment_status SMALLINT,
            ping_status SMALLINT,
            post_modified_date timestamp without time zone,
            post_modified_date_gmt timestamp without time zone,
            post_content_filterd text,
            post_parent real,
            post_type character varying(10),
            post_views real,
            comment_count SMALLINT DEFAULT 0,
            del_flg character(1) NOT NULL DEFAULT '0'::bpchar,
            CONSTRAINT zappos_posts_pkey PRIMARY KEY (post_id)
        )

        CREATE TABLE zappos_posts_meta
        (
            meta_id serial not null,
            post_id real,
            meta_key character(255),
            meta_value text,
            del_flg character(1) NOT NULL DEFAULT '0'::bpchar,
            CONSTRAINT zappos_posts_meta_pkey PRIMARY KEY (meta_id)
        )

        CREATE TABLE zappos_comments
        (
            comment_id serial not null,
            comment_post_id real,
            comment_author character(60),
            comment_author_email character(60),
            comment_author_url character(60),
            comment_author_ip character(60),
            comment_date timestamp without time zone NOT NULL,
            comment_date_gmt timestamp without time zone NOT NULL,
            comment_content text not null,
            comment_karma SMALLINT,
            comment_approved character(20),
            comment_type character(20),
            comment_parent real,
            comment_user_id character(60),
            del_flg character(1) NOT NULL DEFAULT '0'::bpchar,
            CONSTRAINT zappos_comments_pkey PRIMARY KEY (comment_id)
        )
        CREATE TABLE zappos_comments_meta
        (
            meta_id serial not null,
            comment_id real,
            meta_key character(255),
            meta_value text,
            del_flg character(1) NOT NULL DEFAULT '0'::bpchar,
            CONSTRAINT zappos_comments_meta_pkey PRIMARY KEY (meta_id)
        )

         CREATE TABLE zappos_options
        (
            option_id serial not null,
            option_key character(255),
            option_value text,
            autoload character(20),
            del_flg character(1) NOT NULL DEFAULT '0'::bpchar,
            CONSTRAINT zappos_options_meta_pkey PRIMARY KEY (option_id)
        )
         CREATE TABLE zappos_history
        (
            history_id serial not null,
            history_date timestamp without time zone NOT NULL,
            history_user_id character(60),
            history_action_key character(10),--upload, modifier, delete ,plapla
            history_target_id character(60), -- post id, user id
            history_action_content text,
            del_flg character(1) NOT NULL DEFAULT '0'::bpchar,
            CONSTRAINT zappos_history_pkey PRIMARY KEY (history_id)
        )


        

SQL;
    }
}
