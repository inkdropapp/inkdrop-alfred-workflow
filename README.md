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

### Search

You can search using `ink {query}` in Alfred. You can use [the same qualifiers](https://docs.inkdrop.app/manual/searching-notes/#filter-notes-with-special-qualifiers) for filtering notes.

![screenshot][workflow-ink]

### New Note

You can also use `ink+ {title}:{body}` to create a new note. For this to work you need to set a `defaultNotebook` on the workflow config.

`defaultTags` is optional and takes a comma separated list of tag IDs.

> [!TIP]
> You can use the [dev tools plugin](https://my.inkdrop.app/plugins/dev-tools) to get the ID of notebooks and tags.

![screenshot][workflow-ink+]

## Contributions

If you'd like to extend the functionality of this workflow in any way, open an issue or send a pull request.

[workflow-ink]: ./screenshot.png "Sample Inkdrop search result"
[workflow-ink+]: ./screenshot-ink+.png "Sample Inkdrop new note"
[configure-1]: ./configure-workflow-1.png "Configure workflow 01"
[configure-2]: ./configure-workflow-2.png "Configure workflow 02"
