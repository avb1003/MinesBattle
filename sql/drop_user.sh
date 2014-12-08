#!/bin/bash
DBUSER=$1
ed -s drop_user.sql <<EOD
1,2s/SomeUser/$DBUSER/
w /tmp/du.sql
q
EOD
mysql -u root -p < /tmp/du.sql 
