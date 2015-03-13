CREATE TABLE modules (
moduleCode VARCHAR (16),
moduleName VARCHAR (128),
PRIMARY KEY (moduleCode)
);

CREATE TABLE prerequisite (
andId INT CHECK (andId = 0 OR andId = 1),
module VARCHAR (16),
requiredModule VARCHAR (16),
FOREIGN KEY (module) REFERENCES modules(moduleCode),
FOREIGN KEY (requiredModule) REFERENCES modules(moduleCode),
PRIMARY KEY (andId, module, requiredModule)
);

CREATE TABLE preclusion(
module VARCHAR (16),
excludedModule VARCHAR (16),
FOREIGN KEY (module) REFERENCES modules(moduleCode),
FOREIGN KEY (excludedModule) REFERENCES modules(moduleCode),
PRIMARY KEY (module, excludedModule)
);

CREATE TABLE modulesTime (
moduleCode VARCHAR (16),
startTime TIME,
endTime TIME,
day CHAR (3) 
CHECK (
lower(day) LIKE ('mon') OR
lower(day) LIKE ('tue') OR
lower(day) LIKE ('wed') OR
lower(day) LIKE ('thu') OR
lower(day) LIKE ('fri') OR
lower(day) LIKE ('sat') OR
lower(day) LIKE ('sun') ),
maxVacancy INT NOT NULL,
FOREIGN KEY (moduleCode) REFERENCES modules (moduleCode) ON DELETE CASCA,
PRIMARY KEY (moduleCode, startTime, endTime, day)
);

CREATE TABLE user (
matricNo VARCHAR(10),
admin INT NOT NULL CHECK (admin = 0 OR admin = 1) DEFAULT '0',
name TEXT NOT NULL,
points INT NOT NULL,
openId INT NOT NULL CHECK (openId = 0 OR openId = 1) DEFAULT '1',
password CHAR (64),
PRIMARY KEY (matricNo)
);

CREATE TABLE passed (
matricNo VARCHAR(10),
moduleCode VARCHAR(16),
FOREIGN KEY (matricNo) REFERENCES user(matricNo),
FOREIGN KEY (moduleCode) REFERENCES modules(moduleCode),
PRIMARY KEY (matricNo, moduleCode)
);


CREATE TABLE selected(
matricNo VARCHAR(10),
moduleCode VARCHAR(16),
startTime TIME,
endTime TIME,
day CHAR(3),
bidpoints INT NOT NULL,
success INT NOT NULL CHECK (success = 0 OR success = 1),
FOREIGN KEY (matricNo) REFERENCES user(matricNo),
FOREIGN KEY (moduleCode, startTime, endTime, day) REFERENCES modulesTime(moduleCode, startTime, endTime, day),
PRIMARY KEY (matricNo, moduleCode, startTime, endTime, day)
);
