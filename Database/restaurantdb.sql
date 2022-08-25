/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     4/19/2022 2:29:28 PM                         */
/*==============================================================*/

/*==============================================================*/
/* Table: TABLE                                                 */
/*==============================================================*/
create table TABLES
(
   TABLES_ID            int,
   IS_FREE              bool not null,
   NB_CHAIRS            int,
   primary key (TABLES_ID)
);

/*==============================================================*/
/* Table: ABOUT                                                 */
/*==============================================================*/
create table ABOUT
(
   DESCRIPTION          varchar(4000) not null,
   PHONE_NUMBER         varchar(80),
   ADRESSES             varchar(80) not null,
   OPENTIME             time not null,
   CLOSETIME            time not null,
   primary key (PHONE_NUMBER)
);

/*==============================================================*/
/* Table: ADMIN                                                 */
/*==============================================================*/
create table ADMIN
(
   ADMIN_USERNAME       varchar(80),
   PASSWORD             varchar(30) not null,
   NAME                 varchar(50),
   PHONE_NB             varchar(80),
   IS_SUPER             bool not null,
   primary key (ADMIN_USERNAME)
);

/*==============================================================*/
/* Table: CUSTOMER                                              */
/*==============================================================*/
create table CUSTOMER
(
   PHONE_NB             varchar(80),
   FIRST_NAME           varchar(80) not null,
   LAST_NAME            varchar(80),
   ADDRESS              varchar(80) not null,
   NB_OF_ORDER          int DEFAULT 0,
   primary key (PHONE_NB)
);

/*==============================================================*/
/* Table: FEEDBACK_VISIT                                        */
/*==============================================================*/
create table FEEDBACK_VISIT
(
   PHONE_NB             varchar(80),
   RATE                 int not null,
   COMMENT              varchar(512),
   FEEDBACKDATE         datetime,
   primary key (PHONE_NB,FEEDBACKDATE),
   constraint FK_CUSTOMER_FEEDBACK_VISIT foreign key (PHONE_NB)
   references CUSTOMER (PHONE_NB)
);

/*==============================================================*/
/* Table: ITEM                                                  */
/*==============================================================*/
create table ITEM
(
   ITEM_ID              int AUTO_INCREMENT,
   NAME                 varchar(50),
   ITEM_DESCRIPTION     varchar(255),
   ITEM_PRICE           bigint,
   RATING_AVG           float DEFAULT '3',
   DATE                 datetime,
   primary key (ITEM_ID)
);

INSERT INTO item (`ITEM_ID`) VALUES ('1');

/*==============================================================*/
/* Table: IMAGE                                                 */
/*==============================================================*/
create table IMAGE
(
   IMAGE_ID             int AUTO_INCREMENT,
   ITEM_ID				   int,
   PATH                 varchar(30) not null,
   primary key (IMAGE_ID),
   constraint FK_ITEM_IMAGE foreign key (ITEM_ID)
   references ITEM (ITEM_ID)
);

/*==============================================================*/
/* Table: MENU                                                  */
/*==============================================================*/
create table MENU
(
   MENU_ID              int AUTO_INCREMENT,
   TITLE                varchar(35) not null,
   primary key (MENU_ID)
);

/*==============================================================*/
/* Table: OFFER                                                 */
/*==============================================================*/
create table OFFER
(
   OFFER_ID     		   int AUTO_INCREMENT,
   OFFER_NAME   		   varchar(50) not null,
   IMAGE_Path           varchar(255) not null,
   OFFER_DESCRIPTION    varchar(255),
   PRICE                bigint not null, 
   primary key (OFFER_ID)
);

/*==============================================================*/
/* Table: EVENT                                                 */
/*==============================================================*/
create table EVENT
(
   EVENT_ID             int AUTO_INCREMENT,
   IMAGE_Path           varchar(255) not null,
   NAME                 varchar(50),
   DESCRIPTION          varchar(255),
   Date                 datetime,
   primary key (EVENT_ID)
);

/*==============================================================*/
/* Table: FEEDBACKITEMS                                         */
/*==============================================================*/
create table FEEDBACKITEMS
(
   PHONE_NB          	varchar(80) ,
   ITEM_ID              int not null,
   ITEMRATE             int,
   COMMENT              varchar(512),
   primary key (PHONE_NB, ITEM_ID,COMMENT),
   constraint FK_FEEDBACKITEMS foreign key (PHONE_NB)
      references CUSTOMER (PHONE_NB),
   constraint FK_FEEDBACKITEMS2 foreign key (ITEM_ID)
      references ITEM (ITEM_ID)
);

/*==============================================================*/
/* Table: ITEM_OFFER                                            */
/*==============================================================*/
create table ITEM_OFFER
(
   OFFER_ID             int,
   ITEM_ID              int,
   primary key (OFFER_ID, ITEM_ID),
   constraint FK_ITEM_OFFER foreign key (OFFER_ID)
      references OFFER (OFFER_ID),
   constraint FK_ITEM_OFFER2 foreign key (ITEM_ID)
      references ITEM (ITEM_ID)
);

/*==============================================================*/
/* Table: MENU_ITEM                                             */
/*==============================================================*/
create table MENU_ITEM
(
   MENU_ID              int,
   ITEM_ID              int,
   primary key (MENU_ID, ITEM_ID),
   constraint FK_MENU_ITEM foreign key (MENU_ID)
      references MENU (MENU_ID),
   constraint FK_MENU_ITEM2 foreign key (ITEM_ID)
      references ITEM (ITEM_ID)
);

/*==============================================================*/
/* Table: "ORDER"                                               */
/*==============================================================*/
create table ORDERS
(
   ORDER_ID             int AUTO_INCREMENT,
   PHONE_NB             varchar(80),
   ITEM_ID              int,
   OFFER_ID             int,
   PRICE          		bigint,
   DATE                 datetime,
   quantity             int not null,
   ADDRESS              varchar(80),
   IS_PROCEED           boolean,
   primary key (ORDER_ID),
   constraint FK_ORDERS foreign key (PHONE_NB)
      references CUSTOMER (PHONE_NB),
   constraint FK_ORDERS2 foreign key (ITEM_ID)
      references ITEM (ITEM_ID),
   constraint FK_ORDERS3 foreign key (OFFER_ID)
      references OFFER (OFFER_ID)
);

/*==============================================================*/
/* Table: RESERVATION                                           */
/*==============================================================*/
create table RESERVATION
(
   PHONE                varchar(80),
   NAME          		varchar(160),
   TABLES_ID            int,
   NBOFGUESTS           int,
   RESERVATIONDATE      datetime,
   primary key (PHONE, TABLES_ID),
   constraint FK_RESERVATION2 foreign key (TABLES_ID)
      references TABLES (TABLES_ID)
);

INSERT INTO ABOUT (`DESCRIPTION`,`PHONE_NUMBER`,`ADRESSES`,`OPENTIME`,`CLOSETIME`) VALUES ('All of our menu items are inspired by _____ cuisine and have been created by our head chef, (CN), after studying authentic _____ cuisine in ____. Not only do we have fresh flown-in seafood from the northeast, but we also have a variety of handcrafted cocktails, wine, and beer to choose from.','07333332','Nabatiey','16:30:00','18:30:00');

INSERT INTO OFFER (`OFFER_ID`, `OFFER_NAME`, `IMAGE_Path`, `PRICE`) VALUES ('1', ' ', ' ', '0');

INSERT INTO ADMIN (`ADMIN_USERNAME`,`PASSWORD`,`NAME`,`PHONE_NB`,`IS_SUPER`) VALUES ('admin','admin','admin','03455312',1);
INSERT INTO ADMIN (`ADMIN_USERNAME`,`PASSWORD`,`NAME`,`PHONE_NB`,`IS_SUPER`) VALUES ('mhamad_ayoub','Ayoub123?','Mhamad Ayoub','76689620',1);
INSERT INTO ADMIN (`ADMIN_USERNAME`,`PASSWORD`,`NAME`,`PHONE_NB`,`IS_SUPER`) VALUES ('alaa_ballout','Alaa123?','Alaa Ballout','07878333',1);
INSERT INTO ADMIN (`ADMIN_USERNAME`,`PASSWORD`,`NAME`,`PHONE_NB`,`IS_SUPER`) VALUES ('bayan_cherry','Bayan123?','Bayan Cherry','81848135',1);

INSERT INTO CUSTOMER (`PHONE_NB`,`FIRST_NAME`,`LAST_NAME`,`ADDRESS`,`NB_OF_ORDER`) VALUES ('76689620','Mohammad','Ayoub','Beirut',10);
INSERT INTO CUSTOMER (`PHONE_NB`,`FIRST_NAME`,`LAST_NAME`,`ADDRESS`,`NB_OF_ORDER`) VALUES ('81734332','Bayan ','Cherry','Beirut',3);
INSERT INTO CUSTOMER (`PHONE_NB`,`FIRST_NAME`,`LAST_NAME`,`ADDRESS`,`NB_OF_ORDER`) VALUES ('70868911','Alaa','Ballout','Sour',2);

INSERT INTO EVENT (`EVENT_ID`,`IMAGE_Path`,`NAME`,`DESCRIPTION`,`Date`) VALUES (1,'e1.jpg','Eid Al fotor','An event description is a text or copy that tells audiences all the essential details about your event. These details should come together so that it compels potential attendees to register. ','2022-05-09 12:14:00');
INSERT INTO EVENT (`EVENT_ID`,`IMAGE_Path`,`NAME`,`DESCRIPTION`,`Date`) VALUES (2,'e2.jpg','Tech Talks','An event description is a text or copy that tells audiences all the essential details about your event. These details should come together so that it compels potential attendees to register. ','2022-05-09 12:14:00');

INSERT INTO FEEDBACK_VISIT (`PHONE_NB`,`RATE`,`COMMENT`,`FEEDBACKDATE`) VALUES ('76689620',5,'Yummy... This Pizza is amazing !..','2022-05-09 11:01:33');
INSERT INTO FEEDBACK_VISIT (`PHONE_NB`,`RATE`,`COMMENT`,`FEEDBACKDATE`) VALUES ('81734332',3,'Crunchy ma 3ajabtne ktiiir','2022-05-09 11:02:30');
INSERT INTO FEEDBACK_VISIT (`PHONE_NB`,`RATE`,`COMMENT`,`FEEDBACKDATE`) VALUES ('70868911',4,'l akel ktiiir tayebb ','2022-05-09 11:03:47');

INSERT INTO ITEM (`ITEM_ID`,`NAME`,`ITEM_DESCRIPTION`,`ITEM_PRICE`,`RATING_AVG`,`DATE`) VALUES (3,'WHOPPER','Sandwich is a savory flame-grilled beef patty topped with juicy tomatoes, fresh lettuce, creamy mayonnaise, ketchup, crunchy pickles and sliced white onions on a soft sesame seed bun.',85000,5,'2022-05-09 11:19:49');
INSERT INTO ITEM (`ITEM_ID`,`NAME`,`ITEM_DESCRIPTION`,`ITEM_PRICE`,`RATING_AVG`,`DATE`) VALUES (4,'H-Loumi Whopper Jr.','Flame Grilled 100% Beef Patty, H-Loumi Patty, CRispy Lettuce, Fresh Onions, Fresh Tomatoes, Pickles, Mayo, Ketchup',110000,3,'2022-05-09 11:20:43');
INSERT INTO ITEM (`ITEM_ID`,`NAME`,`ITEM_DESCRIPTION`,`ITEM_PRICE`,`RATING_AVG`,`DATE`) VALUES (5,'H-Loumi Whopper','Flame Grilled 100% Beef Patty, H-Loumi Patty, CRispy Lettuce, Fresh Onion, Fresh Tomatoes, Pickles, Mayo, Ketchup',120000,3,'2022-05-09 11:21:54');
INSERT INTO ITEM (`ITEM_ID`,`NAME`,`ITEM_DESCRIPTION`,`ITEM_PRICE`,`RATING_AVG`,`DATE`) VALUES (6,'Steakhouse','Flame Grilled 100% Beef Patty, Mayo, Crispy Lettuce, Fresh Tomatoes, 2 Cheese Slices, 4 Slices Beef Bacon, Crispy Onion, Bbq Sauce',117000,3,'2022-05-09 11:23:04');
INSERT INTO ITEM (`ITEM_ID`,`NAME`,`ITEM_DESCRIPTION`,`ITEM_PRICE`,`RATING_AVG`,`DATE`) VALUES (7,'Big King XXL','Flame Grilled 100% Beef Patty, Crispy Lettuce, Fresh Onion, Pickles, 4 Cheese Slices, Big King Sauce',135000,3,'2022-05-09 11:24:13');
INSERT INTO ITEM (`ITEM_ID`,`NAME`,`ITEM_DESCRIPTION`,`ITEM_PRICE`,`RATING_AVG`,`DATE`) VALUES (8,'H-Loumi King','H-Loumi Patty, Fresh Onions, Fresh Tomatoes, Crispy Lettuce & Mayonnaise ',100000,3,'2022-05-09 11:42:54');
INSERT INTO ITEM (`ITEM_ID`,`NAME`,`ITEM_DESCRIPTION`,`ITEM_PRICE`,`RATING_AVG`,`DATE`) VALUES (10,'Big Fish Deluxe','Breaded Fish Patty, Crispy Lettuce, Fresh Onions, Pickles, Big King Sauce & 1 Cheese Slice.',100000,3,'2022-05-09 11:45:35');
INSERT INTO ITEM (`ITEM_ID`,`NAME`,`ITEM_DESCRIPTION`,`ITEM_PRICE`,`RATING_AVG`,`DATE`) VALUES (11,'Big Fish','Breaded Fish Patty, Tartar Sauce & Crispy Lettuce ',90000,3,'2022-05-09 11:46:40');
INSERT INTO ITEM (`ITEM_ID`,`NAME`,`ITEM_DESCRIPTION`,`ITEM_PRICE`,`RATING_AVG`,`DATE`) VALUES (12,'Crunchy Chicken Fillet','Crunchy Chicken Breast Fillet, CRispy Lettuce, Mayo, Fresh Tomatoes, Potato Bun',90000,3,'2022-05-09 11:47:56');
INSERT INTO ITEM (`ITEM_ID`,`NAME`,`ITEM_DESCRIPTION`,`ITEM_PRICE`,`RATING_AVG`,`DATE`) VALUES (13,'Chicken Steakhouse','Flame Grilled Chicken Breast, Crispy Lettuce, Fresh Tomatoes, Mayo, Bbq Sauce, 2 Cheese Slice, 4 Slices Of Beef Bacon, Crispy Onion',119000,3,'2022-05-09 11:49:15');
INSERT INTO ITEM (`ITEM_ID`,`NAME`,`ITEM_DESCRIPTION`,`ITEM_PRICE`,`RATING_AVG`,`DATE`) VALUES (14,'King Garden Salad','Crispy Lettuce, Corn, Cherry Tomatoes, Cucumber',50000,3,'2022-05-09 11:53:12');
INSERT INTO ITEM (`ITEM_ID`,`NAME`,`ITEM_DESCRIPTION`,`ITEM_PRICE`,`RATING_AVG`,`DATE`) VALUES (15,'King Chicken Salad','Flame Grilled Chicken Breast, Crispy Lettuce, Corn, Cherry Tomatoes, Cucumber',75000,3,'2022-05-09 11:54:34');

INSERT INTO IMAGE (`IMAGE_ID`,`ITEM_ID`,`PATH`) VALUES (2,3,'inside_whopper.png');
INSERT INTO IMAGE (`IMAGE_ID`,`ITEM_ID`,`PATH`) VALUES (3,4,'HALLOUMI-WHOPPERJr.jpg');
INSERT INTO IMAGE (`IMAGE_ID`,`ITEM_ID`,`PATH`) VALUES (4,5,'HALLOUMI-WHOPPER.jpg');
INSERT INTO IMAGE (`IMAGE_ID`,`ITEM_ID`,`PATH`) VALUES (5,6,'924_STEAKHOUSE.jpg');
INSERT INTO IMAGE (`IMAGE_ID`,`ITEM_ID`,`PATH`) VALUES (6,7,'279_BIG-KING-XXL.jpg');
INSERT INTO IMAGE (`IMAGE_ID`,`ITEM_ID`,`PATH`) VALUES (7,8,'HALLOUMI-KING.jpg');
INSERT INTO IMAGE (`IMAGE_ID`,`ITEM_ID`,`PATH`) VALUES (9,10,'APP-BIG-FISH-DELUX.jpg');
INSERT INTO IMAGE (`IMAGE_ID`,`ITEM_ID`,`PATH`) VALUES (10,11,'321_BIG-FISH.jpg');
INSERT INTO IMAGE (`IMAGE_ID`,`ITEM_ID`,`PATH`) VALUES (11,12,'CRUNCHY-CHICKEN.jpg');
INSERT INTO IMAGE (`IMAGE_ID`,`ITEM_ID`,`PATH`) VALUES (12,13,'924_STEAKHOUSE.jpg');
INSERT INTO IMAGE (`IMAGE_ID`,`ITEM_ID`,`PATH`) VALUES (13,14,'420_KING-GARDEN-SALAD.jpg');
INSERT INTO IMAGE (`IMAGE_ID`,`ITEM_ID`,`PATH`) VALUES (14,15,'561_KING-CHICKEN-SALAD.jpg');

INSERT INTO FEEDBACKITEMS (`PHONE_NB`,`ITEM_ID`,`ITEMRATE`,`COMMENT`) VALUES ('81734332',3,5,'Ktiiir taybiiiin');

INSERT INTO MENU (`MENU_ID`,`TITLE`) VALUES (3,'Flame-Grilled');
INSERT INTO MENU (`MENU_ID`,`TITLE`) VALUES (4,'Chicken-Sandwiches');
INSERT INTO MENU (`MENU_ID`,`TITLE`) VALUES (5,'Salads');

INSERT INTO MENU_ITEM (`MENU_ID`,`ITEM_ID`) VALUES (3,3);
INSERT INTO MENU_ITEM (`MENU_ID`,`ITEM_ID`) VALUES (3,4);
INSERT INTO MENU_ITEM (`MENU_ID`,`ITEM_ID`) VALUES (3,5);
INSERT INTO MENU_ITEM (`MENU_ID`,`ITEM_ID`) VALUES (3,6);
INSERT INTO MENU_ITEM (`MENU_ID`,`ITEM_ID`) VALUES (3,7);
INSERT INTO MENU_ITEM (`MENU_ID`,`ITEM_ID`) VALUES (4,8);
INSERT INTO MENU_ITEM (`MENU_ID`,`ITEM_ID`) VALUES (4,10);
INSERT INTO MENU_ITEM (`MENU_ID`,`ITEM_ID`) VALUES (4,11);
INSERT INTO MENU_ITEM (`MENU_ID`,`ITEM_ID`) VALUES (4,12);
INSERT INTO MENU_ITEM (`MENU_ID`,`ITEM_ID`) VALUES (4,13);
INSERT INTO MENU_ITEM (`MENU_ID`,`ITEM_ID`) VALUES (5,14);
INSERT INTO MENU_ITEM (`MENU_ID`,`ITEM_ID`) VALUES (5,15);

INSERT INTO TABLES (`TABLES_ID`,`IS_FREE`,`NB_CHAIRS`) VALUES (1,1,6);
INSERT INTO TABLES (`TABLES_ID`,`IS_FREE`,`NB_CHAIRS`) VALUES (2,0,8);
INSERT INTO TABLES (`TABLES_ID`,`IS_FREE`,`NB_CHAIRS`) VALUES (3,1,4);
INSERT INTO TABLES (`TABLES_ID`,`IS_FREE`,`NB_CHAIRS`) VALUES (4,1,5);
INSERT INTO TABLES (`TABLES_ID`,`IS_FREE`,`NB_CHAIRS`) VALUES (5,0,3);
INSERT INTO TABLES (`TABLES_ID`,`IS_FREE`,`NB_CHAIRS`) VALUES (6,1,7);
INSERT INTO TABLES (`TABLES_ID`,`IS_FREE`,`NB_CHAIRS`) VALUES (9,1,2);
INSERT INTO TABLES (`TABLES_ID`,`IS_FREE`,`NB_CHAIRS`) VALUES (10,0,5);

INSERT INTO RESERVATION (`PHONE`,`NAME`,`TABLES_ID`,`NBOFGUESTS`,`RESERVATIONDATE`) VALUES ('76689620','Mhamad Ayoub',1,5,'2022-06-28 15:31:00');

INSERT INTO OFFER (OFFER_NAME,PRICE,OFFER_DESCRIPTION,IMAGE_Path) VALUES('Ramadan Meal',500000,'Burger, zinger, potato, 6 pieces of nuggets and 2 pepsi can.','902_Delivery-Combo-mix.jpg');
INSERT INTO ITEM_OFFER (`OFFER_ID`, `ITEM_ID`) VALUES ('2', '3');
INSERT INTO ITEM_OFFER (`OFFER_ID`, `ITEM_ID`) VALUES ('2', '11');
INSERT INTO ITEM_OFFER (`OFFER_ID`, `ITEM_ID`) VALUES ('2', '15');

INSERT INTO OFFER (OFFER_NAME,PRICE,OFFER_DESCRIPTION,IMAGE_Path) VALUES('WeekEnd Offer',350000,'Double Deal Chicken.','Double-Deal-Chicken.jpg');
INSERT INTO ITEM_OFFER (`OFFER_ID`, `ITEM_ID`) VALUES ('3', '3');
INSERT INTO ITEM_OFFER (`OFFER_ID`, `ITEM_ID`) VALUES ('3', '5');
INSERT INTO ITEM_OFFER (`OFFER_ID`, `ITEM_ID`) VALUES ('3', '7');