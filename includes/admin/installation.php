<?php
    global $wpdb;

    $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}tnw_crm_subscribers (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name`     varchar(150) COLLATE utf8_spanish_ci,
        PRIMARY KEY (id)
        )   ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci");

    $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}tnw_crm_phone(
        `id`    int(11) NOT NULL AUTO_INCREMENT,
        `phone` varchar(100) COLLATE utf8_spanish_ci,
        `subscriber` int(11) NOT NULL,
        PRIMARY KEY (id),
        KEY `subscriber` (`subscriber`)
    )   ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci");

    $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}tnw_crm_email(
        `id`    int(11) NOT NULL AUTO_INCREMENT,
        `email` varchar(100) COLLATE utf8_spanish_ci,
        `subscriber` int(11) NOT NULL,
        PRIMARY KEY (id),
        KEY `subscriber` (`subscriber`)
    )   ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci");
    $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}tnw_crm_binnacle(
        `id`    int(11) NOT NULL AUTO_INCREMENT,
        `incidence` varchar(50) COLLATE utf8_spanish_ci,
        `date`  DATETIME,
        `subscriber` int(11) NOT NULL,
        PRIMARY KEY (id),
        KEY `subscriber` (`subscriber`)
    )   ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci");

    $wpdb->query("ALTER TABLE {$wpdb->prefix}tnw_crm_phone ADD FOREIGN KEY (`subscriber`) REFERENCES {$wpdb->prefix}tnw_crm_subscribers(`id`) ON DELETE CASCADE ON UPDATE CASCADE");
    $wpdb->query("ALTER TABLE {$wpdb->prefix}tnw_crm_email ADD FOREIGN KEY (`subscriber`) REFERENCES {$wpdb->prefix}tnw_crm_subscribers(`id`) ON DELETE CASCADE ON UPDATE CASCADE");
    $wpdb->query("ALTER TABLE {$wpdb->prefix}tnw_crm_binnacle ADD FOREIGN KEY (`subscriber`) REFERENCES {$wpdb->prefix}tnw_crm_subscribers(`id`) ON DELETE CASCADE ON UPDATE CASCADE");
?>