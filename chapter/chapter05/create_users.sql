create table users (
  user_id int (11) not null auto_increment comment 'ユーザ識別ID',
  user_name varchar (255) comment 'ユーザ名',
  password varchar (255) comment 'パスワード',
  user_grand int (11) comment 'ユーザ権限',
  CREATE_AT TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UPDATE_AT TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  primary key (user_id)
)engine=innodb charset=utf8;
