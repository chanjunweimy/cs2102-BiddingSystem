alter SESSION set NLS_TIMESTAMP_FORMAT = 'YYYY-MM-DD HH24:MI:SS.FF';

INSERT INTO modules 
(moduleCode, moduleName)
VALUES
('cs1000', 'Introduction to computing');

INSERT INTO modules 
(moduleCode, moduleName)
VALUES
('ma1311', 'Introduction to logic');

INSERT INTO modules 
(moduleCode, moduleName)
VALUES
('cs1001s', 'Introduction to advanced computing')

INSERT INTO modules 
(moduleCode, moduleName)
VALUES
('pc1219', 'Introduction to Newton Laws');

INSERT INTO modules 
(moduleCode, moduleName)
VALUES
('cs2003', 'Introduction to Java');

INSERT INTO modules 
(moduleCode, moduleName)
VALUES
('cs2013', 'Introduction to Cpp');


INSERT INTO prerequisite
(andId, module, requiredModule)
VALUES
(0, 'cs2003', 'cs1000');


INSERT INTO prerequisite
(andId, module, requiredModule)
VALUES
(0, 'cs2003', 'ma1311');


INSERT INTO prerequisite
(andId, module, requiredModule)
VALUES
(1, 'cs2003', 'cs1001s');


INSERT INTO prerequisite
(andId, module, requiredModule)
VALUES
(1, 'cs2003', 'ma1311');

INSERT INTO preclusion
(module, excludedModule)
VALUES
('cs1000', 'cs1001s');

INSERT INTO preclusion
(module, excludedModule)
VALUES
('cs1001s', 'cs1000');

INSERT INTO preclusion
(module, excludedModule)
VALUES
('cs2003', 'cs2013');

INSERT INTO preclusion
(module, excludedModule)
VALUES
('cs2013', 'cs2003');

INSERT INTO modulesTime 
(moduleCode, startTime, endTime, day, maxVacancy)
VALUES
('cs1000', '12:00', '14:00', 'tue', 1);

INSERT INTO modulesTime 
(moduleCode, startTime, endTime, day, maxVacancy)
VALUES
('cs1000', '10:00', '12:00', 'tue', 2);

INSERT INTO modulesTime 
(moduleCode, startTime, endTime, day, maxVacancy)
VALUES
('ma1311', '09:00', '11:00', 'mon', 3);

INSERT INTO modulesTime 
(moduleCode, startTime, endTime, day, maxVacancy)
VALUES
('cs1001s', '10:00', '12:00', 'mon', 1);

INSERT INTO modulesTime 
(moduleCode, startTime, endTime, day, maxVacancy)
VALUES
('cs1001s', '10:00', '12:00', 'wed', 1);

INSERT INTO modulesTime 
(moduleCode, startTime, endTime, day, maxVacancy)
VALUES
('pc1219', '13:00', '15:00', 'tue', 3);

INSERT INTO modulesTime 
(moduleCode, startTime, endTime, day, maxVacancy)
VALUES
('pc1219', '13:00', '15:00', 'thu', 3);

INSERT INTO modulesTime 
(moduleCode, startTime, endTime, day, maxVacancy)
VALUES
('cs2003', '13:00', '15:00', 'fri', 2);

INSERT INTO modulesTime 
(moduleCode, startTime, endTime, day, maxVacancy)
VALUES
('cs2013', '13:00', '15:00', 'fri', 1);

INSERT INTO users
(matricNo, admin, name, points, openId, password)
VALUES
('a0112084u', 1, 'chan jun wei', 1000, 1, 'a0112084u');

INSERT INTO users
(matricNo, admin, name, points, openId, password)
VALUES
('a0000001a', 0, 'tang xiao ping', 50, 0, 'a0000001a');

INSERT INTO users
(matricNo, admin, name, points, openId, password)
VALUES
('a0000002a', 0, 'kan kan ni', 50, 0, 'a0000002a');

INSERT INTO users
(matricNo, admin, name, points, openId, password)
VALUES
('a0000003a', 0, 'leow ah beng', 50, 0, 'a0000003a');

INSERT INTO users
(matricNo, admin, name, points, openId, password)
VALUES
('a0000004a', 0, 'ng mei mei', 50, 0, 'a0000004a');

INSERT INTO users
(matricNo, admin, name, points, openId, password)
VALUES
('a0000005a', 0, 'eng ah yan', 50, 0, 'a0000005a');

INSERT INTO users
(matricNo, admin, name, points, openId, password)
VALUES
('a0000006a', 0, 'wong big fong', 50, 0, 'a0000006a');

INSERT INTO users
(matricNo, admin, name, points, openId, password)
VALUES
('a0000007a', 0, 'chen the boss', 50, 0, 'a0000007a');

INSERT INTO users
(matricNo, admin, name, points, openId, password)
VALUES
('a0000008a', 0, 'funny yew', 50, 0, 'a0000008a');

INSERT INTO users
(matricNo, admin, name, points, openId, password)
VALUES
('a0000009a', 0, 'stary liu', 50, 0, 'a0000009a');

INSERT INTO users
(matricNo, admin, name, points, openId, password)
VALUES
('a0000001b', 0, 'johny dept', 50, 0, 'a0000001b');

INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000001a', 'cs1000');

INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000002a', 'ma1311');

INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000003a', 'cs1001s');

INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000003a', 'ma1311');

INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000004a', 'pc1219');

INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000005a', 'cs1001s');

INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000005a', 'ma1311');

INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000005a', 'cs2013');

INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000006a', 'cs1000');

INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000006a', 'ma1311');

INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000007a', 'cs1000');

INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000007a', 'ma1311');

INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000008a', 'cs1001s');

INSERT INTO passed
(matricNo, moduleCode)
VALUES 
('a0000008a', 'pc1219');

INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('cs1000', '12:00', '14:00', 'tue', 
'a0000004a', 1, '2015-03-15 12:00:10.0000, 0');


INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('pc1219', '13:00', '15:00', 'tue', 
'a0000001a', 10, '2015-03-15 13:00:10.0000, 0');

INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('pc1219', '13:00', '15:00', 'tue', 
'a0000002a', 30, '2015-03-15 13:01:10.0000, 0');

INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('pc1219', '13:00', '15:00', 'tue', 
'a0000003a', 40, '2015-03-15 13:10:10.0000', 0);

INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('pc1219', '13:00', '15:00', 'tue', 
'a0000005a', 50, '2015-03-15 15:00:10.0000', 0);

INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('pc1219', '13:00', '15:00', 'tue', 
'a0000006a', 35, '2015-03-15 13:02:10.0000', 0);

INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('pc1219', '13:00', '15:00', 'tue', 
'a0000007a', 37, '2015-03-15 13:03:15.0000', 0);

INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('pc1219', '13:00', '15:00', 'tue', 
'a0000009a', 40, '2015-03-15 13:04:11.0001', 0);

INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('pc1219', '13:00', '15:00', 'tue', 
'a0000001b', 35, '2015-03-15 13:04:11.0100', 0);

INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('ma1311', '09:00', '11:00', 'mon', 
'a0000001a', 40, '2015-03-15 14:04:11.0100', 0);

INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('ma1311', '09:00', '11:00', 'mon', 
'a0000004a', 49, '2015-03-15 14:05:11.0100', 0);

INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('ma1311', '09:00', '11:00', 'mon', 
'a0000008a', 50, '2015-03-15 14:04:12.0100', 0);

INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('ma1311', '09:00', '11:00', 'mon', 
'a0000009a', 10, '2015-03-15 11:04:12.0100', 0);

INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('cs1001s', '10:00', '12:00', 'wed', 
'a0000002a', 10, '2015-03-15 15:04:12.0100', 0);

INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('cs1001s', '10:00', '12:00', 'wed', 
'a0000001b', 10, '2015-03-15 15:04:11.0100', 0);

INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('cs2003', '13:00', '15:00', 'fri', 
'a0000003a', 10, '2015-03-15 16:04:11.0100', 0);

INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('cs2003', '13:00', '15:00', 'fri', 
'a0000006a', 15, '2015-03-15 16:03:11.0100', 0);


INSERT INTO selected 
(moduleCode, startTime, endTime, day, 
matricNo, bidpoints, bidTime, success)
VALUES
('cs2013', '13:00', '15:00', 'fri', 
'a0000007a', 1, '2015-03-15 17:03:11.0100', 0);