CREATE TABLE large_area (
  prefecture_name varchar(255),
  name varchar(255),
  prefecture_id int(11),
  CREATE_AT TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UPDATE_AT TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY(prefecture_id) REFERENCES prefecture(prefecture_id) ON DELETE SET NULL ON UPDATE CASCADE,
  FOREIGN KEY(name) REFERENCES prefecture(name) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB CHARSET=utf8;
