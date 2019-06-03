create table orders (
  order_id int(11) comment '発注識別ID',
  product_id int (11)  comment '在庫識別ID',
  status int (11) comment '在庫ステータス',
  CREATE_AT TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UPDATE_AT TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  foreign key(product_id) references products(product_id) on delete set null on update cascade,
  primary key(order_id)
)engine=innodb charset=utf8;
