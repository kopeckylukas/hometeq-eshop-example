CREATE TABLE Orders (
orderNo       INT(4) NOT NULL AUTO_INCREMENT,
userId        INT(4) NOT NULL,
orderDateTime DATETIME NOT NULL,
orderTotal    DECIMAL (6,2) NOT NULL,
CONSTRAINT  od_ONO_pk PRIMARY KEY (orderNo),
CONSTRAINT  od_UID_fk FOREIGN KEY (userId) REFERENCES Users(userId)
);

CREATE TABLE Order_Line (
orderLineId     INT (4) NOT NULL AUTO_INCREMENT,
orderNo         INT (4) NOT NULL,
prodId          INT (4) NOT NULL,
quantityOrdered INT (4) NOT NULL,
subTotal        DECIMAL (6,2) NOT NULL,
CONSTRAINT ol_OLI_pk PRIMARY KEY (orderLineId),
CONSTRAINT ol_ONO_fk FOREIGN KEY (orderNo) REFERENCES Orders(orderNo),
CONSTRAINT ol_OID_fk FOREIGN KEY (prodId) REFERENCES Product(prodId)
);
