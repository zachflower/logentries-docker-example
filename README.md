## LogEntries Setup

A docker image is a Linux machine, just like any other, so setting up LogEntries is just as easy as it is on a standard server. The trick is making knowing where to enter the commands.

If you would rather skip the example and instead setup LogEntries logging on your own Docker container, here are the basic steps. Add the following commands to your `Dockerfile`.

### 1. Install LogEntries Agent for Linux

```
RUN wget https://raw.githubusercontent.com/logentries/le/master/install/linux/logentries_install.sh && sudo bash logentries_install.sh
```

### 2. Register the LogEntries Agent

```
RUN le register --account-key LOGENTRIES_ACCOUNT_KEY
```

### 3. Follow Log Files

This line can be repeated any number of times, depending on the logs you want to send up to LogEntries. If, for example, you only want to send up your Apache access logs, simple tell LogEntries to follow `/var/log/apache2/access.log`.

```
RUN le follow /var/log/apache2/access.log
```

### 4. Restart LogEntries

Whenever you tell LogEntries to follow new log files, you have to restart the LogEntries agent before the new logfiles will be picked up and sent to LogEntries.

```
RUN service logentries restart
```

## Example Setup

If you would like to use this example code directly, you'll have to setup your keys.

### Dockerfile

Edit the `./Dockerfile` and replace `LOGENTRIES_ACCOUNT_KEY` with your LogEntries account key.

### PHP Library

Edit the `./www/le_php-master/logentries.php` and replace `LOGENTRIES_TOKEN` with your LogEntries PHP token.

## Requirements

[Docker](https://www.docker.com/) is required to run this example.

## Building

Navigate to your `logentries-docker-example` folder in a terminal and type the following:

```
docker build .
```

If you configured your LogEntries integration properly, this will build a Docker image for you to run.

## Running

Navigate to your `logentries-docker-example` folder in a terminal and type the following:

```
docker run -p 8080:80 -d logentries-docker-example
```

After you have built your Docker image, this command will run it in the background. `-p 8080:80` will point port `8080` to port `80` within the image, and `-d` will run the image in the background. Open up a web browser and navigate to the IP address returned by the `run` command with port `8080` (for example, if your IP address is `127.0.0.1`, you would type `http://127.0.0.1:8080` in your web browser).

If all goes well, you will see the Apache, PHP, and System logs in your LogEntries dashboard.
