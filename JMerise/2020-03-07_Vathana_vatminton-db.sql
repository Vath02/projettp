#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: c19v12_roles
#------------------------------------------------------------

CREATE TABLE c19v12_roles(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (150) NOT NULL
	,CONSTRAINT c19v12_roles_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: c19v12_suppliers
#------------------------------------------------------------

CREATE TABLE c19v12_suppliers(
        id              Int  Auto_increment  NOT NULL ,
        siret           Int NOT NULL ,
        society         Varchar (150) NOT NULL ,
        website         Varchar (150) ,
        mail            Varchar (150) NOT NULL ,
        password        Varchar (150) NOT NULL ,
        id_c19v12_roles Int NOT NULL
	,CONSTRAINT c19v12_suppliers_PK PRIMARY KEY (id)

	,CONSTRAINT c19v12_suppliers_c19v12_roles_FK FOREIGN KEY (id_c19v12_roles) REFERENCES c19v12_roles(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: c19v12_categories
#------------------------------------------------------------

CREATE TABLE c19v12_categories(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (150) NOT NULL
	,CONSTRAINT c19v12_categories_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: c19v12_products
#------------------------------------------------------------

CREATE TABLE c19v12_products(
        id                   Int  Auto_increment  NOT NULL ,
        name                 Varchar (150) NOT NULL ,
        reference            Varchar (150) NOT NULL ,
        price                Decimal (10,2) NOT NULL ,
        picture              Varchar (150) ,
        id_c19v12_categories Int NOT NULL
	,CONSTRAINT c19v12_products_PK PRIMARY KEY (id)

	,CONSTRAINT c19v12_products_c19v12_categories_FK FOREIGN KEY (id_c19v12_categories) REFERENCES c19v12_categories(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: c19v12_users
#------------------------------------------------------------

CREATE TABLE c19v12_users(
        id              Int  Auto_increment  NOT NULL ,
        lastname        Varchar (250) NOT NULL ,
        firstname       Varchar (250) NOT NULL ,
        birthdate       Date NOT NULL ,
        address         Varchar (255) NOT NULL ,
        phone           Varchar (20) NOT NULL ,
        mail            Varchar (250) NOT NULL ,
        password        Varchar (250) NOT NULL ,
        id_c19v12_roles Int NOT NULL
	,CONSTRAINT c19v12_users_PK PRIMARY KEY (id)

	,CONSTRAINT c19v12_users_c19v12_roles_FK FOREIGN KEY (id_c19v12_roles) REFERENCES c19v12_roles(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: c19v12_orders
#------------------------------------------------------------

CREATE TABLE c19v12_orders(
        id              Int  Auto_increment  NOT NULL ,
        number          Int NOT NULL ,
        status          Varchar (150) NOT NULL ,
        orderDate       Date NOT NULL ,
        deliveryDate    Date NOT NULL ,
        id_c19v12_users Int NOT NULL
	,CONSTRAINT c19v12_orders_PK PRIMARY KEY (id)

	,CONSTRAINT c19v12_orders_c19v12_users_FK FOREIGN KEY (id_c19v12_users) REFERENCES c19v12_users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: suppliersProducts
#------------------------------------------------------------

CREATE TABLE suppliersProducts(
        id                  Int  Auto_increment  NOT NULL ,
        id_c19v12_suppliers Int NOT NULL ,
        id_c19v12_products  Int NOT NULL
	,CONSTRAINT suppliersProducts_PK PRIMARY KEY (id)

	,CONSTRAINT suppliersProducts_c19v12_suppliers_FK FOREIGN KEY (id_c19v12_suppliers) REFERENCES c19v12_suppliers(id)
	,CONSTRAINT suppliersProducts_c19v12_products0_FK FOREIGN KEY (id_c19v12_products) REFERENCES c19v12_products(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: c19v12_order_items
#------------------------------------------------------------

CREATE TABLE c19v12_order_items(
        id                 Int  Auto_increment  NOT NULL ,
        quantity           Int NOT NULL ,
        id_c19v12_products Int NOT NULL ,
        id_c19v12_orders   Int NOT NULL
	,CONSTRAINT c19v12_order_items_PK PRIMARY KEY (id)

	,CONSTRAINT c19v12_order_items_c19v12_products_FK FOREIGN KEY (id_c19v12_products) REFERENCES c19v12_products(id)
	,CONSTRAINT c19v12_order_items_c19v12_orders0_FK FOREIGN KEY (id_c19v12_orders) REFERENCES c19v12_orders(id)
)ENGINE=InnoDB;

