<?php
// LDAP Variables
$ldapColumns = NULL;
$ldapConnection = NULL;
$ldapPassword = 'Password1';
$ldapUsername = 'administrator@ids.ad.flinders.edu.au';
$ldapServer = 'ids.ad.flinders.edu.au';

$ldapBaseDN = 'ou=CS,ou=ENG,DC=ids,DC=ad,dc=flinders,dc=edu,dc=au';
$searchObjectFilter = "(&(objectCategory=group))";

// MYSQL Variables
//$sqlInsert = "INSERT INTO MYTABLE ('$var1', '$var2')";
///$sqlRemove = "DELETE FROM";
//$sqlUpdate = "UPDATE MYTABLE SET";
?>