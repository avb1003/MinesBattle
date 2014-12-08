#!/bin/bash
DBUSER=$1
DBPASSWORD=$2
ed -s create_user.sql <<EOD
1s/SomeUser/$DBUSER/
2s/SomePassword/$DBPASSWORD/
3s/SomeDatabase/$DBUSER/
w /tmp/cu.sql
q
EOD
mysql -u root -p < /tmp/cu.sql 
