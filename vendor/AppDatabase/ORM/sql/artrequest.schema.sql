
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- art_request
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `art_request`;

CREATE TABLE `art_request`
(
    `art_request_id` INTEGER NOT NULL AUTO_INCREMENT,
    `is_started` TINYINT(1) DEFAULT 0 NOT NULL,
    `is_completed` TINYINT(1) DEFAULT 0 NOT NULL,
    `is_archived` TINYINT(1) DEFAULT 0 NOT NULL,
    `due_date` DATE NOT NULL,
    `art_requestor_id` INTEGER NOT NULL,
    `event_id` INTEGER NOT NULL,
    `art_request_description` TEXT NOT NULL,
    `submission_date` DATETIME NOT NULL,
    PRIMARY KEY (`art_request_id`),
    INDEX `art_request_art_requestor_type_id` (`art_requestor_id`),
    INDEX `art_request_event_event_id` (`event_id`),
    CONSTRAINT `art_request_ibfk_1`
        FOREIGN KEY (`art_requestor_id`)
        REFERENCES `art_requestor` (`art_requestor_id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `art_request_ibfk_3`
        FOREIGN KEY (`event_id`)
        REFERENCES `event` (`event_id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- art_request_art_request_type
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `art_request_art_request_type`;

CREATE TABLE `art_request_art_request_type`
(
    `art_request_type_id` INTEGER NOT NULL,
    `art_request_id` INTEGER NOT NULL,
    PRIMARY KEY (`art_request_type_id`,`art_request_id`),
    INDEX `art_request_id` (`art_request_id`),
    CONSTRAINT `art_request_art_request_type_ibfk_2`
        FOREIGN KEY (`art_request_id`)
        REFERENCES `art_request` (`art_request_id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `art_request_art_request_type_ibfk_3`
        FOREIGN KEY (`art_request_type_id`)
        REFERENCES `art_request_type` (`art_request_type_id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- art_request_assignment
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `art_request_assignment`;

CREATE TABLE `art_request_assignment`
(
    `art_request_id` INTEGER NOT NULL,
    `artist_id` INTEGER NOT NULL,
    PRIMARY KEY (`art_request_id`,`artist_id`),
    INDEX `artist_id` (`artist_id`),
    CONSTRAINT `art_request_assignment_ibfk_1`
        FOREIGN KEY (`art_request_id`)
        REFERENCES `art_request` (`art_request_id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `art_request_assignment_ibfk_2`
        FOREIGN KEY (`artist_id`)
        REFERENCES `artist` (`artist_id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- art_request_attachment
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `art_request_attachment`;

CREATE TABLE `art_request_attachment`
(
    `art_request_attachment_id` INTEGER NOT NULL AUTO_INCREMENT,
    `art_request_id` INTEGER NOT NULL,
    `file_name` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`art_request_attachment_id`),
    INDEX `art_request_document_art_request_id` (`art_request_id`),
    CONSTRAINT `art_request_attachment_ibfk_1`
        FOREIGN KEY (`art_request_id`)
        REFERENCES `art_request` (`art_request_id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- art_request_comment
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `art_request_comment`;

CREATE TABLE `art_request_comment`
(
    `art_request_comment_id` INTEGER NOT NULL AUTO_INCREMENT,
    `art_request_id` INTEGER NOT NULL,
    `comment_text` LONGBLOB NOT NULL,
    `comment_date` DATETIME NOT NULL,
    `user_id` INTEGER NOT NULL,
    PRIMARY KEY (`art_request_comment_id`),
    INDEX `art_request_comment_user_id` (`user_id`),
    INDEX `art_request_comment_art_request_id` (`art_request_id`),
    CONSTRAINT `art_request_comment_ibfk_1`
        FOREIGN KEY (`user_id`)
        REFERENCES `user` (`user_id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- art_request_type
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `art_request_type`;

CREATE TABLE `art_request_type`
(
    `art_request_type_id` INTEGER NOT NULL AUTO_INCREMENT,
    `art_request_type_name` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`art_request_type_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- art_requestor
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `art_requestor`;

CREATE TABLE `art_requestor`
(
    `art_requestor_id` INTEGER NOT NULL AUTO_INCREMENT,
    `dce_name` VARCHAR(50) NOT NULL,
    `first_name` VARCHAR(50) NOT NULL,
    `last_name` VARCHAR(50) NOT NULL,
    `email_address` VARCHAR(50) NOT NULL,
    `phone_number` VARCHAR(14) NOT NULL,
    PRIMARY KEY (`art_requestor_id`),
    UNIQUE INDEX `dce_name` (`dce_name`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- artist
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `artist`;

CREATE TABLE `artist`
(
    `artist_id` INTEGER NOT NULL AUTO_INCREMENT,
    `artist_dce_name` VARCHAR(10) NOT NULL,
    `artist_first_name` VARCHAR(100) NOT NULL,
    `artist_last_name` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`artist_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- banner_art_request
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `banner_art_request`;

CREATE TABLE `banner_art_request`
(
    `banner_request_id` INTEGER NOT NULL AUTO_INCREMENT,
    `art_request_id` INTEGER NOT NULL,
    `banner_location_id` INTEGER NOT NULL,
    PRIMARY KEY (`banner_request_id`),
    INDEX `banner_request_art_request_id` (`art_request_id`),
    INDEX `banner_request_banner_location_id` (`banner_location_id`),
    CONSTRAINT `banner_art_request_ibfk_1`
        FOREIGN KEY (`art_request_id`)
        REFERENCES `art_request` (`art_request_id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `banner_art_request_ibfk_2`
        FOREIGN KEY (`banner_location_id`)
        REFERENCES `banner_location` (`banner_location_id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- banner_location
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `banner_location`;

CREATE TABLE `banner_location`
(
    `banner_location_id` INTEGER NOT NULL AUTO_INCREMENT,
    `banner_location_name` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`banner_location_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- event
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `event`;

CREATE TABLE `event`
(
    `event_id` INTEGER NOT NULL AUTO_INCREMENT,
    `event_title` VARCHAR(100) NOT NULL,
    `event_description` TEXT NOT NULL,
    `event_location` VARCHAR(100) NOT NULL,
    `event_sponsor_name` VARCHAR(100) NOT NULL,
    `event_start_time` VARCHAR(10) NOT NULL,
    `event_end_time` VARCHAR(10) NOT NULL,
    `event_start_date` DATE NOT NULL,
    `event_end_date` DATE NOT NULL,
    `event_pricing_member` DECIMAL NOT NULL,
    `event_pricing_staff` DECIMAL NOT NULL,
    `event_pricing_student` DECIMAL NOT NULL,
    `event_pricing_public` DECIMAL NOT NULL,
    PRIMARY KEY (`event_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- flyer_art_request
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `flyer_art_request`;

CREATE TABLE `flyer_art_request`
(
    `flyer_art_request_id` INTEGER NOT NULL AUTO_INCREMENT,
    `flyer_size_id` INTEGER NOT NULL,
    `flyer_format_id` INTEGER(10) NOT NULL,
    `art_request_id` INTEGER NOT NULL,
    PRIMARY KEY (`flyer_art_request_id`),
    INDEX `flyer_art_request_art_request_id` (`art_request_id`),
    INDEX `flyer_art_request_flyer_format_id` (`flyer_format_id`),
    INDEX `flyer_art_request_flyer_size_id` (`flyer_size_id`),
    CONSTRAINT `flyer_art_request_ibfk_1`
        FOREIGN KEY (`flyer_size_id`)
        REFERENCES `flyer_size` (`flyer_size_id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `flyer_art_request_ibfk_2`
        FOREIGN KEY (`flyer_format_id`)
        REFERENCES `flyer_format` (`flyer_format_id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `flyer_art_request_ibfk_3`
        FOREIGN KEY (`art_request_id`)
        REFERENCES `art_request` (`art_request_id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- flyer_format
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `flyer_format`;

CREATE TABLE `flyer_format`
(
    `flyer_format_id` INTEGER NOT NULL AUTO_INCREMENT,
    `flyer_format_type` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`flyer_format_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- flyer_size
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `flyer_size`;

CREATE TABLE `flyer_size`
(
    `flyer_size_id` INTEGER NOT NULL AUTO_INCREMENT,
    `flyer_size_type` VARCHAR(10) NOT NULL,
    PRIMARY KEY (`flyer_size_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `user_id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_dce_name` VARCHAR(10) NOT NULL,
    PRIMARY KEY (`user_id`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
