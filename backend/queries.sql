-- TABLE Facility
CREATE TABLE Facility(
    facility_id  INT IDENTITY(1,1) PRIMARY KEY,
    facility_name VARCHAR(255) NOT NULL,
    facility_status VARCHAR(20)
);

-- TABLE Building
CREATE TABLE Building (
    building_no  INT IDENTITY(1,1) PRIMARY KEY,
    building_name VARCHAR(255) NOT NULL,
    no_of_floors INT
);

-- TABLE Halls
CREATE TABLE Halls (
    hall_id  INT IDENTITY(1,1) PRIMARY KEY,
    hall_name VARCHAR(255) NOT NULL,
    hall_type VARCHAR(50),
    floor_level INT,
    building_no INT,
    FOREIGN KEY (building_no) REFERENCES Building(building_no)
);

-- Provide Table (to represent the many-to-many relationship between Facility and Halls):
CREATE TABLE Provide (
    facility_id INT,
    hall_id INT,
    no_of_facilities INT,
    FOREIGN KEY (facility_id) REFERENCES Facility(facility_id),
    FOREIGN KEY (hall_id) REFERENCES Halls(hall_id),
    PRIMARY KEY (facility_id, hall_id)
);

-- TABLE Course
CREATE TABLE Course (
    course_id  INT IDENTITY(1,1) PRIMARY KEY,
    course_name VARCHAR(255) NOT NULL,
    course_code VARCHAR(50) UNIQUE
);

-- TABLE Programs
CREATE TABLE Programs (
    program_id  INT IDENTITY(1,1) PRIMARY KEY,
    program_name VARCHAR(255) NOT NULL,
    program_code VARCHAR(50) UNIQUE
);

-- Create the junction table
CREATE TABLE Course_Programs (
    course_id INT,
    program_id INT,
    PRIMARY KEY (course_id, program_id),
    FOREIGN KEY (course_id) REFERENCES Course(course_id),
    FOREIGN KEY (program_id) REFERENCES Programs(program_id)
);

-- TABLE TimeCalendar
CREATE TABLE TimeCalendar(
    booking_id  INT IDENTITY(1,1) PRIMARY KEY,
	booking_date DATE NOT NULL,
	person_name VARCHAR(60),
	contact_number VARCHAR(10),
	purpose VARCHAR(100),
	start_time TIME,
  	end_time TIME,
	booking_status_flag  VARCHAR(1) DEFAULT 'N',
	academic_year_id INT,
	recurrence_pattern VARCHAR(50),
    recurrence_start_date DATE,
    recurrence_end_date DATE,
    recurrence_frequency INT,
	user_id INT,
	hall_id INT
);

-- Junction table to represent the many-to-many relationship between Course and TimeCalendar
CREATE TABLE CourseTimeCalendar (
    course_id INT,
    booking_id INT,
    PRIMARY KEY (course_id, booking_id ),
    FOREIGN KEY (course_id) REFERENCES Course(course_id),
    FOREIGN KEY (booking_id ) REFERENCES TimeCalendar(booking_id )
);

-- User table
CREATE TABLE Users (
    user_id  INT IDENTITY(1,1) PRIMARY KEY,
    user_name VARCHAR(100) UNIQUE,
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    authorised_by VARCHAR(100),
    university_email VARCHAR(255),
    contact_number VARCHAR(20),
    academic_year INT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- UserRole table
CREATE TABLE UserRoles (
    role_id INT PRIMARY KEY,
    role_name VARCHAR(50) UNIQUE,
	access_level INT
);

-- Junction table for the many-to-many relationship between Users and UserRoles
CREATE TABLE UserUserRole (
    user_id INT,
    role_id INT,
    PRIMARY KEY (user_id, role_id),
    FOREIGN KEY (user_id) REFERENCES Users(user_id),
    FOREIGN KEY (role_id) REFERENCES UserRoles(role_id)
);

-- Weak entity set: UserLog
CREATE TABLE UserLog (
    log_id INT PRIMARY KEY,
    user_id INT, -- Foreign key referencing User table
    login_time DATETIME,
    logout_time DATETIME,
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

-- AcademicYear table
CREATE TABLE AcademicYear (
    academic_year_id INT PRIMARY KEY,
    academic_year_name VARCHAR(50),
    year_start DATE,
    year_end DATE
);

-- Semester table
CREATE TABLE Semester (
    semester_id INT PRIMARY KEY,
    academic_year_id INT,
    semester_name VARCHAR(50),
    semester_start DATE,
    semester_end DATE,
    FOREIGN KEY (academic_year_id) REFERENCES AcademicYear(academic_year_id)
);


-- Add foreign key constraint
ALTER TABLE TimeCalendar
ADD CONSTRAINT FK_Halls_HallId FOREIGN KEY (hall_id) REFERENCES Halls(hall_id);

-- Add foreign key constraint
ALTER TABLE TimeCalendar
ADD CONSTRAINT FK_AcademicYear_academic_year_id FOREIGN KEY (academic_year_id) REFERENCES AcademicYear(academic_year_id);


ALTER TABLE TimeCalendar
ADD CONSTRAINT FK_Users_user_Id FOREIGN KEY (user_id) REFERENCES Users(user_id);
