DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Ticket;
DROP TABLE IF EXISTS Statuses;
DROP TABLE IF EXISTS Department; 
DROP TABLE IF EXISTS Document;
DROP TABLE IF EXISTS Hashtags_Tickets;
DROP TABLE IF EXISTS Hashtag;
DROP TABLE IF EXISTS Departments_Users;
DROP TABLE IF EXISTS Responses; 
DROP TABLE IF EXISTS FAQs; 

-------------------------------------------
CREATE TABLE Department ( 
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    department_name TEXT NOT NULL
);

INSERT INTO Department (id, department_name) VALUES
    (1, 'Sales'),
    (2, 'Marketing'),
    (3, 'Support'),
    (4, 'Finance'),
    (5, 'Operations'),
    (6, 'Others'); 

---------------------------
CREATE TABLE User (
    user_id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    password TEXT NOT NULL,
    email TEXT NOT NULL,
    username TEXT NOT NULL,
    user_access TEXT NOT NULL,
    department_id INTEGER
);

INSERT INTO User (user_id, name, password, email, username, user_access, department_id) VALUES
    (21,'Bruno Duvane',	'$2y$10$byTmVUvDGREz0VIe1eKptuPv10N4K64WGD59wPP/98AcmWzsEzXJG','brunosduvane@gmail.com','Bruno Duvane','Admin',1);

-------------------------------------------
CREATE TABLE Ticket (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    ticket_status TEXT NOT NULL,
    date_creation DATE NOT NULL,
    user_id INTEGER NOT NULL,
    assigned_department_id INTEGER,
    assigned_agent_id INTEGER,
    body TEXT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES User(user_id),
    FOREIGN KEY (assigned_department_id) REFERENCES Department(id)
);

INSERT INTO Ticket (title, ticket_status, date_creation, user_id, assigned_department_id, assigned_agent_id, body) VALUES
    ('Connection issues', 'Untouched', date('now'), 1, 1, 2,'123 teste teste'),
    ('Email not working', 'Open', date('now'), 2, 2, 2,'123 teste teste'),
    ('Slow website', 'Assigned', date('now'), 1, 3, 2,'123 teste teste'),
    ('Can''t login', 'Closed', date('now'), 4, 4, 2,'123 teste teste'),
    ('Error message on checkout', 'Open', date('now'), 5, 5, 11,'123 teste teste'),
    ('Incorrect billing', 'Closed', date('now'), 6, 1, 11,'123 teste teste'),
    ('Broken link on homepage', 'Open', date('now'), 7, 2, 11,'123 teste teste'),
    ('Wrong order received', 'Untouched', date('now'), 1, 3, 11,'123 teste teste'),
    ('Product out of stock', 'Closed', date('now'), 9, 4, 11,'123 teste teste'),
    ('Missing package', 'Open', date('now'), 10, 5, 11,'123 teste teste');

-------------------------------------------

CREATE TABLE FAQs (
    ID INTEGER PRIMARY KEY AUTOINCREMENT,
    question VARCHAR(255),
    response TEXT,
    area VARCHAR(50)
);

INSERT INTO FAQs (ID, question, response, area) VALUES
    (1, 'What is the pricing for your products?', 'The pricing for our products varies depending on the specific product and any applicable discounts or promotions. Please contact our sales department for detailed pricing information.', 'Sales'),
    (2, 'How can I increase brand visibility?', 'To increase brand visibility, you can utilize various marketing strategies such as social media marketing, content marketing, influencer collaborations, and targeted advertising campaigns.', 'Marketing'),
    (3, 'How do I reset my password?', 'To reset your password, please visit our website and click on the "Forgot Password" link. Follow the instructions provided to reset your password.', 'Support'),
    (4, 'Can you provide financial statements for the previous year?', 'Yes, we can provide financial statements for the previous year. Please reach out to our finance department and provide the necessary details for further assistance.', 'Finance'),
    (5, 'What is the process for onboarding new employees?', 'The onboarding process for new employees includes orientation, completing necessary paperwork, training sessions, and introduction to company policies and culture. The HR department will guide you through the entire onboarding process.', 'Operations'),
    (6, 'How can I update my contact information?', 'To update your contact information, please log in to your account on our website and navigate to the account settings or profile section. There, you can edit and save your updated contact details.', 'Support'),
    (7, 'Do you offer a discount for bulk orders?', 'Yes, we offer discounts for bulk orders. Please get in touch with our sales department and provide details about your order quantity and requirements to discuss the available discounts.', 'Sales'),
    (8, 'What is the company''s refund policy?', 'Our company has a refund policy that allows customers to request refunds for eligible products within a specified timeframe. Please refer to our website or contact our support team for detailed information on our refund policy.', 'Support'),
    (9, 'Can I request a budget reallocation?', 'Budget reallocation requests are handled by the finance department. Please contact our finance team and provide the necessary details and justifications for your budget reallocation request.', 'Finance'),
    (10, 'How can I track my order?', 'Once your order is shipped, you will receive a tracking number via email. You can use this tracking number on our website or the courier''s website to track the status and location of your order.', 'Operations');


CREATE TABLE Hashtag (
    hashtag_id INTEGER PRIMARY KEY AUTOINCREMENT,
    name      TEXT
);

Insert INTO Hashtag(name) VALUES('serious');
Insert INTO Hashtag(name) VALUES('funny');

-- CREATE TABLE Statuses (
--     id INTEGER PRIMARY KEY AUTOINCREMENT,
--     stage TEXT NOT NULL
-- );

-- INSERT INTO Statuses (id, stage) VALUES
--     (1, 'untouched'),
--     (2, 'working on'),
--     (3, 'done'),
--     (4, 'working on'),
--     (5, 'untouched'),
--     (6, 'done'),
--     (7, 'working on'),
--     (8, 'untouched'),
--     (9, 'done'),
--     (10, 'working on');

-------------------------------------------
CREATE TABLE Document (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    file_name TEXT NOT NULL,
    file_type TEXT NOT NULL,
    file_data BLOB NOT NULL,
    ticket_id INTEGER NOT NULL,
    FOREIGN KEY (ticket_id) REFERENCES Ticket(id)
);

CREATE TABLE Responses (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    sender_id INTEGER,
    recipient_id INTEGER,
    sender_content TEXT NOT NULL,
    date_sent TEXT NOT NULL,
    answer TEXT NOT NULL
);

-------------------------------------------
-- CREATE TABLE Departments_Users (
--     user_id    INTEGER REFERENCES User (user_id) ON DELETE CASCADE,
--     id INTEGER REFERENCES Department (id) ON DELETE CASCADE,
--     PRIMARY KEY (
--         user_id,
--         id
--     )
-- );

-- Insert INTO Departments_Users(user_id, id) VALUES(1,1);
-- Insert INTO Departments_Users(user_id, id) VALUES(2,2);
-- Insert INTO Departments_Users(user_id, id) VALUES(3,3);

-------------------------------------------
CREATE TABLE Hashtags_Tickets (
    hashtag_id INTEGER REFERENCES Hashtag (hashtag_id) ON DELETE CASCADE,
    ticket_id  INTEGER REFERENCES Ticket (ticket_id) ON DELETE CASCADE,
    PRIMARY KEY (
        hashtag_id,
        ticket_id
    )
);

Insert INTO Hashtags_Tickets(hashtag_id, ticket_id) VALUES(1,2);
Insert INTO Hashtags_Tickets(hashtag_id, ticket_id) VALUES(2,1);