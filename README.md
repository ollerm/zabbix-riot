# Zabbix Alert Script for RIOT.IM

This is a simple script to send message to riot.im channel.

# Create Riot user

First you must create user and get room id from Riot.

You can simple creat it with curl:

```bash
curl -XPOST -d '{"username":"<USER_NAME>", "password":"<PASSWORD>", "auth": {"type":"m.login.dummy"}}' "https://<SERVER_NAME>/_matrix/client/r0/register"
```

Response:
```bash
{
    "access_token": "QGV4YW1wbGU6bG9jYWxob3N0.AqdSzFmFYrLrTmteXc", 
    "home_server": "localhost", 
    "user_id": "@example:localhost"
}

```
Please invite your new user to room.
ID of your room you can get from channel settings.


# Scripts installation

Next you must set AlertScriptsPath in zabbix server config file, example: 

AlertScriptsPath=/usr/local/share/zabbix/alertscripts

To this directory put riot.sh file. This is a script, that is execute from zabbix.

Next create /scripts dir, or other if you want. But then you must change file path in riot.sh file.

To /scripts put riot.php file.

Some variables to change in riot.php:
<SERVER_NAME>
<ROOM_ID> ( ! -> %21 )
<TOKEN>

# Zabbix configuration

1. Add media type:

Administration -> Media types -> Add

Name - Riot

Type - Script

Script name - riot.sh

Script param - {ALERT.MESSAGE}

2. Add media to user

Users -> UserName -> Media 


Type - Riot

Send to - whatever

Check what you want to alerting




