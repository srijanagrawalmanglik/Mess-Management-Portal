# Mess-Management-Portal[19BIT0271_VL2020210106326_PE003 (2)-converted.pdf](https://github.com/srijanagrawalmanglik24/Mess-Management-Portal/files/7070356/19BIT0271_VL2020210106326_PE003.2.-converted.pdf)
The proposed system is totally capable of serving the needs of
VITians. Since, there is no permanent mess management portal
in VIT University, at the end of every month, the link for mess
change is generated. It is only then, that students can access the
portal and make changes to anything.
▪ This new system will serve as a permanent web site for
managing the mess affairs of student.
▪ This system has a common interface for login of Students,
Administrators as well as Caterers. (Depending on, whether the
candidate has student or administrator privilege the concerned
person will be redirected to the student or the admin login).
▪ Most powerful functionality of admin is that he can just enable
or disable the mess change capability at any point of the time
and some other basic functionalities.
▪ Moreover, a facility to change his own password is available.
▪ This portal is eligible to work as both 24x7 mess change portal
as well as a limited time portal
▪ The mess menu can be seen on the home page as soon as the
user is logged into the portal
This system is based on more effective interaction and more user-friendly
interface.
4
2. Motivation & Introduction
VIT University has a vast database of all the students. Almost all the work is done online on the web portal. But till now, no such Mess Management Portal has been developed for the university. Only a link in the web portal of the college is enabled at the end of every month where user can just change to his preferred mess. So, we decided to develop a Mess Management Portal where a user can access the portal at any time and can change his mess preferences and also some of his personal details.
Also, for the mess administrator all the work is done on pen and paper. It is very difficult to hold such a huge pile of papers with data of each and every student. So, moving the data to the online database can be a smart move for the mess management.
3. Objective
Our objective is to develop a website which deals with mess change issue. Earlier The main problem was to hold all the documents for the mess management. Mess is a place where storing the document is very hard as a lot of people work there and they work with liquid, dry and every sort of things that can damage the important documents. So, if the whole of the documents is shifted from physical to the online database, it would be a great relief to the VIT Online Mess Portal (VTOMP). Apart from that a student can easily change his contact details at any time instead of doing that manually. Also, whenever the mess link is enabled by the administrator, a student as per his wish could change it through the online portal.
5
4. Activities Involved
o Implementation of High-Fidelity Prototype
o Paper Based design
o SQL Database Management
o Interface design using HTML/CSS and Bootstrap
o File Handling using php, jQuery, SESSION
o Documentation and Presentation
o Analysis of the Existing Design
o Challenges to Conquer
o Advantages and Disadvantages of the project
o Architecture
o Low Fidelity Design
o Hierarchical Task Analysis
o Applications of Project
o Software and Hardware Requirements
o Entities involved in the project
o Modalities
o User Testing to get the feedback for the website
6
5. Overview
1. Overview and Planning
This proposed system is totally capable of serving the needs of VITians. Since, there is no permanent mess management portal in VIT University, at the end of every month, the link for mess change is generated. It is only then, that students can access the portal and make changes to anything. But here, this new system will serve as a permanent web site for managing the mess affairs of student. This system has a common interface for login of students as well as administrators. Depending on, whether the candidate has student or administrator privilege the concerned person will be redirected to the student or the admin login.
Most powerful functionality of admin is that he can just enable or disable the mess change capability at any point of the time
2. Challenges
While doing this project there were challenges, both in the backend as well as the frontend part. In the frontend part, since the site is built on the concept of tiles. So, after the login every page consists of four parts, namely header, footer, menu and body. And all these parts contain separate CSS effects for each one of them. But after combining these pages into one their CSS effects started conflicting. This challenge was overcome by using a lot of internal and inline styling effects. Other challenges were faced in developing the backend. First challenge was to combine the login form and link for both students and admins into one. Second one was using the session object, properly invalidating session object and sharing of dynamic data between server and the client. Next challenge was to generate a random password of exactly eight digits in length. Another weakness of java-based backend is that it’s files gets automatically cached and it cannot be prevented from being cached, so
7
even after logging out, if user presses back button it would look as if he hadn’t logged out. Although, in reality his session has been invalidated but because of the cached files the previous pages remain visible. The solution of the problem was found by looking at the websites like IRCTC and vtopbeta.
Therefore, back button was disabled. Controlling the access of students to mess change page based on the status of the link. Maintaining XML files with long list of the mappings that exists between the deployment name and the actual mapping. Another one was controlling the access of the students to mess change page based on whether administrator has set the link to be enabled or disabled.
3. Functional Description
In this website, we have used the model of the Facebook website. In Facebook the dashboard page which appears after logging in is a SINGLE PAGE APPLICATION similarly the login page in VTOMP Login is individual and then the “authentication.php” is a Single Page Application (SPA). Initially the users are asked to enter their login credentials first, because based on their access privileges as student, admin or as Caterers they are provided with the functions. The data filled in the login form is transferred to the server using post method. And then first, the login credentials are searched in the login database if not then it is searched in the admin login database. If entered details does not match with the tables then an error message is shown in another webpage named
as “incorrect.php” and user is asked for credentials once again. But if the credential was found in the database then user is redirected to “authentication.php”. This site is built using the tiles therefore, once logged in header, footer and menu remains constant but only body part is replaced with every request or menu selected. The instruction about which page is to be substituted in the body part
8
based on the options or the output of backend logic processed, is situated in two xml files (struts-config.xml and tiles-def.xml).
In admin login, admin can add a new student, by filling a registration form, if all the data are valid then, it is inserted into user details table. Then a random 8-digit password is generated for the new student and displayed after successful registration.
Secondly, admin can view mess related all details of the student. This is achieved using simple select query from backend on MySQL. He can enable or disable mess change link which is again stored in database and modified using update query. Lastly, he can change his own password by providing current password and typing new password for two times own for unintentional typing mistake.
The design of student login is quite simple. When the user selects the mess change menu first an enquiry is done from database to check whether the mess change link is enabled of disabled. If enabled user is redirected to mess change portal, if not, then he is redirected to another page displaying the message that mess change link has been disabled by the admin. If student selects for the mess change then the necessary changes are made in the database table. Necessary changes will be made to the login table. Student can also change his password by providing existing password as a means of verification and entering and re-entering the new password.
