## Example Setup

If you would like to use this example code directly, you'll have to setup your keys.

#### Dockerfile

Edit the `./Dockerfile` and replace `LOGENTRIES_ACCOUNT_KEY` with your LogEntries account key.

#### PHP Library

Edit the `./www/le_php-master/logentries.php` and replace `LOGENTRIES_TOKEN` with your LogEntries PHP token.

## Quick Steps

### 1. Install Logentries Agent for Linux

```
wget https://raw.githubusercontent.com/logentries/le/master/install/linux/logentries_install.sh && sudo bash logentries_install.sh
```

### 2. Register Logentries Agent

```
le register --account-key LOGENTRIES_ACCOUNT_KEY
```

### 3. Follow Log Files

```
le follow /var/log/apache2/access.log
```

### 4. Restart Logentries

```
service logentries restart
```