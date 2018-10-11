<div align="center">
  <h1>NLS Lumen Webhook</h1>
  <sup>Simplify your webhooks with a Laravel lumen API endpoint.</sup>
</div>

<br>

*That automated webhook deployment system is planned to support you updating your server automatically as soon as someone uploads any new files, changes content or simply pushs anything to your repository. It is meant to be a simple continious integration tool for developer novices. I am using it to trigger a pull request on my server as soon my client pushes any new content inside her GitHub repository. Her website is hosted on GitHub and has to be updated, pulled and deployed on the server.*

<br>

## Installation

1. Clone the repository `git@github.com:nextlevelshit/nls-lumen-webhook.git` (*https is also possible*)

2. Install dependencies:

  2.1. Change to directory `cd nls-lumen-webhook` (*if you haven't renamed it*)
 
  2.2. Start downloading composer dependencies `composer install`

3. Copy configurations `cp .env.example .env`

4. Set configurations `vim .env`

## Configuration

There will be two parameters, that have to be set manually inside `.env`.

| Parameter       | Description                                                 |
|-----------------|-------------------------------------------------------------|
| REPO_VALID_LIST | semicolon-separated list of valid repositories for webhooks |
| REPO_DIRECTORY  | directory of all your valid repositories                    |

## GitHub Configuration

Browse to your repository on GitHub, that should take advantage of that webhook. Click on `Settings` inside the tab navigation and afterwards go to `Webhooks`.

Otherwise do your self a favour and type in the URL directly: `https://github.com/USERNAME/REPOSITORY/settings/hooks` (*Replace the username and repository with your values*).

Last but not least press the `Add webhook` buttona and set up your personal webhook:

1. After you have cloned this repository (*nls-lumen-webhook*) to your server and set up an endpoint, that is available from the vast internet, insert the *Payload URL*.

2. Select `application/JSON` as *Content type*. 

3. At this moment only `push` events are going to be detected. If you're expecting to need more events, [bumb a new issue](https://github.com/nextlevelshit/nls-lumen-webhook/issues), please.

## Server-side Configuration (optional)

WIP
