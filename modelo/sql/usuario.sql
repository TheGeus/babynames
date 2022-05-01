use babynames;
DROP USER listadonames@localhost;
CREATE USER listadonames@localhost IDENTIFIED BY 'Limit1234';
GRANT SELECT ON babynames.* to listadonames@localhost;