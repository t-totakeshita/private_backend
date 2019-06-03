create table products (
  product_id int (11) not null auto_increment comment '在庫識別ID',
  prodcut_name varchar (255) comment '商品名',
  price int (255) comment '金額',
  stock int (11) comment '在庫数',
  CREATE_AT TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UPDATE_AT TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  primary key(product_id)
)engine=innodb charset=utf8;
