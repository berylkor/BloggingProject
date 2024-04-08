
DROP DATABASE IF EXISTS blog_mgt;
CREATE DATABASE blog_mgt;
USE blog_mgt;

-- Table Structure for 'Role'
CREATE TABLE Role(
    RoleID int(11) NOT NULL AUTO_INCREMENT,
    RName varchar(100),
    PRIMARY KEY (RoleID)
);

-- Table Structure for 'Tag'
CREATE TABLE Tag(
    TagID int(11) NOT NULL AUTO_INCREMENT,
    TagName varchar(50),
    PRIMARY KEY (TagID)
);

-- Table Structure for 'User'
CREATE TABLE Users(
    UserID int(11) NOT NULL AUTO_INCREMENT,
    fName varchar(100) NOT NULL,
    lName varchar(100) NOT NULL,
    Email varchar(100) NOT NULL,
    hashPassword varchar(255) NOT NULL,
    RID int(11) DEFAULT 1,
    goalLikes int(11) DEFAULT 0,
    goalComment int(11) DEFAULT 0,
    PRIMARY KEY (UserID),
    FOREIGN KEY (RID) REFERENCES Role (RoleID) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Table Structure for 'Post'
CREATE TABLE Post(
    PostID int(11) NOT NULL AUTO_INCREMENT,
    postTitle varchar(100) NOT NULL,
    postContent varchar(2500),
    datePosted date NOT NULL DEFAULT CURRENT_TIMESTAMP,
    UnID int(11) NOT NULL,
    TID int(11) NOT NULL,
    countLike int(11) DEFAULT 0,
    countComment int(11) DEFAULT 0,
    PRIMARY KEY (PostID),
    FOREIGN KEY (UnID) REFERENCES Users (UserID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (TID) REFERENCES Tag (TagID) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Table Structure for 'Views'
CREATE TABLE Views(
    ViewsID int(11) NOT NULL AUTO_INCREMENT,
    whoViewed int(11) NOT NULL,
    dateViewed date NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PID int(11) NOT NULL,
    PRIMARY KEY (ViewsID),
    FOREIGN KEY (PID) REFERENCES Post (PostID) ON DELETE CASCADE ON UPDATE CASCADE

);

-- Table Structure for 'Likes'
CREATE TABLE Likes(
    LikesID int(11) NOT NULL AUTO_INCREMENT,
    whoLiked int(11) NOT NULL,
    dateLiked date NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PID int(11) NOT NULL,
    PRIMARY KEY (LikesID),
    FOREIGN KEY (PID) REFERENCES Post (PostID) ON DELETE CASCADE ON UPDATE CASCADE

);

-- Table Structure for 'Comment'
CREATE TABLE Comment(
    CommentID int(11) NOT NULL AUTO_INCREMENT,
    whoCommented int(11) NOT NULL,
    dateCommented date NOT NULL DEFAULT CURRENT_TIMESTAMP,
    postContent varchar(1000),
    PID int(11) NOT NULL,
    PRIMARY KEY (CommentID),
    FOREIGN KEY (PID) REFERENCES Post (PostID) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Insert data for 'Role'
INSERT INTO Role (RName) VALUES
('standard'),
('creator');

-- Insert data for 'Tag'
INSERT INTO Tag (TagName) VALUES
('Health'),
('Food'),
('Travel'),
('Media');
