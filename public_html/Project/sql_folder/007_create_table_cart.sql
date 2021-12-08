CREATE TABLE IF NOT EXISTS Customer_Cart(
    id int AUTO_INCREMENT PRIMARY KEY,
    item_id int,
    quantity int,
    user_id int,
    unit_price float,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(id),
    FOREIGN KEY (item_id) REFERENCES Products(id),
    check (quantity > 0)

)