# ltibloodbank

# Setting up Ubuntu Machine

sudo apt-get update

sudo apt-get install apache2

sudo apt-get install php libapache2-mod-php php-mysql php-curl php-gd php-json php-zip php-mbstring

sudo systemctl restart apache2

sudo apt-get install mysql-server

--------------------------------------------------------------------------------------------------------------------

# Connecting to My SQL Database

mysql -h mysqldb2022.cqyjl3sbn0g1.us-west-2.rds.amazonaws.com -u admin -p

# Create Database
Create database customers;

#use DB

use customers;

# Create table 
create table donors(id int AUTO_INCREMENT primary key, fname varchar(255) NOT NULL , lname varchar(255) NOT NULL , mobileno BIGINT UNIQUE, city varchar(255) NOT NULL, bfrom date, bto date, dob date, bloodgroup varchar(255) NOT NULL);

# Insert Values to donors table

INSERT INTO `donors` (`fname`, `lname`, `mobileno`, `city`, `bfrom`, `bto`, `dob`, `bloodgroup`) VALUES
('Srikanth', 'Koraveni', '9000736060', 'Pune', '2022-09-28', '2022-12-28', '1998-05-22', 'O_Positive'),
('Prashanth', 'Katkam', '7989919097', 'Mumbai', '2022-09-17', '2022-11-18', '1998-09-30', 'O_Positive'),
('Kranthi', 'Khaitha', '9876789871', 'Bangalore', '2022-09-16', '2022-11-08', '1996-07-02', 'B_Positive'),
('Srinivas', 'Thota', '9812789411', 'Mumbai', '2022-09-18', '2022-10-31', '1992-07-22', 'O_Positive'),
('Pandya', 'Loka', '9877787887', 'Mumbai', '2022-09-18', '2022-10-09', '1992-07-22', 'B_Positive'),
('Prajodh', 'Shreya', '9812444411', 'Mumbai', '2022-08-23', '2022-10-31', '1992-07-22', 'B_Positive'),
('Srinivas', 'Thota', '9812723411', 'Mumbai', '2022-04-19', '2022-10-07', '1992-07-22', 'B_Positive'), 
('Zaheer', 'Khan', '7788678987', 'Chennai', '2022-09-11', '2022-12-19', '1998-11-11', 'A_Positive');


# Create table users and assign Values for Signin/Login

CREATE TABLE `users` (
  `username` varchar(80) NOT NULL,
  `name` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


# Assign values to users table

    INSERT INTO `users` (`username`, `name`, `password`) VALUES
    ('yssyogesh', 'Yogesh Singh', '12345'),
    ('bsonarika', 'Sonarika Bhadoria', '12345'),
    ('vishal', 'Vishal Sahu', '12345'),
    ('prashanth', 'Prashanth Katkam', '12345'),
    ('vijay', 'Vijay mourya', '12345');
    

# Insert Single Values to a Table

INSERT INTO `users` (`username`, `name`, `password`) VALUES
('prashanth', 'Prashanth Katkam', '12345');


#Admin Table

CREATE TABLE `admin` (
  `username` varchar(80) NOT NULL,
  `name` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#insert into admin table

INSERT INTO `admin` (`username`, `name`, `password`) VALUES
('admin', 'admin', '12345');

=================================================================================================
                                #IMP Points
-------------------------------------------------------------------------------------------------
if connection from linux ec2 to DB is not connecting, then add inbound rule to DB SG as AURORA and assign SG of EC2 Instance.


#DB Endpoint needs to be added

vi donate-blood.php
vi find-donor.php
vi config.php
vi search.php
vi signup.php
vi deletedata.php

Add admin table name in indexadmin.php

Hackathon Repo consists of latest code

# Important Notes To Remember

Add Endpoint URL of the DB to the congig.php and also for the pages which need the DB Details

If the Database or Table name is changes please change it accordingly.


Example: donate-blood.php, find-donor.php, config.php, signup.php, search.php {login}.

NOTE: Add donors table name to index.php and add admin table name to indexadmin.php

===================================================================================================
---------------------------------------------------------------------------------------------------

# Git Commands

git clone URL

git clone --branch branchname URL

sudo git init

sudo git remote add origin "https://github.com/prashanthkatam/ltibloodbank.git"

sudo git remote add origin "https://github.com/prashanthkatam/ltibloodbankrepo.git"

sudo git remote add origin "https://github.com/prashanthkatam/Hackathon.git"

sudo git remote -v

sudo git add .

sudo git commit -m ""

git remote set-url origin https://token@github.com/prashanthkatam/ltibloodbank.git

git remote set-url origin https://@github.com/prashanthkatam/Hackathon.git

git remote set-url origin https://@github.com/prashanthkatam/Hackathon.git

sudo git push origin master

# Upload new files

sudo git init

sudo git add .

sudo git commit -m ""

sudo git push origin master

--------------------------------------------------------------------------------------------------------------------

# Install Jenkins

sudo apt-get update

sudo apt-get install openjdk-8-jdk

wget -q -O - https://pkg.jenkins.io/debian-stable/jenkins.io.key | sudo apt-key add -

sudo sh -c 'echo deb https://pkg.jenkins.io/debian-stable binary/ > /etc/apt/sources.list.d/jenkins.list'

sudo apt-get update

sudo apt-get install jenkins

sudo apt install git

--------------------------------------------------------------------------------------------------------------------

# Push Apache Logs to Cloud Watch

1.	Create an EC2 Instance

2.	Create a Role with CloudWatchAgentServerPolicy and attach to EC2 Instance.

3.	Update the Instance

sudo apt-get update

4.	Install Apache2 or any other web server on the Ec2 Instance

Sudo apt-get install apache2

5.	Download the Package using wget

sudo wget https://s3.amazonaws.com/amazoncloudwatch-agent/ubuntu/amd64/latest/amazon-cloudwatch-agent.deb

6.	Install CloudWatch Agent 

sudo dpkg -i -E ./amazon-cloudwatch-agent.deb

# Updated method to install cloud watch agent to push apache logs to cloud watch

Steps to install and configure cloudwatch agent 

1. wget https://s3.amazonaws.com/amazoncloudw...
2. sudo dpkg -i -E ./amazon-cloudwatch-agent.deb
3. sudo /opt/aws/amazon-cloudwatch-agent/bin/amazon-cloudwatch-agent-config-wizard
4. sudo apt-get update -y
5. sudo apt-get install collectd
6. sudo /opt/aws/amazon-cloudwatch-agent/bin/amazon-cloudwatch-agent-ctl -a fetch-config -m ec2 -c file:/opt/aws/amazon-cloudwatch-agent/bin/config.json -s
7. sudo /opt/aws/amazon-cloudwatch-agent/bin/amazon-cloudwatch-agent-ctl -a status

NOTES:
1. Remember to create a role in IAM with CloudWatchAgentAdminPolicy and assign that role to EC2 Instance.
2. While configuration of cloud watch agent follow youtube video: https://www.youtube.com/watch?v=mIVluHNNioE

""
         

--------------------------------------------------------------------------------------------------------------------

# Important SQL Commands for use

DELETE FROM Customers;

show columns from donors;


<html>
  <body>
    Hi this is webpage after making changes in GitHub Repo and CI CD Made visible here
  </body>
</html>
