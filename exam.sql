CREATE TABLE Student (
    sid VARCHAR(100) NOT NULL,
    sname VARCHAR(100),
    phno VARCHAR(10),
    PRIMARY KEY (sid)
);
CREATE TABLE Exam (
    eid VARCHAR(100) NOT NULL,
    ename VARCHAR(100),
    fees INT,
    PRIMARY KEY (eid)
);
CREATE TABLE Question (
    qid VARCHAR(100) NOT NULL,
    qcontent VARCHAR(100),
    qsolutions VARCHAR(100),
    difficulty INT,
    qexp INT,
    PRIMARY KEY (qid)
);
CREATE TABLE Dates (
    did VARCHAR(100) NOT NULL,
    Timeslots TIME,
    venue VARCHAR(100),
    PRIMARY KEY (did)
);
CREATE TABLE Register(
	sid VARCHAR(100) NOT NULL,
    eid VARCHAR(100) NOT NULL,
    PRIMARY KEY (sid,eid),
    FOREIGN KEY (sid) REFERENCES Student(sid),
    FOREIGN KEY (eid) REFERENCES Exam(eid)
);
CREATE TABLE Has_questions(
	eid VARCHAR(100) NOT NULL,
    qid VARCHAR(100) NOT NULL,
    PRIMARY KEY (eid,qid),
    FOREIGN KEY (eid) REFERENCES Exam(eid),
    FOREIGN KEY (qid) REFERENCES Question(qid)
);
CREATE TABLE Has_dates(
	eid VARCHAR(100) NOT NULL,
    did VARCHAR(100) NOT NULL,
    PRIMARY KEY (eid,did),
    FOREIGN KEY (eid) REFERENCES Exam(eid),
    FOREIGN KEY (did) REFERENCES Dates(did)
);
CREATE TABLE Choose(
	sid VARCHAR(100) NOT NULL,
    did VARCHAR(100) NOT NULL,
    PRIMARY KEY (sid,did),
    FOREIGN KEY (sid) REFERENCES Student(sid),
    FOREIGN KEY (did) REFERENCES Dates(did)
);
CREATE TABLE USERS(
    name VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL,
    password_data VARCHAR(100) NOT NULL,
    role enum('Student','Admin') NOT NULL,
    PRIMARY KEY (username)
);