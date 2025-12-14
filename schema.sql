CREATE TABLE ParentGuardian(
    parent_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30),
    address VARCHAR(30),
    email VARCHAR(30),
    phone_number VARCHAR(30) 
);
CREATE TABLE Teacher(
    teacher_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30),
    age INT,
    address VARCHAR(30),
    phone_number VARCHAR(30),
    email VARCHAR(30),
    salary INT,
    background_check BOOLEAN
);

CREATE TABLE TeachingAssistant(
    teaching_assistant_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30),
    age INT,
    address VARCHAR(30),
    phone_number VARCHAR(30),
    email VARCHAR(30),
    salary INT,
    background_check BOOLEAN
);

CREATE TABLE Class(
    class_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30),
    capacity INT,
    teacher_id INT,
    teaching_assistant_id INT,
    FOREIGN KEY (teacher_id) REFERENCES Teacher(teacher_id),
    FOREIGN KEY (teaching_assistant_id) REFERENCES TeachingAssistant(teaching_assistant_id)
);

CREATE TABLE Pupil(
    pupil_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30),
    age INT,
    address VARCHAR(30),
    medical_info TEXT,
    free_school_meals BOOLEAN,
    class_id INT,
    FOREIGN KEY (class_id) REFERENCES Class(class_id)
);


CREATE TABLE PupilParent(
    pupil_id INT,
    parent_id INT,
    FOREIGN KEY (pupil_id) REFERENCES Pupil(pupil_id),
    FOREIGN KEY (parent_id) REFERENCES ParentGuardian(parent_id)
);

CREATE TABLE LibraryBook(
    library_book_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30),
    release_date DATE,
    return_date DATE,
    pupil_id INT,
    FOREIGN KEY (pupil_id) REFERENCES Pupil(pupil_id)
);

CREATE TABLE Registration(
    registration_id INT AUTO_INCREMENT PRIMARY KEY,
    session ENUM('AM','PM'),
    register_date DATE,
    attendance ENUM('Present','Absent','Late'),
    reason TEXT,
    class_id INT,
    pupil_id INT,
    FOREIGN KEY (class_id) REFERENCES Class(class_id),
    FOREIGN KEY (pupil_id) REFERENCES Pupil(pupil_id)
);