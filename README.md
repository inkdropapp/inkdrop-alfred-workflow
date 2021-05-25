# Inkdrop.alfredworkflow

This is the [Inkdrop](https://www.inkdrop.app/) Alfred workflow.
It lets users instantly search their notes through [the local database server endpoint](https://beta.docs.inkdrop.app/manual/accessing-the-local-database/#accessing-via-http-advanced).

For more information, check out [Inkdrop's webpage](https://www.inkdrop.app/).

## Download

Go to [the Releases page](https://github.com/inkdropapp/inkdrop-alfred-workflow/releases).

## Configuration

### 1. Set up the local http server

The workflow accesses your notes via HTTP locally.
You have to configure the app to open a HTTP endpoint.
See [the instruction on the documentation](https://beta.docs.inkdrop.app/manual/accessing-the-local-database/#accessing-via-http-advanced) for more detail.

### 2. Set up the workflow

Click `[x]` button to configure environment variables of the workflow.

![configure workflow][configure-1]

Specify your server configuration.

![configure server][configure-2]

## Usage

You can search using `ink {query}` in Alfred. You can use [the same qualifiers](https://docs.inkdrop.app/manual/searching-notes/#filter-notes-with-special-qualifiers) for filtering notes.

![screenshot][workflow]

## Contributions

If you'd like to extend the functionality of this workflow in any way, open an issue or send a pull request.

[workflow]: ./screenshot.png "Sample Inkdrop result"
[configure-1]: ./configure-workflow-1.png "Configure workflow 01"
[configure-2]: ./configure-workflow-2.png "Configure workflow 02"
