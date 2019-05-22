CREATE TABLE prefecture (
  prefecture_id int(11),
  name varchar(255),
  CREATE_AT TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UPDATE_AT TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (prefecture_id),
  INDEX name_index(name)
) ENGINE=InnoDB CHARSET=utf8;
